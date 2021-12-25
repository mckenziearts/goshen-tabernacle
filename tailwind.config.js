const defaultTheme = require('tailwindcss/defaultTheme')
const colors = require('tailwindcss/colors')

module.exports = {
  mode: 'jit',
  darkMode: 'class',
  presets: [
    require('./vendor/wireui/wireui/tailwind.config.js')
  ],
  purge: {
    content: [
      './Modules/Dashboard/Resources/views/**/*.blade.php',
      './Modules/Event/Resources/views/**/*.blade.php',
      './Modules/Setting/Resources/views/**/*.blade.php',
      './Modules/User/Resources/views/**/*.blade.php',

      './themes/goshen/admin/resources/views/**/*.blade.php',
      './themes/goshen/default/resources/views/**/*.blade.php',

      './resources/views/**/*.blade.php',
      './storage/framework/views/*.php',

      './vendor/wireui/wireui/resources/**/*.blade.php',
      './vendor/wireui/wireui/ts/**/*.ts',
      './vendor/wireui/wireui/src/View/**/*.php',
      './vendor/rappasoft/laravel-livewire-tables/resources/views/tailwind/**/*.blade.php',
    ],
    options: {
      safelist: [/^media-library/],
    },
  },

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
        primary: colors.purple,
        secondary: colors.blueGray,
        positive: colors.emerald,
        success: colors.emerald,
        warning: colors.amber,
        negative: colors.red,
        danger: colors.red,
        info: colors.sky,
        violet: colors.violet,
      },
      fontFamily: {
        sans: ['Inter var', ...defaultTheme.fontFamily.sans],
      },
      maxWidth: {
        '4.5xl': '60rem',
        '8xl': '90rem',
      },
      typography: (theme) => ({
        DEFAULT: {
          css: {
            color: theme('textColor.gray.500'),
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
  plugins: [
    require('@tailwindcss/aspect-ratio'),
    require('@tailwindcss/forms'),
    require('@tailwindcss/line-clamp'),
    require('@tailwindcss/typography'),
  ],
};
