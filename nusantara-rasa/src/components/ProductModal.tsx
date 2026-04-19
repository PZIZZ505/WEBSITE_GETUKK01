import React from "react";
import { motion, AnimatePresence } from "framer-motion";
import { X, ZoomIn, ZoomOut, Star, X as CloseIcon } from "lucide-react";
import { Product } from "../types";
import { formatPrice } from "../utils/helpers";
import { useCart } from "../store";

interface ProductModalProps {
  product: Product | null;
  onClose: () => void;
}

export const ProductModal: React.FC<ProductModalProps> = ({
  product,
  onClose,
}) => {
  const cart = useCart();
  const [quantity, setQuantity] = React.useState(1);
  const [selectedVariant, setSelectedVariant] = React.useState(
    product?.variants?.[0] || "",
  );
  const [zoom, setZoom] = React.useState(false);
  const [activeTab, setActiveTab] = React.useState<"details" | "reviews">(
    "details",
  );

  if (!product) return null;

  const handleAddToCart = () => {
    cart.addItem({
      id: product.id,
      name: product.name,
      price: product.price,
      quantity,
      image: product.image,
      variant: selectedVariant,
    });
    alert(`${product.name} ditambahkan ke keranjang!`);
  };

  const reviews = [
    {
      id: "1",
      name: "Rina Kusuma",
      rating: 5,
      text: "Produknya berkualitas tinggi dan rasa autentik. Sangat puas!",
      date: "2 minggu lalu",
    },
    {
      id: "2",
      name: "Budi Santoso",
      rating: 5,
      text: "Pengiriman cepat dan produk sesuai foto. Recommended!",
      date: "1 minggu lalu",
    },
  ];

  return (
    <AnimatePresence>
      {product && (
        <motion.div
          initial={{ opacity: 0 }}
          animate={{ opacity: 1 }}
          exit={{ opacity: 0 }}
          className="fixed inset-0 bg-black/50 dark:bg-black/70 z-50 flex items-center justify-center p-4"
          onClick={onClose}
        >
          <motion.div
            initial={{ scale: 0.95, opacity: 0 }}
            animate={{ scale: 1, opacity: 1 }}
            exit={{ scale: 0.95, opacity: 0 }}
            className="bg-white dark:bg-nusantara-dusk rounded-2xl shadow-2xl max-w-4xl w-full max-h-[90vh] overflow-y-auto"
            onClick={(e) => e.stopPropagation()}
          >
            <div className="grid grid-cols-1 md:grid-cols-2 gap-8 p-6 md:p-10">
              {/* Image Section */}
              <div>
                <div
                  className="relative bg-gray-100 dark:bg-gray-800 rounded-xl overflow-hidden aspect-square cursor-zoom-in"
                  onClick={() => setZoom(!zoom)}
                >
                  <img
                    src={product.image}
                    alt={product.name}
                    className={`w-full h-full object-cover transition-transform duration-300 ${zoom ? "scale-150" : "scale-100"}`}
                  />
                  <button
                    className="absolute top-4 right-4 p-2 bg-white dark:bg-gray-800 rounded-lg shadow-lg"
                    onClick={() => setZoom(!zoom)}
                  >
                    {zoom ? <ZoomOut size={20} /> : <ZoomIn size={20} />}
                  </button>
                </div>

                {/* Thumbnails (dapat ditambahkan jika ada multi-image) */}
                <div className="mt-4 flex gap-2">
                  <div className="w-16 h-16 bg-gray-200 dark:bg-gray-700 rounded-lg cursor-pointer hover:ring-2 ring-primary-500" />
                  <div className="w-16 h-16 bg-gray-200 dark:bg-gray-700 rounded-lg cursor-pointer hover:ring-2 ring-primary-500" />
                </div>
              </div>

              {/* Info Section */}
              <div className="flex flex-col">
                {/* Close Button */}
                <button
                  onClick={onClose}
                  className="absolute top-4 right-4 p-2 hover:bg-gray-200 dark:hover:bg-gray-700 rounded-lg"
                >
                  <CloseIcon size={24} />
                </button>

                {/* Header */}
                <div className="mb-6">
                  <span className="badge-primary mb-2">{product.category}</span>
                  <h1 className="heading-3 mb-2">{product.name}</h1>
                  <p className="text-gray-600 dark:text-gray-300">
                    {product.description}
                  </p>
                </div>

                {/* Rating */}
                <div className="flex items-center space-x-4 mb-6 pb-6 border-b border-gray-200 dark:border-gray-700">
                  <div className="flex text-accent-500">
                    {[...Array(5)].map((_, i) => (
                      <Star
                        key={i}
                        size={18}
                        fill={
                          i < Math.round(product.rating)
                            ? "currentColor"
                            : "none"
                        }
                      />
                    ))}
                  </div>
                  <span className="font-semibold">{product.rating}</span>
                  <span className="text-gray-600 dark:text-gray-400">
                    ({product.reviews} ulasan)
                  </span>
                </div>

                {/* Price */}
                <div className="mb-6">
                  <p className="text-gray-600 dark:text-gray-400 text-sm mb-1">
                    Harga
                  </p>
                  <p className="text-4xl font-bold text-highlight">
                    {formatPrice(product.price)}
                  </p>
                </div>

                {/* Variants */}
                {product.variants && product.variants.length > 0 && (
                  <div className="mb-6">
                    <label className="block font-semibold mb-3">
                      Pilih Varian
                    </label>
                    <div className="grid grid-cols-2 gap-2">
                      {product.variants.map((variant) => (
                        <button
                          key={variant}
                          onClick={() => setSelectedVariant(variant)}
                          className={`p-3 rounded-lg font-semibold transition-all ${
                            selectedVariant === variant
                              ? "bg-primary-500 text-white"
                              : "bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 hover:bg-gray-300 dark:hover:bg-gray-600"
                          }`}
                        >
                          {variant}
                        </button>
                      ))}
                    </div>
                  </div>
                )}

                {/* Quantity */}
                <div className="mb-6">
                  <label className="block font-semibold mb-3">Jumlah</label>
                  <div className="flex items-center border-2 border-gray-300 dark:border-gray-700 rounded-lg w-fit">
                    <button
                      onClick={() => setQuantity(Math.max(1, quantity - 1))}
                      className="p-2 hover:bg-gray-200 dark:hover:bg-gray-700"
                    >
                      −
                    </button>
                    <span className="w-12 text-center font-semibold">
                      {quantity}
                    </span>
                    <button
                      onClick={() => setQuantity(quantity + 1)}
                      className="p-2 hover:bg-gray-200 dark:hover:bg-gray-700"
                    >
                      +
                    </button>
                  </div>
                </div>

                {/* Buttons */}
                <div className="flex gap-3 mb-6">
                  <button
                    onClick={handleAddToCart}
                    className="flex-1 btn-primary"
                  >
                    Tambah ke Keranjang
                  </button>
                  <button className="flex-1 btn-outline">Wishlist</button>
                </div>

                {/* Availability */}
                <div className="p-4 bg-success-50 dark:bg-success-900 rounded-lg">
                  <p className="text-success-700 dark:text-success-200 font-semibold">
                    ✓ {product.inStock ? "Stok Tersedia" : "Stok Habis"}
                  </p>
                </div>
              </div>
            </div>

            {/* Tabs */}
            <div className="border-t border-gray-200 dark:border-gray-700 p-6 md:p-10">
              <div className="flex gap-4 mb-6 border-b border-gray-200 dark:border-gray-700">
                <button
                  onClick={() => setActiveTab("details")}
                  className={`pb-3 font-semibold transition-colors ${
                    activeTab === "details"
                      ? "text-primary-500 border-b-2 border-primary-500"
                      : "text-gray-600 dark:text-gray-400"
                  }`}
                >
                  Detail Produk
                </button>
                <button
                  onClick={() => setActiveTab("reviews")}
                  className={`pb-3 font-semibold transition-colors ${
                    activeTab === "reviews"
                      ? "text-primary-500 border-b-2 border-primary-500"
                      : "text-gray-600 dark:text-gray-400"
                  }`}
                >
                  Ulasan ({reviews.length})
                </button>
              </div>

              {activeTab === "details" && (
                <div className="prose dark:prose-invert max-w-none">
                  <h3>Deskripsi Lengkap</h3>
                  <p>{product.description}</p>
                  <h3>Informasi Pengiriman</h3>
                  <ul>
                    <li>Dikirim dalam kondisi segar</li>
                    <li>Garansi uang kembali 100% jika tidak puas</li>
                    <li>
                      Pengiriman gratis untuk pembelian di atas Rp 100.000
                    </li>
                  </ul>
                </div>
              )}

              {activeTab === "reviews" && (
                <div className="space-y-4">
                  {reviews.map((review) => (
                    <div
                      key={review.id}
                      className="p-4 bg-gray-50 dark:bg-gray-800 rounded-lg"
                    >
                      <div className="flex items-center justify-between mb-2">
                        <h4 className="font-bold">{review.name}</h4>
                        <span className="text-sm text-gray-600 dark:text-gray-400">
                          {review.date}
                        </span>
                      </div>
                      <div className="flex items-center text-accent-500 mb-2">
                        {[...Array(5)].map((_, i) => (
                          <Star
                            key={i}
                            size={14}
                            fill={i < review.rating ? "currentColor" : "none"}
                          />
                        ))}
                      </div>
                      <p className="text-gray-700 dark:text-gray-300">
                        {review.text}
                      </p>
                    </div>
                  ))}
                </div>
              )}
            </div>
          </motion.div>
        </motion.div>
      )}
    </AnimatePresence>
  );
};
