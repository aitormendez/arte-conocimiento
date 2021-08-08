const colors = require('tailwindcss/colors');
const plugin = require('tailwindcss/plugin');

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
      typography: {
        DEFAULT: {
          css: {
            color: '#000',
            lineHeight: '1.2',
            maxWidth: 'inherit',
            a: {
              color: 'azul',
              textDecoration: 'none',
              fontWeight: 'inherit',
            },
          },
        },
      },
      fontFamily: {
        'sans': ['rubik', 'sans-serif'],
        'serif': ['times-new-roman', 'serif'],
      },
      colors: {
        blue: '#20479b',
        fondo: '#f0f0f0'
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
    plugin(function({ addComponents }) {
      const botones = {
        '.btn': {
          border: '1px solid #000',
          backgroundColor: '#fff',
          textTransform: 'uppercase',
          letterSpacing: '0.2em',
          fontSize: '0.8rem',
          color: '#000',
          padding: '0.7em 1em 0.6em'
        }
      }
      addComponents([botones])
    })
  ],
};