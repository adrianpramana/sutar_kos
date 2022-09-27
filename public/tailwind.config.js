/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./*.{html,js,php}'],
  darkMode: 'class',
  theme: {
    container: {
      center: true,
      padding: '16px',
    },
    extend: {
      spacing: {
        13: '3.25rem',
      },
      colors: {
        primary: '#002B5B',
        secondary: '#64748b',
        dark: '#0f172a',
      },
      screens: {
        '2xl': '1320px',
      },
    },
  },
  plugins: [],
};
