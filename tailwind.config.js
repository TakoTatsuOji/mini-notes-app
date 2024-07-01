/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.php" ,"./controllers/*.php" ,"./views/**/*.php"],
  theme: {
    extend: {},
    container : {
      screens: {
        mobile: "550px",
        tablet: "650px",
        desktop: "750px"
      }
    }
  },
  // darkMode: 'class',
  plugins: [],
}

