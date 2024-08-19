/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",
    'node_modules/preline/dist/*.js',
  ],
  theme: {
    extend: {
      colors: {
        'custom-green': '#107914',  
      },
    },
  },
  plugins: [
    require('preline/plugin'),
    require('daisyui'),
  ],
}

