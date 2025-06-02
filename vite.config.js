import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/admin.css',
                'resources/css/guest.css',
                'resources/scss/group.scss',
                'resources/scss/shop.scss',
                'resources/js/admin.js',
                'resources/js/group.js',
                'resources/js/shop.js',
            ],
            refresh: true,
        }),
    ],
});
