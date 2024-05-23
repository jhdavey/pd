/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        background: '#0f141d'
      },
      fontFamily: {
        sans: ['"Work Sans"', 'sans-serif'],
      },
      fontSize: {
        "2xs": ".625rem" //10px
      }
    }
  },
  plugins: [],
}

// Old Black bg #060606