import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    build: {
        // outDir に manifest.json を出力
        manifest: true,
        rollupOptions: {
           // デフォルトの .html エントリを上書き
          input: '/path/to/main.js'
        }
    }
});
