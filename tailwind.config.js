module.exports = {
  content: ["**/*.html", "**/*.php"],
  theme: {
    container: {
      center: true,
      padding: {
        DEFAULT: '1.25rem',
        lg: '2.5rem',
        '2xl': '5rem',
        '4xl': '6rem',
      },
    },
    extend: {
      colors: {
        'theme-color': 'var(--color-theme)',
        'text-color': 'var(--color-text)',
        'yellow-color': 'var(--color-yellow)',
        'light-color': 'var(--color-light)',
        'field-color': 'var(--color-field)',
      },
      spacing: {
        '26': '6.5rem',
      },
      screens: {
        '2xl': '1440px',
        '3xl': '1600px',
        '4xl': '1800px',
      },
      fontSize: {
        '4.5xl': '2.75rem',
      },
      transitionProperty: {
        'height': 'height',
        'spacing': 'margin, padding',
      },
      boxShadow: {
        'custom': '0px 4px 15px rgba(0, 0, 0, 0.15)',
      },
      aspectRatio: {
        '4/3': '4 / 3',
      },
      rotate: {
        '360': '360deg',
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
