/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.{php,js}", "./**/*.{php,js}"],
  theme: {
    extend: {
      fontFamily: {
        jakarta: "Plus Jakarta Sans",
      },
      colors: {
        primary: "#4dab5b",
        paragraph: "#3f3e47",
        skyblue: "#b9cde9",
        darkblue: "#495464",
      },
    },
  },
  plugins: [],
};
