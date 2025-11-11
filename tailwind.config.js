/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          DEFAULT: "#1E3A8A", // Azul oscuro
          light: "#3B82F6",   // Azul claro
        },
        secondary: "#9333EA",  // Púrpura
      },
    },
  },
  plugins: [],
}
