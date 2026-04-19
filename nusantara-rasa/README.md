# Nusantara Rasa - E-Commerce Website

Website e-commerce untuk makanan khas Indonesia dengan tema nusantara modern.

## 🚀 Quick Start

### Prerequisites

- Node.js 18+
- npm atau yarn

### Installation

```bash
# Clone atau extract project
cd nusantara-rasa

# Install dependencies
npm install

# Start development server
npm run dev

# Build untuk production
npm run build

# Preview production build
npm run preview
```

## 📁 Struktur Project

```
nusantara-rasa/
├── public/              # Static files & manifest
├── src/
│   ├── components/      # Reusable components
│   │   ├── Navbar.tsx
│   │   ├── Footer.tsx
│   │   ├── ProductCard.tsx
│   │   ├── ProductModal.tsx
│   │   ├── Carousel.tsx
│   │   ├── UI.tsx       # Utility components
│   │   └── index.ts
│   ├── pages/           # Page components
│   │   ├── HomePage.tsx
│   │   ├── ProductsPage.tsx
│   │   ├── LoginPage.tsx
│   │   ├── RegisterPage.tsx
│   │   ├── CartPage.tsx
│   │   └── index.ts
│   ├── data/            # Static data
│   │   └── products.ts
│   ├── styles/          # Global styles
│   │   └── globals.css
│   ├── utils/           # Utility functions
│   │   └── helpers.ts
│   ├── types.ts         # TypeScript types
│   ├── store.ts         # Zustand state management
│   ├── App.tsx          # Main component
│   └── main.tsx         # Entry point
├── index.html
├── package.json
├── vite.config.ts
├── tailwind.config.js
├── tsconfig.json
└── README.md
```

## 🎨 Design System

### Colors (Nusantara Theme)

- **Primary**: #8B4513 (Coklat Kayu)
- **Accent**: #D2691E (Rempah)
- **Success**: #228B22 (Daun Hijau)
- **Gold**: #DAA520 (Emas)

### Fonts

- **Heading**: Noto Serif (nusantara feel)
- **Body**: Poppins (modern)

### Key Features

- Dark mode toggle
- Mobile-first responsive design
- Glassmorphism effects
- Smooth animations (Framer Motion)
- Batik overlay effects

## ✨ Features

### 📱 Homepage

- Hero carousel dengan animasi
- Featured products grid
- Kategori chips batik
- Testimonial slider
- Why choose us section
- Newsletter subscription

### 🛒 Products Page

- Filter sidebar (kategori, harga, rating)
- Product grid (3 kolom desktop, 2 mobile)
- Search bar real-time
- Pagination
- Quick view modal dengan zoom gambar
- Product detail dengan reviews

### 👤 Auth Pages

- Login dengan email/password
- Register dengan validasi realtime
- Google OAuth ready
- Password visibility toggle
- Remember me option

### 🛍️ Cart Page

- Add/remove items
- Quantity control
- Order summary
- Free shipping info
- Checkout button

## 🔧 Tech Stack

- **React 18** - UI Library
- **TypeScript** - Type safety
- **Vite** - Build tool
- **Tailwind CSS** - Utility-first CSS
- **React Router v6** - Routing
- **Zustand** - State management
- **Framer Motion** - Animations
- **Lucide Icons** - Icons
- **Axios** - HTTP client (ready to use)

## 🎯 State Management

### Cart Store

```typescript
useCart() // Get cart state
  .addItem()
  .removeItem()
  .updateQuantity()
  .clearCart()
  .getTotalItems()
  .getTotalPrice();
```

### Auth Store

```typescript
useAuth() // Get auth state
  .login()
  .register()
  .logout()
  .setUser();
```

State disimpan di localStorage untuk persistence.

## 🌐 Responsive Breakpoints

- **Mobile**: 0 - 640px (1 col)
- **Tablet**: 641px - 1024px (2 col)
- **Desktop**: 1025px+ (3-4 col)

## 🔐 Environment Setup

Buat file `.env` (optional):

```
VITE_API_URL=http://localhost:3001/api
VITE_GOOGLE_CLIENT_ID=your_google_client_id
```

## 📦 Available Scripts

```bash
# Development
npm run dev          # Start dev server on port 3000

# Building
npm run build        # Build untuk production
npm run preview      # Preview production build

# Linting
npm run lint         # Check for linting errors
```

## 🚀 Deployment

### Vercel

```bash
npm i -g vercel
vercel
```

### Netlify

```bash
npm run build
# Drag & drop dist folder ke netlify.com
```

### Traditional Hosting

```bash
npm run build
# Upload dist/ folder ke server
```

## 📝 API Integration

For API integration, update `src/store.ts`:

```typescript
// Replace mock API calls dengan real endpoints
export const useAuth = create<AuthStore>((set) => ({
  login: async (email: string, password: string) => {
    const response = await axios.post("/api/auth/login", { email, password });
    // Handle response...
  },
}));
```

## 🎨 Customization

### Warna

Edit `tailwind.config.js` di section `colors` untuk mengubah color scheme.

### Fonts

Edit `index.html` untuk mengubah font dari Google Fonts.

### Content

Edit `src/data/products.ts` untuk mengubah dummy data produk.

## 🔒 Security Best Practices

- ✓ XSS Protection via React
- ✓ CSRF Token ready (implement di API)
- ✓ Password validation
- ✓ Email validation
- ✓ Input sanitization

## 📱 PWA Ready

Sudah include:

- `manifest.json` untuk PWA
- Service worker ready
- Offline capability ready
- Installation prompt ready

## 🐛 Troubleshooting

### Port 3000 Sudah Terpakai

```bash
npm run dev -- --port 3001
```

### Build Error

```bash
rm -rf node_modules package-lock.json
npm install
npm run build
```

## 📄 License

Proyek ini bebas digunakan untuk keperluan komersial dan non-komersial.

## 🤝 Kontribusi

Untuk kontribusi atau perbaikan bug, silakan buat pull request.

---

**Dibuat dengan ❤️ untuk Indonesia**

Nusantara Rasa - Bringing Indonesian flavors to your table!
