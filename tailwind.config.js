const defaultTheme = require('tailwindcss/defaultTheme')
const colors = require('tailwindcss/colors')

module.exports = {
  mode: 'jit',
  darkMode: 'class',
  presets: [
    require('./vendor/ph7jack/wireui/tailwind.config.js')
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

      './vendor/ph7jack/wireui/resources/**/*.blade.php',
      './vendor/ph7jack/wireui/ts/**/*.ts',
      './vendor/ph7jack/wireui/src/View/**/*.php',
      './vendor/rappasoft/laravel-livewire-tables/resources/views/tailwind/**/*.blade.php',
    ],
    options: {
      safelist: [/^media-library/],
    },
  },

  theme: {
    extend: {
      colors: {
        primary: colors.purple,
        secondary: colors.blueGray,
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
    },
  },

  variants: {
    extend: {
      opacity: ['disabled'],
    },
  },

  plugins: [
    require('@tailwindcss/aspect-ratio'),
    require('@tailwindcss/forms'),
    require('@tailwindcss/line-clamp'),
    require('@tailwindcss/typography'),
  ],
};
