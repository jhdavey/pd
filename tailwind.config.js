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
        "2xs": ".625rem" // 10px
      },
      typography: {
        DEFAULT: {
          css: {
            ul: {
              listStyleType: 'disc',
              paddingLeft: '1.5rem', // Adjust the padding as needed
            },
            ol: {
              listStyleType: 'decimal',
              paddingLeft: '1.5rem', // Adjust the padding as needed
            },
            'ul > li::marker': {
              color: '#ffffff', // Customize bullet color if needed
            },
            'ol > li::marker': {
              color: '#ffffff', // Customize number color if needed
            },
            strong: {
              color: '#ffffff',
            },
            a: {
              color: '#ffffff',
            },
            'p > a': {
              color: '#ffffff',
            }
          },
        },
      },
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
}
