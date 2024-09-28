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
      backgroundImage: {
        
        'form-bg': "url('images/bg.jpg')",
      },
    },
  },
  plugins: [
    require('preline/plugin'),
  ],
}

