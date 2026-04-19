import React from "react";
import { motion } from "framer-motion";
import { Star, ShoppingCart, X, Plus, Minus } from "lucide-react";
import { Product } from "../types";
import { formatPrice } from "../utils/helpers";
import { useCart } from "../store";

interface ProductCardProps {
  product: Product;
  onQuickView?: (product: Product) => void;
}

export const ProductCard: React.FC<ProductCardProps> = ({
  product,
  onQuickView,
}) => {
  const cart = useCart();
  const [quantity, setQuantity] = React.useState(1);
  const [selectedVariant, setSelectedVariant] = React.useState(
    product.variants?.[0] || "",
  );

  const handleAddToCart = (e: React.MouseEvent) => {
    e.stopPropagation();
    cart.addItem({
      id: product.id,
      name: product.name,
      price: product.price,
      quantity,
      image: product.image,
      variant: selectedVariant,
    });
    setQuantity(1);
    // Show toast notification
    alert(`${product.name} ditambahkan ke keranjang!`);
  };

  return (
    <motion.div
      initial={{ opacity: 0, y: 20 }}
      animate={{ opacity: 1, y: 0 }}
      transition={{ duration: 0.3 }}
      className="card card-hover group"
      onClick={() => onQuickView?.(product)}
    >
      {/* Image Container */}
      <div className="relative overflow-hidden bg-gray-200 dark:bg-gray-800 aspect-square">
        <img
          src={product.image}
          alt={product.name}
          className="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
        />

        {/* Batik Overlay */}
        <div className="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-4">
          <button
            onClick={handleAddToCart}
            className="w-full btn-secondary flex items-center justify-center space-x-2"
          >
            <ShoppingCart size={18} />
            <span>Tambah ke Keranjang</span>
          </button>
        </div>

        {/* Badge */}
        <div className="absolute top-3 right-3">
          <div className="badge-accent">
            <Star size={14} fill="currentColor" />
            {product.rating}
          </div>
        </div>
      </div>

      {/* Content */}
      <div className="p-4">
        {/* Category Badge */}
        <span className="badge-primary text-xs mb-2">{product.category}</span>

        {/* Name */}
        <h3 className="font-bold text-lg text-nusantara-dusk dark:text-nusantara-cream mb-1 line-clamp-2">
          {product.name}
        </h3>

        {/* Description */}
        <p className="text-sm text-gray-600 dark:text-gray-400 mb-3 line-clamp-2">
          {product.description}
        </p>

        {/* Rating */}
        <div className="flex items-center space-x-2 mb-3">
          <div className="flex text-accent-500">
            {[...Array(5)].map((_, i) => (
              <Star
                key={i}
                size={16}
                fill={i < Math.round(product.rating) ? "currentColor" : "none"}
              />
            ))}
          </div>
          <span className="text-xs text-gray-600 dark:text-gray-400">
            ({product.reviews} ulasan)
          </span>
        </div>

        {/* Variant Selector */}
        {product.variants && product.variants.length > 0 && (
          <div className="mb-3">
            <select
              value={selectedVariant}
              onChange={(e) => setSelectedVariant(e.target.value)}
              onClick={(e) => e.stopPropagation()}
              className="input-primary text-sm"
            >
              {product.variants.map((v, i) => (
                <option key={i} value={v}>
                  {v}
                </option>
              ))}
            </select>
          </div>
        )}

        {/* Price */}
        <div className="flex items-center justify-between mb-3">
          <span className="text-2xl font-bold text-highlight">
            {formatPrice(product.price)}
          </span>
        </div>

        {/* Quantity Control */}
        <div className="flex items-center justify-between mb-3">
          <div className="flex items-center border-2 border-gray-300 dark:border-gray-700 rounded-lg">
            <button
              onClick={(e) => {
                e.stopPropagation();
                setQuantity(Math.max(1, quantity - 1));
              }}
              className="p-1 hover:bg-gray-200 dark:hover:bg-gray-700"
            >
              <Minus size={16} />
            </button>
            <span className="w-8 text-center font-semibold">{quantity}</span>
            <button
              onClick={(e) => {
                e.stopPropagation();
                setQuantity(quantity + 1);
              }}
              className="p-1 hover:bg-gray-200 dark:hover:bg-gray-700"
            >
              <Plus size={16} />
            </button>
          </div>
          <span className="text-xs text-gray-600 dark:text-gray-400">
            {product.inStock ? "Tersedia" : "Habis"}
          </span>
        </div>
      </div>
    </motion.div>
  );
};

// Skeleton Loader
export const ProductCardSkeleton: React.FC = () => {
  return (
    <div className="card">
      <div className="w-full aspect-square bg-shimmer mb-4" />
      <div className="p-4 space-y-3">
        <div className="h-4 w-20 bg-shimmer rounded" />
        <div className="h-6 w-full bg-shimmer rounded" />
        <div className="h-4 w-4/5 bg-shimmer rounded" />
        <div className="h-8 w-1/2 bg-shimmer rounded" />
      </div>
    </div>
  );
};
