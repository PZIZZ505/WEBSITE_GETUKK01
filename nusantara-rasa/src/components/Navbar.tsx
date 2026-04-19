import React from "react";
import { Link } from "react-router-dom";
import { ShoppingCart, Menu, X, Moon, Sun, LogOut } from "lucide-react";
import { useCart } from "../store";
import { useAuth } from "../store";
import { useState } from "react";

// Navbar Component
export const Navbar: React.FC = () => {
  const [isOpen, setIsOpen] = useState(false);
  const [isDark, setIsDark] = useState(false);
  const cart = useCart();
  const auth = useAuth();
  const totalItems = cart.getTotalItems();

  React.useEffect(() => {
    if (isDark) {
      document.documentElement.classList.add("dark");
    } else {
      document.documentElement.classList.remove("dark");
    }
  }, [isDark]);

  return (
    <nav className="glass glass-hover sticky top-0 z-50 shadow-batik">
      <div className="section-max">
        <div className="flex items-center justify-between h-16 px-4">
          {/* Logo */}
          <Link to="/" className="flex items-center space-x-2">
            <div className="w-10 h-10 bg-gradient-to-br from-primary-500 to-accent-500 rounded-lg flex items-center justify-center">
              <span className="text-white font-bold text-lg">🍲</span>
            </div>
            <span className="font-bold text-xl text-nusantara-dusk dark:text-nusantara-cream hidden sm:inline">
              Nusantara
            </span>
          </Link>

          {/* Desktop Menu */}
          <div className="hidden md:flex items-center space-x-8">
            <Link
              to="/"
              className="text-nusantara-dusk dark:text-nusantara-cream hover:text-primary-500 transition"
            >
              Home
            </Link>
            <Link
              to="/products"
              className="text-nusantara-dusk dark:text-nusantara-cream hover:text-primary-500 transition"
            >
              Produk
            </Link>
            <a
              href="#why"
              className="text-nusantara-dusk dark:text-nusantara-cream hover:text-primary-500 transition"
            >
              Mengapa Kami
            </a>
            <a
              href="#testimonial"
              className="text-nusantara-dusk dark:text-nusantara-cream hover:text-primary-500 transition"
            >
              Testimoni
            </a>
          </div>

          {/* Right Side Actions */}
          <div className="flex items-center space-x-4">
            {/* Dark Mode Toggle */}
            <button
              onClick={() => setIsDark(!isDark)}
              className="btn-icon text-nusantara-dusk dark:text-nusantara-cream"
              title="Toggle Dark Mode"
            >
              {isDark ? <Sun size={20} /> : <Moon size={20} />}
            </button>

            {/* Cart Icon */}
            <Link
              to="/cart"
              className="relative btn-icon text-nusantara-dusk dark:text-nusantara-cream"
            >
              <ShoppingCart size={24} />
              {totalItems > 0 && (
                <span className="absolute -top-1 -right-1 bg-accent-500 text-white text-xs font-bold rounded-full w-5 h-5 flex items-center justify-center">
                  {totalItems}
                </span>
              )}
            </Link>

            {/* Auth Menu */}
            {auth.user ? (
              <div className="flex items-center space-x-2">
                <span className="text-sm text-nusantara-dusk dark:text-nusantara-cream hidden sm:inline">
                  {auth.user.name}
                </span>
                <button
                  onClick={() => auth.logout()}
                  className="btn-icon text-red-500 hover:bg-red-50 dark:hover:bg-red-900"
                >
                  <LogOut size={20} />
                </button>
              </div>
            ) : (
              <Link to="/login" className="btn-primary text-sm">
                Login
              </Link>
            )}

            {/* Mobile Menu Button */}
            <button
              onClick={() => setIsOpen(!isOpen)}
              className="md:hidden btn-icon"
            >
              {isOpen ? <X size={24} /> : <Menu size={24} />}
            </button>
          </div>
        </div>

        {/* Mobile Menu */}
        {isOpen && (
          <div className="md:hidden pb-4 border-t border-gray-200 dark:border-gray-700">
            <Link
              to="/"
              className="block px-4 py-2 text-nusantara-dusk dark:text-nusantara-cream hover:bg-primary-50 dark:hover:bg-primary-900"
            >
              Home
            </Link>
            <Link
              to="/products"
              className="block px-4 py-2 text-nusantara-dusk dark:text-nusantara-cream hover:bg-primary-50 dark:hover:bg-primary-900"
            >
              Produk
            </Link>
            <a
              href="#why"
              className="block px-4 py-2 text-nusantara-dusk dark:text-nusantara-cream hover:bg-primary-50 dark:hover:bg-primary-900"
            >
              Mengapa Kami
            </a>
            <a
              href="#testimonial"
              className="block px-4 py-2 text-nusantara-dusk dark:text-nusantara-cream hover:bg-primary-50 dark:hover:bg-primary-900"
            >
              Testimoni
            </a>
          </div>
        )}
      </div>
    </nav>
  );
};
