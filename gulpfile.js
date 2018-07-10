var gulp = require('gulp');
var browserSync = require('browser-sync').create(); //reloading while saving file
var php = require('gulp-connect-php'); //for PHP server

// ------------------------------------------------- //
// --------- Server and watching for changes --------//
// ------------------------------------------------- //


gulp.task('php', function() {
    php.server({ base: 'src', port: 80, keepalive: true, hostname: 'localhost'});
});

gulp.task('browser-sync',['php'], function() {
    browserSync.init({
        proxy: 'tx.me',
        port: 80
    });
});

gulp.task('htmlServer', function() {
    gulp.src(['resources/views/admins/layouts/*.+(html|ico|php)'])
        .pipe(browserSync.reload({
            stream: true
        }));
});

gulp.task('stylesServer', function() {
    gulp.src(['src/styles/*.css'])
        .pipe(browserSync.reload({
            stream: true
        }));
});

gulp.task('jsServer', function() {
    gulp.src(['js/*.js'])
        .pipe(browserSync.reload({
            stream: true
        }));
});

// --------- wrapped together --------- //

gulp.task('server', ['browser-sync','php','htmlServer','stylesServer','jsServer'], function() {
    gulp.watch('src/styles/*.css',['stylesServer']);
    // gulp.watch('src/*.+(html|php)',['htmlServer']);
    gulp.watch('js/*.js',['jsServer']);
    gulp.watch('resources/*',['htmlServer']);
});

gulp.task('default', ['browser-sync']);