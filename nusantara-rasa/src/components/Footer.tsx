import React from "react";
import {
  Mail,
  Phone,
  MapPin,
  Facebook,
  Instagram,
  Twitter,
  Send,
} from "lucide-react";

// Footer Component
export const Footer: React.FC = () => {
  const [email, setEmail] = React.useState("");

  const handleSubscribe = (e: React.FormEvent) => {
    e.preventDefault();
    // Implementasi subscribe logic
    setEmail("");
  };

  return (
    <footer className="bg-nusantara-dusk dark:bg-nusantara-night text-nusantara-cream">
      <div className="section-padding section-max">
        {/* Newsletter Section */}
        <div className="mb-12 pb-12 border-b border-white/20">
          <h3 className="text-2xl font-bold mb-4">
            Dapatkan Penawaran Eksklusif
          </h3>
          <p className="text-gray-300 mb-6">
            Berlangganan newsletter kami untuk mendapatkan promo spesial dan
            informasi produk terbaru.
          </p>
          <form onSubmit={handleSubscribe} className="flex gap-2 max-w-md">
            <input
              type="email"
              placeholder="Masukkan email Anda"
              value={email}
              onChange={(e) => setEmail(e.target.value)}
              className="flex-1 px-4 py-3 rounded-lg bg-white dark:bg-gray-800 text-nusantara-dusk dark:text-nusantara-cream placeholder-gray-500"
              required
            />
            <button type="submit" className="btn-secondary">
              <Send size={20} />
            </button>
          </form>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
          {/* Brand Info */}
          <div>
            <h4 className="text-xl font-bold mb-4 flex items-center space-x-2">
              <span>🍲</span>
              <span>Nusantara Rasa</span>
            </h4>
            <p className="text-gray-300 text-sm mb-4">
              Membawa cita rasa autentik nusantara ke meja makan Anda dengan
              kualitas terbaik.
            </p>
            <div className="flex space-x-4">
              <a href="#" className="hover:text-accent-500 transition">
                <Facebook size={20} />
              </a>
              <a href="#" className="hover:text-accent-500 transition">
                <Instagram size={20} />
              </a>
              <a href="#" className="hover:text-accent-500 transition">
                <Twitter size={20} />
              </a>
            </div>
          </div>

          {/* Links */}
          <div>
            <h4 className="font-bold mb-4">Navigasi</h4>
            <ul className="space-y-2 text-sm text-gray-300">
              <li>
                <a href="/" className="hover:text-accent-500 transition">
                  Home
                </a>
              </li>
              <li>
                <a
                  href="/products"
                  className="hover:text-accent-500 transition"
                >
                  Produk
                </a>
              </li>
              <li>
                <a href="#why" className="hover:text-accent-500 transition">
                  Tentang Kami
                </a>
              </li>
              <li>
                <a
                  href="#testimonial"
                  className="hover:text-accent-500 transition"
                >
                  Testimoni
                </a>
              </li>
            </ul>
          </div>

          {/* Customer Service */}
          <div>
            <h4 className="font-bold mb-4">Layanan Pelanggan</h4>
            <ul className="space-y-3 text-sm text-gray-300">
              <li>
                <a href="#" className="hover:text-accent-500 transition">
                  FAQ
                </a>
              </li>
              <li>
                <a href="#" className="hover:text-accent-500 transition">
                  Kebijakan Privasi
                </a>
              </li>
              <li>
                <a href="#" className="hover:text-accent-500 transition">
                  Syarat & Ketentuan
                </a>
              </li>
              <li>
                <a href="#" className="hover:text-accent-500 transition">
                  Kebijakan Pengembalian
                </a>
              </li>
            </ul>
          </div>

          {/* Contact */}
          <div>
            <h4 className="font-bold mb-4">Hubungi Kami</h4>
            <ul className="space-y-3 text-sm text-gray-300">
              <li className="flex items-start space-x-2">
                <Phone size={16} className="mt-1 flex-shrink-0" />
                <span>+62 821 1234 5678</span>
              </li>
              <li className="flex items-start space-x-2">
                <Mail size={16} className="mt-1 flex-shrink-0" />
                <span>info@nusantararasa.id</span>
              </li>
              <li className="flex items-start space-x-2">
                <MapPin size={16} className="mt-1 flex-shrink-0" />
                <span>Jakarta, Indonesia</span>
              </li>
            </ul>
          </div>
        </div>

        {/* Divider */}
        <div className="border-t border-white/20 pt-8">
          <div className="flex flex-col md:flex-row items-center justify-between text-sm text-gray-400">
            <p>&copy; 2024 Nusantara Rasa. Semua hak dilindungi.</p>
            <p>Dibuat dengan ❤️ untuk Indonesia</p>
          </div>
        </div>
      </div>
    </footer>
  );
};
