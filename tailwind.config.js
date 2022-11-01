/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        colors: {
            gray: "#f6f6f6",
            primary: "#0c2c20",
            secondary: "#f54e00",
        }
    },
  },
  plugins: [],
}
