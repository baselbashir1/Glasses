import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',

                'public/layouts/modern-dark-menu/css/dark/loader.css',
                'public/src/bootstrap/css/bootstrap.min.css',
                'public/layouts/modern-dark-menu/css/light/plugins.css',
                'public/layouts/modern-dark-menu/css/dark/plugins.css',
                'public/src/plugins/src/filepond/filepond.min.css',
                'public/src/plugins/src/filepond/FilePondPluginImagePreview.min.css',
                'public/src/plugins/src/tagify/tagify.css',
                'public/src/assets/css/light/forms/switches.css',
                'public/src/plugins/css/light/editors/quill/quill.snow.css',
                'public/src/plugins/css/light/tagify/custom-tagify.css',
                'public/src/plugins/css/light/filepond/custom-filepond.css',
                'public/src/assets/css/dark/forms/switches.css',
                'public/src/plugins/css/dark/editors/quill/quill.snow.css',
                'public/src/plugins/css/dark/tagify/custom-tagify.css',
                'public/src/plugins/css/dark/filepond/custom-filepond.css',
                'public/src/assets/css/light/apps/blog-create.css',
                'public/src/assets/css/dark/apps/blog-create.css',
                'public/src/assets/css/light/apps/invoice-preview.css',
                'public/src/assets/css/dark/apps/invoice-preview.css',

                'public/layouts/modern-dark-menu/loader.js',
                'public/src/bootstrap/js/bootstrap.bundle.min.js',
                'public/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js',
                'public/src/plugins/src/mousetrap/mousetrap.min.js',
                'public/src/plugins/src/waves/waves.min.js',
                'public/layouts/modern-dark-menu/app.js',
                'public/src/plugins/src/editors/quill/quill.js',
                'public/src/plugins/src/filepond/filepond.min.js',
                'public/src/plugins/src/filepond/FilePondPluginFileValidateType.min.js',
                'public/src/plugins/src/filepond/FilePondPluginImageExifOrientation.min.js',
                'public/src/plugins/src/filepond/FilePondPluginImagePreview.min.js',
                'public/src/plugins/src/filepond/FilePondPluginImageCrop.min.js',
                'public/src/plugins/src/filepond/FilePondPluginImageResize.min.js',
                'public/src/plugins/src/filepond/FilePondPluginImageTransform.min.js',
                'public/src/plugins/src/filepond/filepondPluginFileValidateSize.min.js',
                'public/src/plugins/src/tagify/tagify.min.js',
                'public/src/assets/js/apps/blog-create.js',
                'public/src/assets/js/apps/invoice-preview.js'

            ],
            refresh: true,
        }),
    ],
});
