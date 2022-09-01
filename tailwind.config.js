/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/views/**/*.blade.php',
  ],
  theme: {
    extend: {
      typography: {
        DEFAULT: {
          css: {
            'blockquote p:first-of-type::before': 'none',
            'blockquote p:first-of-type::after`': 'none',
            blockquote: {
              fontStyle: 'normal',
            }
          }
        }
      }
    },
  },
  plugins: [
    require('@tailwindcss/typography')
  ],
}
