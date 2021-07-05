const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  mode: 'jit',
  purge: {
    content: [
      './Modules/Dashboard/Resources/views/**/*.blade.php',
      './Modules/Event/Resources/views/**/*.blade.php',
      './Modules/Setting/Resources/views/**/*.blade.php',
      './resources/views/**/*.blade.php',
      './storage/framework/views/*.php'
    ],
    options: {
      safelist: [/^media-library/],
    },
  },

  theme: {
    extend: {
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
