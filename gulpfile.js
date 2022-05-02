'use strict';

const { src, series, parallel, dest, watch } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const plumber = require('gulp-plumber');                // watch中にエラーが発生してもwatchが止まらないようにする
const notify = require('gulp-notify');
const sassGlob = require('gulp-sass-glob-use-forward'); // glob機能を使って@useや@forwardを省略する
const autoprefixer = require('gulp-autoprefixer');      // ベンダープレフィックスを自動付与する
const uglify = require('gulp-uglify');
const rename = require('gulp-rename');
const imagemin = require('gulp-imagemin');
const changed = require('gulp-changed');
const pngquant = require('imagemin-pngquant');
const mozjpeg = require('imagemin-mozjpeg');
const fibers = require('fibers');
const browserSync = require('browser-sync');

//scssをコンパイルする
function cssTranspile() {
  return src('./src/sass/**/*.scss')
    // .pipe(plumber())
    // .pipe(sassGlob({
    //   errorHandler: notify.onError('<%= error.message %>')
    // }))
    // .pipe(sass(
    //   { fiber: fibers }
    // ))
    .pipe(sass({outputStyle: "expanded"}))
    // .pipe(autoprefixer())   
    .pipe(dest('./dist/css'));
}

//jsファイルを圧縮する
function jsTranspile() {
  return src('./src/js/*') 
    .pipe(uglify())
    .pipe(rename({
      extname: '.min.js'
    }))
    .pipe(dest('./dist/js'));
}

//画像を圧縮する
function imgTask() {
  return src('./src/img/**/*')
  .pipe(changed('./dist/img/')) //最後に*は不要
  .pipe(
    imagemin([
      pngquant({
        quality: [0.6, 0.7], //60〜70%の画質で圧縮する
        speed: 1,            //実行速度、数が大きいほど処理が速いが品質が落ちる。よって1を指定する。
      }),
      mozjpeg({ quality:70 }),
      imagemin.svgo(),
      imagemin.optipng(),
      imagemin.gifsicle({ optimizationLevel: 3 }), // 1~7で指定可能
    ])
  )
  .pipe(dest('./dist/img'));
}

function serverLoad(done) {
  browserSync({
    server: {
      baseDir: "./"               // browser-syncが基準とするディレクトリを指定する
    },
    startPath: "./index.html",      // 開きたいパスを指定する
    files:"./**",                 // 指定した値が変更されるとブラウザをリロードする
    port : 3000,                      // browsersyncサーバが使うポート番号を変更できる
    notify: false,                    // ブラウザ更新時に出てくる通知を非表示にする
    open: "external",                 // ローカルIPアドレスでサーバを立ち上げる
  });

  done();
}

// ファイルに変更があったかどうかを監視する
function watchFiles(done) {
    watch(['src/sass/*', 'src/sass/**/*'], cssTranspile);
    watch(['src/js/**/*'],  jsTranspile);
    watch(['src/img/**/*'], imgTask);
    watch('./*.html', serverLoad);
    done();
}

// npx gulpというコマンドを実行した時、watchFilesが実行される
exports.default = watchFiles;


// // ファイルをコピーする
// function copyFiles() {
//   return src('./src/**/*.html')
//   .pipe($.rename({
//     prefix: 'hello-',     //ファイル名の先頭に付与
//     extname: '.min.html'  //ファイル名の末尾に付与
//   }))
//   .pipe(dest('./dist'));
// }



