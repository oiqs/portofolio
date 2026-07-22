/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        paper: "#F3F4F6",
        ink: "#14161A",
        muted: "#6B7280",
        wine: "#7C2D3B",
        "wine-dark": "#5E2029",
      },
      fontFamily: {
        display: ['"Fraunces"', "serif"],
        body: ['"Inter"', "sans-serif"],
      },
    },
  },
  plugins: [],
}