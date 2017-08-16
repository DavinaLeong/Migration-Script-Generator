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

    // --- ParsleyJS end ---
    gulp.src([
        NODE_PATH + "parsleyjs/dist/**"
    ]).pipe(gulp.dest(VENDOR_PATH + "parsleyjs"));
    console.log("~ copied ParsleyJs files.");

    // --- PrismJS end ---
    gulp.src([
        NODE_PATH + "prismjs/**"
    ]).pipe(gulp.dest(VENDOR_PATH + "prismjs"));
    console.log("~ copied PrismJS files.");
});

gulp.task('clear-vendor', function() {
    del.sync([
        VENDOR_PATH + 'bootstrap/**',
        VENDOR_PATH + 'jquery/**',
        VENDOR_PATH + "parsleyjs/**",
        VENDOR_PATH + "prismjs/**",
        '!' + VENDOR_PATH
    ]);
});