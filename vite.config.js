import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { viteStaticCopy } from 'vite-plugin-static-copy';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/admin.css',
                'resources/css/guest.css',
                'resources/scss/group.scss',
                'resources/scss/shop.scss',
                'resources/scss/error.scss',
                'resources/scss/group/_pickup.scss',
                'resources/scss/group/_pickup_top.scss',
                'resources/scss/group/_eventview.scss',
                'resources/scss/admin/schedule.scss',
                'resources/scss/group/_eventdetail.scss',
                'resources/scss/shop/_eventdetail.scss',
                'resources/scss/shop/_about.scss',
                'resources/scss/shop/_fee.scss',
                'resources/scss/group/_diary_top.scss',
                'resources/js/admin.js',
                'resources/js/group.js',
                'resources/js/shop.js',
                'resources/js/shop/profile.js',
                'resources/js/admin/event.js',
                'resources/js/admin/news.js',
                'resources/js/admin/schedule.js',
                'resources/js/admin/shopmaster.js',
                'resources/js/admin/fee.js',
            ],
            refresh: true,
        }),
        viteStaticCopy({
            targets: [
              { src: 'node_modules/tinymce/skins', dest: 'js/tinymce' },
              { src: 'public/assets/*', dest: 'assets' },
            ],
          }),
    ],
});
