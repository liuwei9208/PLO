<?php

namespace App\Services;

use App\Models\Cast;
use Carbon\Carbon;
use DirectoryTree\ImapEngine\Collections\MessageCollection;
use DirectoryTree\ImapEngine\Mailbox;
use Illuminate\Support\Facades\DB;

class DiaryService
{
    const FETCH_RESULT_SUCCESS = 1;
    const FETCH_RESULT_FAILED = 0;

    public static function fetch(string $cast_id)
    {
        $cast = Cast::find($cast_id);
        Log::info('cast', [$cast]);

        if (!$cast || !$cast->diary_email_to || !$cast->diary_email_password) {
            return self::FETCH_RESULT_FAILED;
        }

        $messages = self::getMessages($cast);
        Log::info('messages', [$messages]);
        foreach ($messages as $message) {
            if (self::isStored($cast_id, $message)) {
                continue;
            }
            self::store($cast_id, $message);
        }

        return self::FETCH_RESULT_SUCCESS;
    }

    private static function getMessages(Cast $cast): MessageCollection
    {
        $mailbox = new Mailbox([
            'port' => 993,
            'username' => $cast->diary_email_to,
            'password' => $cast->diary_email_password,
            'encryption' => 'ssl',
            'host' => env('MAIL_HOST'),
        ]);

        $inbox = $mailbox->inbox();

        $messages = $inbox->messages()
            ->withHeaders()
            ->withFlags()
            ->withBody()
            ->get();

        return $messages;
    }

    private static function store(string $cast_id, $message)
    {
        $date = Carbon::parse($message->date());

        $attachments = $message->attachments();
        $attachment_filename = null;
        if (count($attachments) > 0) {
            $attachment = $attachments[0];
            $attachment_filename = $date->format('Ymd-His') . '-' . $cast_id . '-' . $message->uid() . '.' . $attachment->extension();
            $attachment->save(storage_path('app/public/diary/') . $attachment_filename);
        }

        $number = DB::table('diaries')
            ->whereDate('created_at', $date)
            ->count() + 1;

        $slug = $date->format('ymd') . sprintf('%03d', $number);

        DB::table('diaries')->insert([
            'cast_id' => $cast_id,
            'subject' => $message->subject(),
            'body' => $message->text(),
            'photo' => $attachment_filename ?? '',
            'uid' => $message->uid(),
            'slug' => $slug,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
    }

    private static function isStored(string $cast_id, $message): bool
    {
        return DB::table('diaries')
            ->where('cast_id', $cast_id)
            ->where('uid', $message->uid())
            ->exists();
    }
}
