/** @type {import('tailwindcss').Config} */
export default {

   prefix: 'tw-',

  darkMode: 'class',
  content: [

    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"

  ],
  theme: {

    extend: {

        colors: {

          }


      },
      fontFamily: {
        sans: [
            'Inter',
            'ui-sans-serif',
            'system-ui',
            '-apple-system',
            'system-ui',
            'Segoe UI',
            'Roboto',
            'Helvetica Neue',
            'Arial',
            'Noto Sans',
            'sans-serif',
            'Apple Color Emoji',
            'Segoe UI Emoji',
            'Segoe UI Symbol',
            'Noto Color Emoji'
          ],
        serif: ['Merriweather', 'serif'],
        body: [
            'Inter',
            'ui-sans-serif',
            'system-ui',
            '-apple-system',
            'system-ui',
            'Segoe UI',
            'Roboto',
            'Helvetica Neue',
            'Arial',
            'Noto Sans',
            'sans-serif',
            'Apple Color Emoji',
            'Segoe UI Emoji',
            'Segoe UI Symbol',
            'Noto Color Emoji'
          ],
      },
    extend: {
        spacing: {
            // '128': '32rem',
            // '144': '36rem',
          }, borderRadius: {
            // '4xl': '2rem',
          }
    },
  },
  plugins: [

    require('flowbite/plugin')
  ],
}

