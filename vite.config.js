import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';
import path from 'path';
import { resolve } from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        vue()
    ],
    build: {
        outDir: 'public/build',
        rollupOptions: {
            input: {
                main: resolve(__dirname, 'resources/js/app.js'),
            },
        },
    },
    resolve: {
        alias: {
          '@': path.resolve(__dirname, 'resources/js'),
        },
      },
    
    css: {
        preprocessorOptions: {
            scss: {
            additionalData: `@import "@/styles/variables.scss";`,
            },
        },
    },
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
