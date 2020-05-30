const purgecss = require('@fullhuman/postcss-purgecss');
const cssnano = require('cssnano');

module.exports = {
  plugins: [
    require('tailwindcss'),
    cssnano({
      preset: 'default',
    }),
    purgecss({
      content: ['./public/**/*.html', './public/**/*.php', './public/*.php'],
      defaultExtractor: (content) => content.match(/[\w-/:]+(?<!:)/g) || [],
    }),
    require('autoprefixer'),
  ],
};
