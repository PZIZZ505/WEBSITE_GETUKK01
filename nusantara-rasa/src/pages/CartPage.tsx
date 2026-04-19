import React from "react";
import { Link } from "react-router-dom";
import { motion } from "framer-motion";
import { Trash2, Plus, Minus, ShoppingCart, ArrowLeft } from "lucide-react";
import { useCart } from "../store";
import { formatPrice } from "../utils/helpers";
import { EmptyState } from "../components";

const CartPage: React.FC = () => {
  const cart = useCart();
  const totalItems = cart.getTotalItems();
  const totalPrice = cart.getTotalPrice();
  const shippingCost = totalPrice > 100000 ? 0 : 15000;
  const tax = Math.round(totalPrice * 0.1);
  const finalTotal = totalPrice + shippingCost + tax;

  if (cart.items.length === 0) {
    return (
      <div className="min-h-screen bg-white dark:bg-nusantara-night">
        <div className="section-padding section-max">
          <motion.div initial={{ opacity: 0 }} animate={{ opacity: 1 }}>
            <Link
              to="/products"
              className="inline-flex items-center space-x-2 text-primary-500 hover:text-primary-600 mb-8"
            >
              <ArrowLeft size={20} />
              <span>Kembali ke Produk</span>
            </Link>

            <EmptyState
              message="Keranjang Anda kosong. Mulai berbelanja sekarang!"
              icon="🛒"
            />

            <div className="text-center mt-8">
              <Link to="/products" className="btn-primary">
                Lihat Produk
              </Link>
            </div>
          </motion.div>
        </div>
      </div>
    );
  }

  return (
    <div className="min-h-screen bg-white dark:bg-nusantara-night">
      <div className="section-padding">
        <div className="section-max">
          {/* Header */}
          <motion.div
            initial={{ opacity: 0, y: -20 }}
            animate={{ opacity: 1, y: 0 }}
          >
            <Link
              to="/products"
              className="inline-flex items-center space-x-2 text-primary-500 hover:text-primary-600 mb-8"
            >
              <ArrowLeft size={20} />
              <span>Lanjut Belanja</span>
            </Link>

            <h1 className="heading-2 mb-2">Keranjang Belanja</h1>
            <p className="text-gray-600 dark:text-gray-400">
              Anda memiliki {totalItems} produk dalam keranjang
            </p>
          </motion.div>

          <div className="grid grid-cols-1 lg:grid-cols-3 gap-8 mt-8">
            {/* Cart Items */}
            <div className="lg:col-span-2 space-y-4">
              {cart.items.map((item) => (
                <motion.div
                  key={item.id}
                  initial={{ opacity: 0, y: 10 }}
                  animate={{ opacity: 1, y: 0 }}
                  exit={{ opacity: 0, y: -10 }}
                  className="card p-4 sm:p-6 flex gap-4 sm:gap-6"
                >
                  {/* Image */}
                  <div className="flex-shrink-0 w-24 h-24 sm:w-32 sm:h-32 rounded-lg overflow-hidden bg-gray-200 dark:bg-gray-800">
                    <img
                      src={item.image}
                      alt={item.name}
                      className="w-full h-full object-cover"
                    />
                  </div>

                  {/* Details */}
                  <div className="flex-1 flex flex-col justify-between">
                    <div>
                      <h3 className="font-bold text-lg text-nusantara-dusk dark:text-nusantara-cream">
                        {item.name}
                      </h3>
                      {item.variant && (
                        <p className="text-sm text-gray-600 dark:text-gray-400 mt-1">
                          Varian: {item.variant}
                        </p>
                      )}
                      <p className="text-highlight text-lg font-bold mt-2">
                        {formatPrice(item.price)}
                      </p>
                    </div>

                    {/* Quantity Control */}
                    <div className="flex items-center justify-between">
                      <div className="flex items-center border-2 border-gray-300 dark:border-gray-700 rounded-lg">
                        <button
                          onClick={() =>
                            cart.updateQuantity(item.id, item.quantity - 1)
                          }
                          className="p-1 hover:bg-gray-200 dark:hover:bg-gray-700"
                        >
                          <Minus size={18} />
                        </button>
                        <span className="w-8 text-center font-semibold">
                          {item.quantity}
                        </span>
                        <button
                          onClick={() =>
                            cart.updateQuantity(item.id, item.quantity + 1)
                          }
                          className="p-1 hover:bg-gray-200 dark:hover:bg-gray-700"
                        >
                          <Plus size={18} />
                        </button>
                      </div>
                      <button
                        onClick={() => cart.removeItem(item.id)}
                        className="p-2 text-red-500 hover:bg-red-100 dark:hover:bg-red-900 rounded-lg transition"
                      >
                        <Trash2 size={20} />
                      </button>
                    </div>
                  </div>

                  {/* Subtotal */}
                  <div className="hidden sm:block text-right">
                    <p className="text-sm text-gray-600 dark:text-gray-400 mb-4">
                      Subtotal
                    </p>
                    <p className="text-highlight text-xl font-bold">
                      {formatPrice(item.price * item.quantity)}
                    </p>
                  </div>
                </motion.div>
              ))}
            </div>

            {/* Order Summary */}
            <div className="lg:col-span-1">
              <motion.div
                initial={{ opacity: 0, y: 20 }}
                animate={{ opacity: 1, y: 0 }}
                className="card p-6 sticky top-24 space-y-4"
              >
                <h3 className="font-bold text-lg heading-4">
                  Ringkasan Pesanan
                </h3>

                <div className="space-y-3 py-4 border-y border-gray-200 dark:border-gray-700">
                  <div className="flex justify-between text-sm">
                    <span className="text-gray-600 dark:text-gray-400">
                      Subtotal
                    </span>
                    <span className="font-semibold">
                      {formatPrice(totalPrice)}
                    </span>
                  </div>
                  <div className="flex justify-between text-sm">
                    <span className="text-gray-600 dark:text-gray-400">
                      Pengiriman {totalPrice > 100000 ? "(Gratis)" : ""}
                    </span>
                    <span className="font-semibold">
                      {shippingCost === 0
                        ? "Gratis"
                        : formatPrice(shippingCost)}
                    </span>
                  </div>
                  <div className="flex justify-between text-sm">
                    <span className="text-gray-600 dark:text-gray-400">
                      Pajak (10%)
                    </span>
                    <span className="font-semibold">{formatPrice(tax)}</span>
                  </div>
                </div>

                <div className="flex justify-between items-center pt-2">
                  <span className="font-bold text-lg">Total</span>
                  <span className="text-highlight text-2xl font-bold">
                    {formatPrice(finalTotal)}
                  </span>
                </div>

                {totalPrice > 100000 && (
                  <div className="p-3 bg-success-100 dark:bg-success-900 rounded-lg">
                    <p className="text-success-700 dark:text-success-200 text-sm font-semibold">
                      ✓ Gratis ongkir untuk pembelian di atas Rp 100.000!
                    </p>
                  </div>
                )}

                <button className="w-full btn-primary flex items-center justify-center space-x-2">
                  <ShoppingCart size={20} />
                  <span>Checkout</span>
                </button>

                <button className="w-full btn-outline">Lanjut Belanja</button>
              </motion.div>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default CartPage;
