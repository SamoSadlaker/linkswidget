import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import statamic from '@statamic/cms/vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
  plugins: [
    laravel({
      input: ['resources/css/linkswidget.css'],
      publicDirectory: 'resources/dist',
    }),
    statamic(),
    tailwindcss(),
  ],
  css: {
    // Do not walk up into the host project's PostCSS config.
    postcss: { plugins: [] },
  },
});
