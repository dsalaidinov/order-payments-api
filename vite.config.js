import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue()
    ],
    // build: {
    //     outDir: './public/dist'
    // },
    // plugins: [
    //     laravel([
    //         'resources/css/app.css',
    //         'resources/js/app.js',
    //     ]),
    //     vue({
    //         template: {
    //             transformAssetUrls: {
    //                 base: null,
    //                 includeAbsolute: false,
    //             },
    //         },
    //     }),
    // ],
    // resolve: {
    //     alias: {
    //         vue: 'vue/dist/vue.esm-bundler.js',
    //     },
    // },
});
