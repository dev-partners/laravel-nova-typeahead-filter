let mix = require('laravel-mix')

require('./nova.mix')

mix
  .setPublicPath('dist')
  .js('resources/js/filter.js', 'js')
  .vue({ version: 3 })
  .sass('resources/sass/filter.scss', 'css')
  .nova('devpartners/typeahead-filter')
