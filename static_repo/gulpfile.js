var gulp = require('gulp');
var del = require('del');

const NODE_PATH = './node_modules/';
const VENDOR_PATH = './vendor/';

gulp.task('default', ['clear-vendor', 'copy-vendor']);

gulp.task('copy-vendor', function() {
    // jquery
    gulp.src(NODE_PATH + 'jquery/dist/**')
        .pipe(gulp.dest(VENDOR_PATH + '/jquery'));
    console.log('~ copied jquery files')

    // bootstrap
    gulp.src(NODE_PATH + 'bootstrap/dist/**')
        .pipe(gulp.dest(VENDOR_PATH + '/bootstrap'));
    console.log('~ copied bootstrap files');
});

gulp.task('clear-vendor', function() {
    del.sync([
        VENDOR_PATH + 'bootstrap/**',
        VENDOR_PATH + 'jquery/**',
        '!' + VENDOR_PATH
    ]);
});