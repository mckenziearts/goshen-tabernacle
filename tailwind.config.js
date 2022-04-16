const defaultTheme = require('tailwindcss/defaultTheme')
const colors = require('tailwindcss/colors')

module.exports = {
  darkMode: 'class',
  presets: [
    require('./vendor/wireui/wireui/tailwind.config.js')
  ],
  content: [
    './Modules/Dashboard/Resources/views/**/*.blade.php',
    './Modules/Event/Resources/views/**/*.blade.php',
    './Modules/Setting/Resources/views/**/*.blade.php',
    './Modules/Song/Resources/views/**/*.blade.php',
    './Modules/User/Resources/views/**/*.blade.php',

    './themes/goshen/admin/resources/views/**/*.blade.php',
    './themes/goshen/default/resources/views/**/*.blade.php',

    './resources/views/**/*.blade.php',
    './storage/framework/views/*.php',
    './vendor/wireui/wireui/resources/**/*.blade.php',

    './vendor/wireui/wireui/ts/**/*.ts',
    './vendor/wireui/wireui/src/View/**/*.php',
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './vendor/rappasoft/laravel-livewire-tables/resources/views/tailwind/**/*.blade.php',
  ],
  safelist: [
    'sm:max-w-2xl',
    'sm:max-w-2xl',
    'sm:max-w-md',
    'sm:max-w-3xl',
    'sm:max-w-4xl',
    'md:max-w-xl',
    'lg:max-w-2xl',
    'lg:max-w-3xl',
    'lg:max-w-4xl',
    { pattern: /^media-library/ }
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
        primary: colors.purple,
        secondary: colors.slate,
        positive: colors.emerald,
        success: colors.emerald,
        warning: colors.amber,
        negative: colors.red,
        danger: colors.red,
        info: colors.sky,
      },
      fontFamily: {
        sans: ['Inter var', ...defaultTheme.fontFamily.sans],
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
