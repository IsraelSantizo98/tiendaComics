//CSS
//Retorna funciones necesarias para el proyecto, son apis
const {src, dest, watch, parallel} = require('gulp');
//Indica la ruta para poder compilar sass y traducirlo en css y que el navegador lo puede reconocer
const sass = require ("gulp-sass")(require('sass'));
const plumber = require('gulp-plumber');
//Imagenes
const cache = require('gulp-cache');
const imagemin = require('gulp-imagemin');
const webp = require ('gulp-webp');
const avif= require('gulp-avif');
function css (done){
    //Se asigna la ruta donde esta el archivo a compilar y los asteriscos le dice que todos los archivos con esa extension
    src('src/scss/**/*.scss')
        //Evitar que se detenga el workflow con algun error
        .pipe(plumber())
        //Leer el archivo y compilarlo
        .pipe(sass())
        //Donde almacena el archivo compilado
        .pipe(dest('build/css'))
    //Finaliza la tarea    
    done();
}
function imagenes(done){
    const opciones = {
        optimizationLevel: 3
    }
    src('src/img/**/*.{png,jpg}')
        .pipe(cache(imagemin(opciones)))
        .pipe (dest('build/img'))
    done();
}
function versionWebp(done){
    const opciones = {
        //La calidad de las imagnes, de 1 a 100
        quality: 100
    };
    //La ruta donde se guarda los archivos convertidos y que sean con la extensiones en parentesis
    src('src/img/**/*.{png,jpg}')
        //Se pasa el parametro de la calidad de las imagenes
        .pipe(webp(opciones))
        //Ruta de destino o guradado
        .pipe(dest('build/img'))
    //Finaliza la tarea
    done();
}
function versionAvif(done){
    const opciones = {
        quality: 50
    };
    src('src/img/**/*.{png,jpg}')
        .pipe(avif(opciones))
        .pipe(dest('build/img'))
    done();
}
function dev(done){
    watch('src/scss/**/*.scss', css)
    done();
}
//Habilitar las funciones y poder mandarlas a llamar
exports.css = css;
exports.versionWebp = versionWebp;
exports.dev = parallel(versionWebp, imagenes, dev, versionAvif);