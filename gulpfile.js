// include the required packages.
var gulpfile = require('gulp')
var { watch } = require('gulp')
// var data     = require('gulp-data');
var stylus   = require('gulp-stylus')

// include, if you want to work with sourcemaps
let sourcemaps = require('gulp-sourcemaps');

// Get one .styl file and render
gulpfile.task('one', function () {
  watch('./src/assets/styles/*.styl', { events: 'all' }, function() {
    return gulpfile.src('./src/assets/styles/*.styl')
                   .pipe(sourcemaps.init())
                   .pipe(stylus())
                   .pipe(sourcemaps.write())
                   .pipe(gulpfile.dest('./assets/styles'))
  });
})
//
// // Options
// // Options compress
// gulpfile.task('compress', function () {
//   return gulpfile.src('./css/compressed.styl')
//                  .pipe(stylus({
//                compress: true
//              }))
//                  .pipe(gulpfile.dest('./css/build'));
// });
//
//
// // Set linenos
// gulpfile.task('linenos', function () {
//   return gulpfile.src('./css/linenos.styl')
//                  .pipe(stylus({linenos: true}))
//                  .pipe(gulpfile.dest('./css/build'));
// });
//
// // Include css
// // Stylus has an awkward and perplexing 'include css' option
// gulpfile.task('include-css', function() {
//   return gulpfile.src('./css/*.styl')
//                  .pipe(stylus({
//                'include css': true
//              }))
//                  .pipe(gulpfile.dest('./'));
//
// });
//
// // Inline sourcemaps
// gulpfile.task('sourcemaps-inline', function () {
//   return gulpfile.src('./css/sourcemaps-inline.styl')
//                  .pipe(sourcemaps.init())
//                  .pipe(stylus())
//                  .pipe(sourcemaps.write())
//                  .pipe(gulpfile.dest('./css/build'));
// });
//
// // External sourcemaps
// gulpfile.task('sourcemaps-external', function () {
//   return gulpfile.src('./css/sourcemaps-external.styl')
//                  .pipe(sourcemaps.init())
//                  .pipe(stylus())
//                  .pipe(sourcemaps.write('.'))
//                  .pipe(gulpfile.dest('./css/build'));
// });

// Pass an object in raw form to be accessable in stylus
// var data = {red: '#ff0000'};
// gulpfile.task('pass-object', function () {
//   gulpfile.src('./sty/main.styl')
//           .pipe(stylus({ rawDefine: { data: data }}))
//           .pipe(gulpfile.dest('./css/build'));
// });
//
// // Use with gulp-data
// gulpfile.task('gulp-data', function() {
//   gulpfile.src('./components/**/*.styl')
//           .pipe(data(function(file){
//         return {
//           componentPath: '/' + (file.path.replace(file.base, '').replace(/\/[^\/]*$/, ''))
//         };
//       }))
//           .pipe(stylus())
//           .pipe(gulpfile.dest('./css/build'));
// });

/* Ex:
body
  color: data.red;
*/

// Default gulp task to run
gulpfile.task('default', ['one', 'compress', 'linenos', 'sourcemaps-inline', 'sourcemaps-external', 'pass-object'])
