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
                'resources/js/admin.js',
                'resources/js/group.js',
                'resources/js/shop.js',
                'resources/js/shop/profile.js',
                'resources/js/admin/event.js'
            ],
            refresh: true,
        }),
        viteStaticCopy({
            targets: [
              { src: 'node_modules/tinymce/skins', dest: 'js/tinymce' },
            ],
          }),
    ],
});
