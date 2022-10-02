/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./index.html"],
  theme: {
    extend: {
      colors: {
        "brand-purple": {
          300: "#6a5d8a",
          800: "#35274d",
          900: "#261a3a",
        },
      },
    },
  },
  plugins: [],
};
