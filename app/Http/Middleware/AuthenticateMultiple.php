<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateMultiple
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd(session('user_type'));
        // 両方のガードで認証チェック
        if (!Auth::guard('web')->check() || !Auth::guard('member')->check()) {
            // 認証されていない場合、リダイレクト
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Unauthenticated.'], 401);
            }
            // dd(session('user_type'));
            if (session('user_type') === 'member') {
                // return redirect('/mypage');
                return $next($request);
            } else if (session('user_type') === 'admin') {
                // dd('admin');
                return redirect('/admin');
            }else{
              return redirect('/login');
            }
        }

        return $next($request);
    }
} 