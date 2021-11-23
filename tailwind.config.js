const defaultTheme = require('tailwindcss/defaultTheme')
const colors = require('tailwindcss/colors')

module.exports = {
  mode: 'jit',
  darkMode: 'class',
  purge: {
    content: [
      './Modules/Dashboard/Resources/views/**/*.blade.php',
      './Modules/Event/Resources/views/**/*.blade.php',
      './Modules/Setting/Resources/views/**/*.blade.php',
      './themes/goshen/admin/resources/views/**/*.blade.php',
      './themes/goshen/default/resources/views/**/*.blade.php',
      './resources/views/**/*.blade.php',
      './storage/framework/views/*.php'
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
        warning: colors.amber,
        negative: colors.red,
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
