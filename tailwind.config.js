/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./public/**/*.js",
    "./*.js",
    "./*.html",
    "./*.php"
  ],
  theme: {
    extend: {
      fontFamily: {
        roboto: ['Roboto', 'sans-serif'],
      },
      spacing: {
        '13': '3.25rem',
        '4.5': '1.125rem',
      },
      boxShadow: {
        '2xs': '0 1px 2px 0 rgba(0, 0, 0, 0.05)',
        'xs': '0 1px 2px 0 rgba(0, 0, 0, 0.05)',
      },
      scale: {
        '108': '1.08',
        '115': '1.15',
      },
      borderWidth: {
        '3': '3px',
      },
      colors: {
        'slate-850': '#172033',
        brand: {
          50: '#fefce8',
          100: '#fef9c3',
          400: '#facc15',
          500: '#eab308',
          600: '#ca8a04',
          900: '#713f12',
        },
      },
    },
  },
  plugins: [],
}