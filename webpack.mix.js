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

mix.js('resources/assets/js/semester.js', 'public/js');
mix.js('resources/assets/js/jurusan.js', 'public/js');
mix.js('resources/assets/js/mahasiswa.js', 'public/js');
mix.js('resources/assets/js/dosen.js', 'public/js');
mix.js('resources/assets/js/kelas.js', 'public/js');
mix.js('resources/assets/js/matkul.js', 'public/js');