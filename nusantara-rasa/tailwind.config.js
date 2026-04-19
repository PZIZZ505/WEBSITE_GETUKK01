/** @type {import('tailwindcss').Config} */
export default {
  content: ["./index.html", "./src/**/*.{js,ts,jsx,tsx}"],
  darkMode: "class",
  theme: {
    extend: {
      colors: {
        // Brand colors - Nusantara theme
        primary: {
          50: "#f5f3f0",
          100: "#ede8e1",
          200: "#d4c4b0",
          300: "#ba9a7f",
          400: "#a0704e",
          500: "#8B4513", // Coklat kayu utama
          600: "#6d3410",
          700: "#5a2a0a",
          800: "#472006",
          900: "#3a1901",
        },
        accent: {
          50: "#fef3e2",
          100: "#fce4b8",
          200: "#f9d189",
          300: "#f5ba59",
          400: "#f2a435",
          500: "#D2691E", // Rempah
          600: "#b84e0a",
          700: "#933b02",
          800: "#6d2800",
          900: "#521a00",
        },
        success: {
          50: "#f0fdf4",
          100: "#dcfce7",
          200: "#bbf7d0",
          300: "#86efac",
          400: "#4ade80",
          500: "#228B22", // Daun hijau
          600: "#16a34a",
          700: "#15803d",
          800: "#166534",
          900: "#145231",
        },
        gold: {
          50: "#fffbeb",
          100: "#fef3c7",
          200: "#fde68a",
          300: "#fcd34d",
          400: "#fbbf24",
          500: "#DAA520", // Emas
          600: "#d97706",
          700: "#b45309",
          800: "#92400e",
          900: "#78350f",
        },
        nusantara: {
          dusk: "#1a1410",
          night: "#0f0c0a",
          cream: "#faf7f3",
          clay: "#8B4513",
        },
      },
      fontFamily: {
        poppins: ["Poppins", "sans-serif"],
        serif: ["Noto Serif", "serif"],
      },
      backdropBlur: {
        xs: "2px",
      },
      backgroundImage: {
        "gradient-radial": "radial-gradient(var(--tw-gradient-stops))",
        "batik-pattern":
          'url("data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 width=%27100%27 height=%27100%27%3E%3Cpath d=%27M50 0 Q100 50 50 100 Q0 50 50 0%27 fill=%27%238B4513%27 opacity=%270.05%27/%3E%3C/svg%3E")',
      },
      animation: {
        "fade-in": "fadeIn 0.5s ease-in-out",
        "slide-up": "slideUp 0.5s ease-out",
        "pulse-soft": "pulseSoft 2s cubic-bezier(0.4, 0, 0.6, 1) infinite",
      },
      keyframes: {
        fadeIn: {
          "0%": { opacity: "0" },
          "100%": { opacity: "1" },
        },
        slideUp: {
          "0%": { transform: "translateY(10px)", opacity: "0" },
          "100%": { transform: "translateY(0)", opacity: "1" },
        },
        pulseSoft: {
          "0%, 100%": { opacity: "1" },
          "50%": { opacity: "0.5" },
        },
      },
      boxShadow: {
        batik: "0 4px 14px rgba(139, 69, 19, 0.15)",
        card: "0 2px 8px rgba(0, 0, 0, 0.1)",
        hover: "0 8px 24px rgba(139, 69, 19, 0.2)",
      },
    },
  },
  plugins: [require("@tailwindcss/forms"), require("@tailwindcss/typography")],
};
