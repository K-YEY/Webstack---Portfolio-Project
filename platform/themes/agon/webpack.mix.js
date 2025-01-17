let mix = require('laravel-mix')

const path = require('path')
let directory = path.basename(path.resolve(__dirname))

const source = 'platform/themes/' + directory
const dist = 'public/themes/' + directory

mix
    .sass(`${source}/assets/sass/style.scss`, `${dist}/css`)
    .js(`${source}/assets/js/script.js`, `${dist}/js`)
    .js(`${source}/assets/js/main.js`, `${dist}/js`)
    .js(`${source}/assets/js/ecommerce.js`, `${dist}/js`)

if (mix.inProduction()) {
    mix
        .copy(dist + '/css/style.css', source + '/public/css')
        .copy(dist + '/js/script.js', source + '/public/js')
        .copy(dist + '/js/main.js', source + '/public/js')
        .copy(dist + '/js/ecommerce.js', source + '/public/js')
}
