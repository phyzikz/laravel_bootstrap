import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import fs from 'fs';
import path from 'path';
import { fileURLToPath } from 'url';

const projectRoot = path.dirname(fileURLToPath(import.meta.url));
const imgSource = path.resolve(projectRoot, 'resources/img');
const imgDest = path.resolve(projectRoot, 'public/img');

function copyResourcesImg() {
    if (!fs.existsSync(imgSource)) {
        return;
    }

    fs.mkdirSync(imgDest, { recursive: true });
    fs.cpSync(imgSource, imgDest, { recursive: true });
}

function copyResourcesImgPlugin() {
    return {
        name: 'copy-resources-img',
        buildStart() {
            copyResourcesImg();
        },
        configureServer(server) {
            copyResourcesImg();

            server.watcher.add(imgSource);
            server.watcher.on('all', (_event, file) => {
                if (file.startsWith(imgSource)) {
                    copyResourcesImg();
                }
            });
        },
    };
}

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js'],
            refresh: true,
        }),
        copyResourcesImgPlugin(),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(projectRoot, 'node_modules/bootstrap'),
        },
    },
    css: {
        preprocessorOptions: {
            scss: {
                loadPaths: [path.resolve(projectRoot, 'node_modules')],
            },
        },
    },
});
