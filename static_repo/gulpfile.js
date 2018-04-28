const PATHS = {
    nodeModules: './node_modules/',
    vendor: './vendor/'
};

const GULP = require('gulp'),
    DEBUG = require('gulp-debug'),
    DEL = require('del');


GULP.task('default', ['clear-vendor', 'copy-vendor']);

GULP.task('copy-vendor', function() {
    // jquery
    GULP.src(PATHS.nodeModules + 'jquery/dist/**/*.js')
        .pipe(DEBUG({tite: 'Copying jQuery resources'}))
        .pipe(GULP.dest(PATHS.vendor + '/jquery'));

    // popper
    GULP.src(PATHS.nodeModules + 'popper.js/dist/umd/**/*.js')
        .pipe(DEBUG({tite: 'Copying Popper.js resources'}))
        .pipe(GULP.dest(PATHS.vendor + '/popper.js'));

    // bootstrap
    GULP.src(PATHS.nodeModules + 'bootstrap/dist/**')
        .pipe(DEBUG({tite: 'Copying bootstrap resources'}))
        .pipe(GULP.dest(PATHS.vendor + '/bootstrap'));

    // ParsleyJS end
    GULP.src([
            PATHS.nodeModules + "parsleyjs/dist/**/*.*"
        ])
        .pipe(DEBUG({tite: 'Copying ParsleyJS resources'}))
        .pipe(GULP.dest(PATHS.vendor + "parsleyjs"));

    // PrismJS end
    GULP.src([
            PATHS.nodeModules + "prismjs/**/*.*"
        ])
        .pipe(DEBUG({tite: 'Copying PrismJS resources'}))
        .pipe(GULP.dest(PATHS.vendor + "prismjs"));
});

GULP.task('clear-vendor', function() {
    DEL.sync([
        PATHS.vendor + 'bootstrap/**',
        PATHS.vendor + 'jquery/**',
        PATHS.vendor + "parsleyjs/**",
        PATHS.vendor + "popper.js/**",
        PATHS.vendor + "prismjs/**",
        '!' + PATHS.vendor
    ]);
});