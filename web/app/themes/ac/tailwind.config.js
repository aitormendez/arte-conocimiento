const colors = require('tailwindcss/colors')

module.exports = {
  mode: 'jit',
  purge: {
    content: [
      './app/**/*.php',
      './resources/**/*.php',
      './resources/**/*.vue',
      './resources/**/*.js',
    ],
  },
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      fontFamily: {
        'sans': ['rubik', 'sans-serif'],
        'serif': ['times-new-roman', 'serif'],
      },
      colors: {
        blue: '#2c38d4'
      },
      screens: {
        '3xl': '1796px',
      },
    },
    debugScreens: {
      position: ['bottom', 'left'],
    },
  },
  variants: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/typography'),
    require('tailwindcss-debug-screens'),
  ],
};
