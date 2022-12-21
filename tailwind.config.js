/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.{html,php}"],
  theme: {
    theme: {
      sm: '480px',
      md: '768px',
      lg: '976px',
      xl: '1440px',
    },
    extend: {
      colors: {
        newBlack: '#000000',
      }
    },
  },
  plugins: [],
}
