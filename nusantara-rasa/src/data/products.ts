// Dummy data untuk produk
import { Product, Testimonial } from "../types";

export const PRODUCTS: Product[] = [
  {
    id: "1",
    name: "Rendang Daging Sapi",
    category: "Padang",
    price: 45000,
    rating: 4.8,
    reviews: 234,
    image:
      "https://images.unsplash.com/photo-1455619452474-d2be8b1e4e31?w=400&h=400&fit=crop",
    description:
      "Rendang daging sapi tradisional dari Padang dengan bumbu rempah pilihan. Gurih, lembut, dan penuh cita rasa nusantara.",
    variants: ["Regular", "Pedas", "Sangat Pedas"],
    inStock: true,
  },
  {
    id: "2",
    name: "Nasi Goreng Kampung",
    category: "Jawa",
    price: 35000,
    rating: 4.7,
    reviews: 189,
    image:
      "https://images.unsplash.com/photo-1585937421891-4c4c86455580?w=400&h=400&fit=crop",
    description:
      "Nasi goreng dengan telur, udang, dan sayuran pilihan. Wangi dan lezat dengan bumbu khas Jawa.",
    variants: ["Biasa", "Pedas"],
    inStock: true,
  },
  {
    id: "3",
    name: "Sate Ayam Madura",
    category: "Jawa",
    price: 50000,
    rating: 4.9,
    reviews: 301,
    image:
      "https://images.unsplash.com/photo-1555939594-58d7cb561c1a?w=400&h=400&fit=crop",
    description:
      "Sate ayam empuk dengan bumbu kacang kental yang kaya rasa. Dibakar dengan arang untuk cita rasa autentik.",
    variants: ["5 Tusuk", "10 Tusuk", "20 Tusuk"],
    inStock: true,
  },
  {
    id: "4",
    name: "Gado-Gado Jakarta",
    category: "Jawa",
    price: 25000,
    rating: 4.6,
    reviews: 142,
    image:
      "https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=400&h=400&fit=crop",
    description:
      "Campuran sayuran dengan bumbu kacang kental dan telur rebus. Murah meriah dan bergizi.",
    variants: [],
    inStock: true,
  },
  {
    id: "5",
    name: "Baso Malang",
    category: "Jawa",
    price: 28000,
    rating: 4.7,
    reviews: 156,
    image:
      "https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=400&h=400&fit=crop",
    description:
      "Baso (bakso) daging sapi empuk dalam kuah kaldu yang gurih. Isi telur dan sayum mayem.",
    variants: ["Merah", "Kuah Putih"],
    inStock: true,
  },
  {
    id: "6",
    name: "Tahu Goreng Bali",
    category: "Bali",
    price: 22000,
    rating: 4.5,
    reviews: 118,
    image:
      "https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=400&h=400&fit=crop",
    description:
      "Tahu goreng dengan saus kacang dan sambal. Renyah di luar, lembut di dalam.",
    variants: [],
    inStock: true,
  },
  {
    id: "7",
    name: "Cakalang Fufu",
    category: "Manado",
    price: 55000,
    rating: 4.8,
    reviews: 267,
    image:
      "https://images.unsplash.com/photo-1555939594-58d7cb561c1a?w=400&h=400&fit=crop",
    description:
      "Babi goreng khas Manado yang renyah dan gurih. Terkenal dengan cita rasa yang khas Minahasan.",
    variants: ["Pedas", "Tidak Pedas"],
    inStock: true,
  },
  {
    id: "8",
    name: "Tinutuan Manado",
    category: "Manado",
    price: 32000,
    rating: 4.6,
    reviews: 134,
    image:
      "https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=400&h=400&fit=crop",
    description:
      "Bubur nasi dengan lauk pauk melimpah. Cocok untuk sarapan atau pencuci mulut.",
    variants: [],
    inStock: true,
  },
];

export const CATEGORIES = [
  { id: "1", name: "🏠 Padang", description: "Masakan Padang" },
  { id: "2", name: "☕ Jawa", description: "Masakan Jawa" },
  { id: "3", name: "🌴 Bali", description: "Masakan Bali" },
  { id: "4", name: "🌶️ Manado", description: "Masakan Manado" },
];

export const TESTIMONIALS: Testimonial[] = [
  {
    id: "1",
    name: "Budi Santoso",
    text: "Rendangnya authentik banget! Rasanya persis seperti di Padang. Kualitas terjamin dan pengiriman cepat.",
    rating: 5,
    city: "Jakarta",
  },
  {
    id: "2",
    name: "Siti Nurhaliza",
    text: "Nasi gorengnya lezat, anak-anak suka banget. Sekarang jadi order rutin setiap minggu.",
    rating: 5,
    city: "Bandung",
  },
  {
    id: "3",
    name: "Ahmad Wijaya",
    text: "Sate ayamnya juicy dan bumbu kacangnya pas. Cocok untuk acara keluarga besar kami.",
    rating: 4.8,
    city: "Surabaya",
  },
  {
    id: "4",
    name: "Retno Wulandari",
    text: "Puas dengan kualitas dan pelayanan. Bikin semua order jadi langganan. Recommended!",
    rating: 5,
    city: "Yogyakarta",
  },
];

export const REASONS = [
  {
    id: "1",
    title: "🌱 Bahan Alami",
    description: "Menggunakan bahan-bahan pilihan tanpa pengawet buatan",
  },
  {
    id: "2",
    title: "👨‍🍳 ResepAsli",
    description: "Resep tradisional turun-temurun dari setiap daerah",
  },
  {
    id: "3",
    title: "🚚 Pengiriman Cepat",
    description: "Sampai dalam kondisi fresh dan tepat waktu",
  },
  {
    id: "4",
    title: "⭐ Kualitas Premium",
    description: "Kontrol kualitas ketat di setiap tahapan produksi",
  },
];
