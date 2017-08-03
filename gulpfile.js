var gulp = require('gulp');
var sass = require('gulp-sass');
var livereload = require('gulp-livereload');
var csscomb = require('gulp-csscomb');
var cleanCSS = require('gulp-clean-css');


gulp.task('sass', function () {
  return gulp.src('./styles/sass/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    //.pipe(cleanCSS())    
    .pipe(gulp.dest('./styles/css'))
    .pipe(livereload());
});
gulp.task('htmlreload', function(){
    return gulp.src('./index.html').pipe(livereload());
});

gulp.task('watch',function(){
    livereload.listen();
    /*gulp.watch("fichier a effectuer")*/
    gulp.watch(["./styles/sass/**/*.scss","./*.html","./$.php"], ["sass" , "htmlreload"]);

})
//si ca marche plus-> CTRL+SHIFT+R
gulp.task('styles', function() {
  return gulp.src('./styles/sass/**/*.scss')
    .pipe(csscomb())
    .pipe(gulp.dest('./styles/sass'));
});

gulp.task('stylesC', function() {
  return gulp.src('./styles/css/*.css')
    .pipe(csscomb())
    .pipe(gulp.dest('./styles/css'));
});

gulp.task('minify-css', function() {
  return gulp.src('./styles/css/**/*.css')
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(gulp.dest('./StylesFini'));
});