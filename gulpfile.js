const gulp = require('gulp');
const browserSync = require('browser-sync').create();
const watch = require('gulp-watch');

// Ruta a tus archivos
const paths = {
    php: './**/*.php',
    css: './css/**/*.css',
    js: './js/**/*.js'
};

// Tarea para iniciar BrowserSync
gulp.task('serve', () => {
    browserSync.init({
        proxy: 'http://localhost:3000', // Cambia esto según tu configuración en XAMPP
        port: 3000,
        notify: false
    });

    // Observa los cambios en tus archivos
    gulp.watch(paths.css).on('change', browserSync.reload);
    gulp.watch(paths.js).on('change', browserSync.reload);
    gulp.watch(paths.php).on('change', browserSync.reload);
});

// Tarea por defecto
gulp.task('default', gulp.series('serve'));
