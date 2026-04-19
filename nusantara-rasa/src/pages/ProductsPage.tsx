import React from "react";
import { motion } from "framer-motion";
import { Search, Filter, X } from "lucide-react";
import { ProductCard, ProductModal, EmptyState } from "../components";
import { PRODUCTS } from "../data/products";
import { Product } from "../types";

const ProductsPage: React.FC = () => {
  const [filteredProducts, setFilteredProducts] =
    React.useState<Product[]>(PRODUCTS);
  const [selectedProduct, setSelectedProduct] = React.useState<Product | null>(
    null,
  );
  const [searchQuery, setSearchQuery] = React.useState("");
  const [selectedCategory, setSelectedCategory] = React.useState("");
  const [priceRange, setPriceRange] = React.useState([0, 60000]);
  const [minRating, setMinRating] = React.useState(0);
  const [showMobileFilter, setShowMobileFilter] = React.useState(false);
  const [currentPage, setCurrentPage] = React.useState(1);

  const categories = ["Padang", "Jawa", "Bali", "Manado"];
  const itemsPerPage = 12;

  // Filter products
  React.useEffect(() => {
    let filtered = PRODUCTS;

    // Search
    if (searchQuery) {
      filtered = filtered.filter(
        (p) =>
          p.name.toLowerCase().includes(searchQuery.toLowerCase()) ||
          p.description.toLowerCase().includes(searchQuery.toLowerCase()),
      );
    }

    // Category
    if (selectedCategory) {
      filtered = filtered.filter((p) => p.category === selectedCategory);
    }

    // Price
    filtered = filtered.filter(
      (p) => p.price >= priceRange[0] && p.price <= priceRange[1],
    );

    // Rating
    filtered = filtered.filter((p) => p.rating >= minRating);

    setFilteredProducts(filtered);
    setCurrentPage(1);
  }, [searchQuery, selectedCategory, priceRange, minRating]);

  const totalPages = Math.ceil(filteredProducts.length / itemsPerPage);
  const paginatedProducts = filteredProducts.slice(
    (currentPage - 1) * itemsPerPage,
    currentPage * itemsPerPage,
  );

  const resetFilters = () => {
    setSearchQuery("");
    setSelectedCategory("");
    setPriceRange([0, 60000]);
    setMinRating(0);
  };

  return (
    <div className="min-h-screen bg-white dark:bg-nusantara-night">
      <div className="section-padding">
        <div className="section-max">
          {/* Header */}
          <motion.div
            initial={{ opacity: 0, y: -20 }}
            animate={{ opacity: 1, y: 0 }}
            className="mb-8"
          >
            <h1 className="heading-2 mb-2">Koleksi Produk</h1>
            <p className="text-gray-600 dark:text-gray-400">
              Temukan makanan khas nusantara favorit Anda
            </p>
          </motion.div>

          <div className="grid grid-cols-1 lg:grid-cols-4 gap-8">
            {/* Sidebar - Desktop */}
            <div className="hidden lg:block">
              <div className="sticky top-20 space-y-6">
                {/* Search */}
                <div>
                  <h3 className="font-bold mb-3">Cari Produk</h3>
                  <div className="relative">
                    <Search
                      className="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"
                      size={20}
                    />
                    <input
                      type="text"
                      placeholder="Cari makanan favorit..."
                      value={searchQuery}
                      onChange={(e) => setSearchQuery(e.target.value)}
                      className="input-primary pl-10"
                    />
                  </div>
                </div>

                {/* Category Filter */}
                <div>
                  <h3 className="font-bold mb-3">Kategori</h3>
                  <div className="space-y-2">
                    <label className="flex items-center cursor-pointer hover:text-primary-500">
                      <input
                        type="radio"
                        name="category"
                        value=""
                        checked={selectedCategory === ""}
                        onChange={(e) => setSelectedCategory(e.target.value)}
                        className="mr-2"
                      />
                      Semua Kategori
                    </label>
                    {categories.map((cat) => (
                      <label
                        key={cat}
                        className="flex items-center cursor-pointer hover:text-primary-500"
                      >
                        <input
                          type="radio"
                          name="category"
                          value={cat}
                          checked={selectedCategory === cat}
                          onChange={(e) => setSelectedCategory(e.target.value)}
                          className="mr-2"
                        />
                        {cat}
                      </label>
                    ))}
                  </div>
                </div>

                {/* Price Range */}
                <div>
                  <h3 className="font-bold mb-3">Harga</h3>
                  <div className="space-y-2">
                    <label className="flex items-center cursor-pointer text-sm">
                      <input
                        type="radio"
                        checked={priceRange[0] === 0 && priceRange[1] === 60000}
                        onChange={() => setPriceRange([0, 60000])}
                        className="mr-2"
                      />
                      Semua Harga
                    </label>
                    <label className="flex items-center cursor-pointer text-sm">
                      <input
                        type="radio"
                        checked={priceRange[0] === 0 && priceRange[1] === 25000}
                        onChange={() => setPriceRange([0, 25000])}
                        className="mr-2"
                      />
                      Rp0 - Rp25.000
                    </label>
                    <label className="flex items-center cursor-pointer text-sm">
                      <input
                        type="radio"
                        checked={
                          priceRange[0] === 25000 && priceRange[1] === 50000
                        }
                        onChange={() => setPriceRange([25000, 50000])}
                        className="mr-2"
                      />
                      Rp25.000 - Rp50.000
                    </label>
                    <label className="flex items-center cursor-pointer text-sm">
                      <input
                        type="radio"
                        checked={
                          priceRange[0] === 50000 && priceRange[1] === 60000
                        }
                        onChange={() => setPriceRange([50000, 60000])}
                        className="mr-2"
                      />
                      Rp50.000+
                    </label>
                  </div>
                </div>

                {/* Rating Filter */}
                <div>
                  <h3 className="font-bold mb-3">Rating</h3>
                  <div className="space-y-2">
                    {[0, 3, 4, 4.5].map((rating) => (
                      <label
                        key={rating}
                        className="flex items-center cursor-pointer"
                      >
                        <input
                          type="radio"
                          checked={minRating === rating}
                          onChange={() => setMinRating(rating)}
                          className="mr-2"
                        />
                        <span>
                          {rating === 0
                            ? "Semua Rating"
                            : `${rating}⭐ ke atas`}
                        </span>
                      </label>
                    ))}
                  </div>
                </div>

                {/* Reset Button */}
                <button
                  onClick={resetFilters}
                  className="w-full btn-outline text-sm"
                >
                  Reset Filter
                </button>
              </div>
            </div>

            {/* Main Content */}
            <div className="lg:col-span-3">
              {/* Mobile Filter Button */}
              <button
                onClick={() => setShowMobileFilter(!showMobileFilter)}
                className="lg:hidden mb-6 btn-secondary inline-flex items-center space-x-2"
              >
                <Filter size={20} />
                <span>Filter</span>
              </button>

              {/* Mobile Filter Panel */}
              {showMobileFilter && (
                <motion.div
                  initial={{ opacity: 0, height: 0 }}
                  animate={{ opacity: 1, height: "auto" }}
                  exit={{ opacity: 0, height: 0 }}
                  className="mb-6 p-4 card space-y-4"
                >
                  {/* Search Mobile */}
                  <div>
                    <label className="font-bold mb-2 block">Cari</label>
                    <div className="relative">
                      <Search
                        className="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"
                        size={20}
                      />
                      <input
                        type="text"
                        placeholder="Cari produk..."
                        value={searchQuery}
                        onChange={(e) => setSearchQuery(e.target.value)}
                        className="input-primary pl-10"
                      />
                    </div>
                  </div>

                  {/* Other filters in mobile view... */}
                  <button
                    onClick={() => {
                      resetFilters();
                      setShowMobileFilter(false);
                    }}
                    className="w-full btn-outline text-sm"
                  >
                    Reset Filter
                  </button>
                </motion.div>
              )}

              {/* Products Grid */}
              {paginatedProducts.length > 0 ? (
                <>
                  <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                    {paginatedProducts.map((product) => (
                      <ProductCard
                        key={product.id}
                        product={product}
                        onQuickView={(prod) => setSelectedProduct(prod)}
                      />
                    ))}
                  </div>

                  {/* Pagination */}
                  {totalPages > 1 && (
                    <div className="flex items-center justify-center gap-2">
                      <button
                        onClick={() =>
                          setCurrentPage(Math.max(1, currentPage - 1))
                        }
                        disabled={currentPage === 1}
                        className="btn-outline disabled:opacity-50 disabled:cursor-not-allowed"
                      >
                        Sebelumnya
                      </button>
                      {[...Array(totalPages)].map((_, i) => (
                        <button
                          key={i + 1}
                          onClick={() => setCurrentPage(i + 1)}
                          className={`w-10 h-10 rounded-lg font-semibold transition-all ${
                            currentPage === i + 1
                              ? "bg-primary-500 text-white"
                              : "bg-gray-200 dark:bg-gray-800 hover:bg-gray-300"
                          }`}
                        >
                          {i + 1}
                        </button>
                      ))}
                      <button
                        onClick={() =>
                          setCurrentPage(Math.min(totalPages, currentPage + 1))
                        }
                        disabled={currentPage === totalPages}
                        className="btn-outline disabled:opacity-50 disabled:cursor-not-allowed"
                      >
                        Berikutnya
                      </button>
                    </div>
                  )}
                </>
              ) : (
                <EmptyState
                  message="Produk tidak ditemukan. Coba ubah filter Anda."
                  icon="🍽️"
                />
              )}
            </div>
          </div>
        </div>
      </div>

      {/* Product Modal */}
      <ProductModal
        product={selectedProduct}
        onClose={() => setSelectedProduct(null)}
      />
    </div>
  );
};

export default ProductsPage;
