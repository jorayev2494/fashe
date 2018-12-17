let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

// Админ Style
mix.styles(
    "resources/assets/admin/css/space.css", "public/admin/css/space.css");

// Админ Style
mix.styles(
    "resources/assets/admin/css/custom.css", "public/admin/css/custom.css");


mix.js([
    "resources/assets/admin/js/space.js",
], "public/admin/js/space.js");

mix.js([
    "resources/assets/admin/js/pages/chart.js",
    "resources/assets/admin/js/pages/dashboard.js",
    "resources/assets/admin/js/pages/docs.js",
    "resources/assets/admin/js/pages/email.js",
    "resources/assets/admin/js/pages/form-elements.js",
    "resources/assets/admin/js/pages/form-file-upload.js",
    "resources/assets/admin/js/pages/form-image-crop.js",
    "resources/assets/admin/js/pages/form-image-zoom.js",
    "resources/assets/admin/js/pages/form-select2.js",
    "resources/assets/admin/js/pages/form-wizard.js",
    "resources/assets/admin/js/pages/form-x-editable.js",
    "resources/assets/admin/js/pages/gallery.js",
    "resources/assets/admin/js/pages/maps-google.js",
    "resources/assets/admin/js/pages/maps-vector.js",
    "resources/assets/admin/js/pages/table-data.js",
    "resources/assets/admin/js/pages/timeline.js",
    "resources/assets/admin/js/pages/todo.js",
    "resources/assets/admin/js/pages/ui-modals.js",
    "resources/assets/admin/js/pages/ui-nestable.js",
    "resources/assets/admin/js/pages/ui-notifications.js",
    "resources/assets/admin/js/pages/ui-tree-view.js",
], "public/admin/js/pages/dashboard.js");
