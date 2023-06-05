/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme');
module.exports = {
  content: ['./templates/**/*.{html,twig}'],
  theme: {
    extend: {
      fontFamily: {
        sans: ["'Inter'", ...defaultTheme.fontFamily.sans],
        title: ["'Space Grotesk'", ...defaultTheme.fontFamily.sans],
      },
      backgroundImage: {
        'hero-pattern': "url('/img/1685932070526.png')",
      }
    },
  },
  plugins: [],
}

