import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.scss",
                "resources/css/admin.scss",
                "resources/css/guest.scss",
                "resources/css/welcome.scss",
                "resources/css/global.scss",
                "resources/js/app.js",
                "resources/js/admin.js",
            ],
            refresh: true,
        }),
    ],
});
