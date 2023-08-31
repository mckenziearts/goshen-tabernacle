import aspect from '@tailwindcss/aspect-ratio'
import forms from '@tailwindcss/forms'
import typography from '@tailwindcss/typography'
import colors from 'tailwindcss/colors'
import { fontFamily }  from 'tailwindcss/defaultTheme'

/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    './resources/views/**/*.blade.php',
    './storage/framework/views/*.php',
    './vendor/filament/**/*.blade.php',
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './vendor/wire-elements/modal/resources/views/*.blade.php',
  ],
  safelist: [
    {
      pattern: /max-w-(xl|2xl|3xl|4xl)/,
      variants: ['sm', 'md', 'lg'],
    },
  ],
  theme: {
    extend: {
      animation: {
        fade: 'fadeOut 2s linear infinite',
      },
      keyframes: {
        fadeOut: {
          '0%': { opacity: 1 },
          '100%': { opacity: 0 },
        },
      },
      colors: {
        danger: colors.red,
        info: colors.sky,
        primary: colors.purple,
        secondary: colors.slate,
        success: colors.emerald,
        warning: colors.amber,
      },
      fontFamily: {
        sans: ['Inter var', ...fontFamily.sans],
      },
      maxHeight: {
        xs: '20rem',
        sm: '30rem',
        md: '40rem',
      },
      maxWidth: {
        '4.5xl': '60rem',
        '8xl': '90rem',
      },
      typography: (theme) => ({
        DEFAULT: {
          css: {
            color: theme('textColor.slate.500'),
            a: {
              textDecoration: 'none',
            },
            img: {
              borderRadius: theme('borderRadius.lg')
            },
          }
        }
      })
    }
  },
  plugins: [aspect, forms, typography],
};
