// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
// ===========================================================================================================
// Config
// ===========================================================================================================
'use strict';

// :: Process
// npm i browser-sync --save
//
// npm install --save-dev 
// gulp 
// gulp-concat
// gulp-asset-hash
// gulp-notify
// gulp-plumber
// gulp-rename
// gulp-load-plugins
// gulp-sourcemaps
// gulp-uglify
// vinyl-buffer
// vinyl-source-stream

// :: Styles
// :: Sass > Autoprefixer > Minify
// npm install --save-dev 
// gulp-autoprefixer
// gulp-clean-css
// gulp-sass-lint
// sass (Dart SCSS compiler)
// gulp-sass
// gulp-sass-lint



// :: Scripts
// :: Babel > Concatenate > Minify
// npm install --save-dev 
// browserify
// babelify
//
//
//
// gulp-babel

// :: Require Gulp plugins
// -----------------------
const { src, dest, series, parallel } = require('gulp'), // The big kahoona that makes all this work - load the Gulp core

    // :: Process
    gulp = require('gulp'),
    browsersync = require('browser-sync').create(),
    concat = require('gulp-concat'), // Add source maps to css file
    buster = require('gulp-asset-hash'),
    notify = require('gulp-notify'),
    plumber = require('gulp-plumber'), // Error handler that keeps things moving
    rename = require('gulp-rename'), // Add source maps to css file    
    sourcemaps = require('gulp-sourcemaps'), // Add source maps to css file
    uglify = require('gulp-uglify'),
    buffer = require("vinyl-buffer"),
    source = require("vinyl-source-stream"),
    //imagemin = require("gulp-imagemin"),

    // :: Styles
    autoprefixer = require('gulp-autoprefixer'),
    cleanCSS = require('gulp-clean-css'), // Minify CSS
    sass = require('gulp-sass')(require('sass')),
    sasslint = require('gulp-sass-lint'),

    // :: Scripts
    browserify = require('browserify'),
    babelify = require('babelify'),
    //
    //
    //
    babel = require("gulp-babel");

// :: Paths
// -----------------------
const config = {
    themeScssPath: 'src/scss', // Theme asset paths for theme SCSS
    themeJsPath: 'src/js/', // Theme asset paths for theme JS
    nmPath: 'node_modules/', // Node modules src assets root path
    destCss: 'build/css', // destination of compiled CSS
    destJs: 'build/js', // destination of compiled SCRIPTS
    destImages: 'build/images', // destination of compiled SCRIPTS
    themeScssPathAll: 'src/scss/**/*.scss', // Paths to src files to watch for 'styles task'
    themeJsPathAll: 'src/js/**/*.js', // Paths to src files to watch for 'scripts task'
    //themeImagesPathAll: 'src/images/',
};

const vendorScssPathList = [
    // config.nmPath + 'slick-carousel/slick/'
];

/**
 * 
 * :: STYLES
 * 
 */
// :: Styles task
// --------------
function processStyles() {
    return gulp
        .src([
            // config.nmPath + '/normalize-scss/sass/',
            config.themeScssPath + '/styles.scss',
            // '.'

        ]) // Theme root SCSS file that imports all other partials
        .pipe(plumbError())
        .pipe(
            sass({
                // includePaths: require("normalize-scss").includePaths,
                includePaths: config.nmPath,
            })
        )
        .pipe(
            sass({
                // includePaths: vendorScssList,
                // includePaths: vendorScssPathList,
                includePaths: ['.'],
                // outputStyle: 'compressed',
                precision: 10,

                // includePaths: require("node-normalize-scss").includePaths,
            })
                .on('error', function (err) {
                    sass.logError; // I think we should also print in the console
                    return notify().write(err); // and the notification bar
                })
        )
        .pipe(sourcemaps.init())
        .pipe(autoprefixer(['last 15 versions', '> 1%', 'ie 8', 'ie 7']))
        .pipe(rename('styles.min.css'))
        // .pipe(cleanCSS({
        //     format: 'beautify', // formats output in a really nice way
        //     level: 2 // strict cleaning of the CSS
        // }))
        // .pipe(cleanCSS()) // minify
        // .pipe(sourcemaps.write())
        .pipe(gulp.dest(config.destCss))
        .pipe(browsersync.stream());
}

// Sass lint task
// -----------------------
// Sublimtext - if package SublimeLinter-contrib-sass-lint is installed. 
// 'Ctrl + Cmd' + 'a' to oopen lint console
function sassLinter() {
    return gulp
        .src([
            'src/scss/**/*.scss' // we only want to lint our own scss
        ])
        .pipe(sasslint({
            options: {
                configFile: 'sass-lint.yml' // Lint rules
            }
        }))
        .pipe(sasslint.format())
        .pipe(sasslint.failOnError())
};
/**
 * 
 * :: /STYLES
 * 
 */

/**
 * 
 * :: SCRIPTS
 * 
 * 
 * :: Review sourcemaps - https://stackoverflow.com/questions/32502678/gulp-uglify-and-sourcemaps
 * 
 */
function processScripts() {
    return browserify({
        // entries: [`${paths.source}/scripts/main.js`],
        // entries: [config.themeJsPathAll],
        entries: [`src/js/scripts.js`],

        debug: true,
        transform: [
            babelify.configure({
                presets: ["@babel/preset-env"]
                // presets: ["es2015"]
            })
        ]
    })
        .bundle()
        .pipe(source("scripts.js"))
        .pipe(buffer())
        .pipe(rename('scripts.min.js'))
        // .pipe(uglify()) // minify
        .pipe(sourcemaps.write('maps'))
        .pipe(gulp.dest(config.destJs));
}
/**
 * 
 * :: SCRIPTS
 * 
 */


/**
 * 
 * :: nonce SCRIPTS
 * 
 * 
 * :: Review sourcemaps - https://stackoverflow.com/questions/32502678/gulp-uglify-and-sourcemaps
 * 
 */
function processNonceScripts() {
    return browserify({
        // entries: [`${paths.source}/scripts/main.js`],
        // entries: [config.themeJsPathAll],
        entries: [`src/js/scripts-nonce.js`],

        debug: true,
        transform: [
            babelify.configure({
                presets: ["@babel/preset-env"]
                // presets: ["es2015"]
            })
        ]
    })
        .bundle()
        .pipe(source("scripts-nonce.js"))
        .pipe(buffer())
        .pipe(rename('scripts-nonce.min.js'))
        // .pipe(uglify()) // minify
        .pipe(sourcemaps.write('maps'))
        .pipe(gulp.dest(config.destJs));
}
/**
 * 
 * :: nonce SCRIPTS
 * 
 */



/**
 * 
 * :: Images
 * 
 */
// function processImages() {
//     return gulp
//         .src('src/images/*')
//         .pipe(imagemin())
//         .pipe(gulp.dest(config.destImages));

// }
/**
 * 
 * /:: Images
 * 
 */
/**
 * 
 * :: GULP PROCESSES
 * 
 */
// Error handler.
function plumbError() {
    return plumber({
        errorHandler: function (err) {
            notify.onError({
                templateOptions: {
                    date: new Date()
                },
                title: "Gulp error in " + err.plugin,
                message: err.formatted
            })(err);
            this.emit('end');
        }
    })
}

// :: BrowserSync task (callback)
// -----------------------
function browserSync(cb) {
    browsersync.init({
        proxy: "shizlpea.local/", // Change this value to match your local URL.
        socket: {
            domain: 'localhost:3000'
        }
    });
    cb();
}

// :: Browsersync reload task (callback)
// -----------------------
function browserSyncReload(cb) {
    browsersync.reload();
    cb();
}

// :: Watch task
// -----------------------
function watchFiles() {
    // gulp.watch(config.themeScssPathAll, gulp.series(processStyles, sassLinter)); // Watch for style changes in 'lib' & 'theme'


    //gulp.watch(config.themeImagesPathAll, gulp.series(processImages)); // Watch for style changes in 'lib' & 'theme'
    gulp.watch(config.themeScssPathAll, gulp.series(processStyles)); // Watch for style changes in 'lib' & 'theme'
    gulp.watch(config.themeJsPathAll, gulp.series(processScripts, processNonceScripts, browserSyncReload)); // Watch for script changes in 'lib' & 'theme'

    // theme files
    gulp.watch(
        [
            // "./**/*.scss",
            "./**/*.php",
            "./**/*.twig"
        ],
        gulp.series(browserSyncReload)
    )
}
/**
 * 
 * :: /GULP PROCESSES
 * 
 */

// Gulp tasks
// -----------------------
// const processStyles = gulp.series(processStyle, sassLinter);
const stylesTask = gulp.series(processStyles);
// const scriptsTask = gulp.series(processScripts);
const scriptsTask = gulp.parallel(processScripts, processNonceScripts);
// const scriptsTask = gulp.series(processNonceScripts);
const watchTask = gulp.parallel(watchFiles, browserSync);
const build = gulp.parallel(processStyles, watchFiles);

// Expose tasks
// -----------------------
exports.css = stylesTask; // $ gulp css
exports.js = scriptsTask; // $ gulp js
// exports.nonceJs = scriptsNonceTask; // $ gulp nonce
// exports.sassLint = sassLinter; // $ gulp sassLinter
exports.watch = watchTask; // $ gulp watch
exports.default = build; // $ gulp