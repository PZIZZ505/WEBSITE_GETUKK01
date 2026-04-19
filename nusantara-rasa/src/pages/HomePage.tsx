import React from "react";
import { Link } from "react-router-dom";
import { motion } from "framer-motion";
import { Carousel, ProductCard, ProductModal, Toast } from "../components";
import { PRODUCTS, CATEGORIES, TESTIMONIALS, REASONS } from "../data/products";
import { ArrowRight, Star, Zap } from "lucide-react";

const HomePage: React.FC = () => {
  const [selectedProduct, setSelectedProduct] = React.useState<
    (typeof PRODUCTS)[0] | null
  >(null);
  const [currentTestimonial, setCurrentTestimonial] = React.useState(0);

  // Hero Carousel Items
  const heroItems = [
    {
      image:
        "https://images.unsplash.com/photo-1455619452474-d2be8b1e4e31?w=1200&h=600&fit=crop",
      title: "Rendang Sapi",
      subtitle: "Cita Rasa Autentik Padang",
    },
    {
      image:
        "https://images.unsplash.com/photo-1585937421891-4c4c86455580?w=1200&h=600&fit=crop",
      title: "Nasi Goreng",
      subtitle: "Lezat dan Menggugah Selera",
    },
    {
      image:
        "https://images.unsplash.com/photo-1555939594-58d7cb561c1a?w=1200&h=600&fit=crop",
      title: "Sate Ayam",
      subtitle: "Empuk Dengan Bumbu Kacang",
    },
  ];

  const carouselItems = heroItems.map((item) => (
    <div key={item.title} className="relative w-full h-full">
      <img
        src={item.image}
        alt={item.title}
        className="w-full h-full object-cover"
      />
      <div className="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent flex flex-col items-center justify-center text-white text-center">
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.6 }}
        >
          <h2 className="heading-1 mb-4">{item.title}</h2>
          <p className="text-xl md:text-2xl mb-8">{item.subtitle}</p>
          <Link
            to="/products"
            className="btn-secondary inline-flex items-center space-x-2"
          >
            <span>Pesan Sekarang</span>
            <ArrowRight size={20} />
          </Link>
        </motion.div>
      </div>
    </div>
  ));

  return (
    <div className="min-h-screen bg-white dark:bg-nusantara-night">
      {/* Hero Section with Carousel */}
      <section className="section-padding pt-0">
        <Carousel items={carouselItems} autoPlay={true} interval={5000} />
      </section>

      {/* Featured Products */}
      <section className="section-padding gradient-subtle">
        <div className="section-max">
          <motion.div
            initial={{ opacity: 0, y: 20 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            className="text-center mb-12"
          >
            <h2 className="heading-2 mb-4">Produk Unggulan</h2>
            <p className="text-gray-600 dark:text-gray-400 max-w-2xl mx-auto text-lg">
              Koleksi makanan khas nusantara pilihan dengan kualitas premium dan
              cita rasa autentik
            </p>
          </motion.div>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            {PRODUCTS.slice(0, 8).map((product) => (
              <ProductCard
                key={product.id}
                product={product}
                onQuickView={(prod) => setSelectedProduct(prod)}
              />
            ))}
          </div>

          <div className="text-center mt-12">
            <Link to="/products" className="btn-primary">
              Lihat Semua Produk →
            </Link>
          </div>
        </div>
      </section>

      {/* Categories */}
      <section className="section-padding">
        <div className="section-max">
          <motion.h2
            initial={{ opacity: 0, y: 20 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            className="heading-2 text-center mb-12"
          >
            Jelajahi Kategori
          </motion.h2>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            {CATEGORIES.map((category, i) => (
              <motion.div
                key={category.id}
                initial={{ opacity: 0, y: 20 }}
                whileInView={{ opacity: 1, y: 0 }}
                viewport={{ once: true }}
                transition={{ delay: i * 0.1 }}
                className="card card-hover p-6 text-center"
              >
                <div className="text-4xl mb-3">
                  {category.name.split(" ")[0]}
                </div>
                <h3 className="font-bold text-lg mb-2">
                  {category.name.split(" ").slice(1).join(" ")}
                </h3>
                <p className="text-gray-600 dark:text-gray-400 text-sm mb-4">
                  {category.description}
                </p>
                <Link
                  to="/products"
                  className="text-primary-500 hover:text-primary-600 font-semibold"
                >
                  Lihat Produk →
                </Link>
              </motion.div>
            ))}
          </div>
        </div>
      </section>

      {/* Why Choose Us */}
      <section className="section-padding bg-gradient-warm" id="why">
        <div className="section-max">
          <motion.h2
            initial={{ opacity: 0, y: 20 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            className="heading-2 text-center mb-12 text-white"
          >
            Kenapa Pilih Nusantara Rasa?
          </motion.h2>

          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            {REASONS.map((reason, i) => (
              <motion.div
                key={reason.id}
                initial={{ opacity: 0, scale: 0.95 }}
                whileInView={{ opacity: 1, scale: 1 }}
                viewport={{ once: true }}
                transition={{ delay: i * 0.1 }}
                className="bg-white/10 backdrop-blur-md rounded-lg p-6 border border-white/20 text-white"
              >
                <div className="text-3xl mb-3">
                  {reason.title.split(" ")[0]}
                </div>
                <h3 className="font-bold text-lg mb-2">
                  {reason.title.split(" ").slice(1).join(" ")}
                </h3>
                <p className="text-white/80">{reason.description}</p>
              </motion.div>
            ))}
          </div>
        </div>
      </section>

      {/* Testimonials */}
      <section className="section-padding" id="testimonial">
        <div className="section-max">
          <motion.h2
            initial={{ opacity: 0, y: 20 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            className="heading-2 text-center mb-12"
          >
            Apa Kata Pelanggan Kami?
          </motion.h2>

          <div className="max-w-3xl mx-auto">
            {TESTIMONIALS.map(
              (testimonial, i) =>
                i === currentTestimonial && (
                  <motion.div
                    key={testimonial.id}
                    initial={{ opacity: 0 }}
                    animate={{ opacity: 1 }}
                    transition={{ duration: 0.5 }}
                    className="card p-8 text-center"
                  >
                    <div className="flex items-center justify-center gap-1 mb-4">
                      {[...Array(5)].map((_, j) => (
                        <Star
                          key={j}
                          size={20}
                          fill={j < testimonial.rating ? "#D2691E" : "none"}
                          color="#D2691E"
                        />
                      ))}
                    </div>
                    <p className="text-lg text-gray-700 dark:text-gray-300 mb-6 italic">
                      "{testimonial.text}"
                    </p>
                    <div>
                      <h4 className="font-bold text-lg">{testimonial.name}</h4>
                      <p className="text-gray-600 dark:text-gray-400">
                        {testimonial.city}
                      </p>
                    </div>
                  </motion.div>
                ),
            )}

            {/* Testimonial Navigation */}
            <div className="flex justify-center gap-2 mt-8">
              {TESTIMONIALS.map((_, i) => (
                <button
                  key={i}
                  onClick={() => setCurrentTestimonial(i)}
                  className={`w-3 h-3 rounded-full transition-all ${
                    i === currentTestimonial
                      ? "bg-primary-500 w-8"
                      : "bg-gray-300 dark:bg-gray-700 hover:bg-gray-400"
                  }`}
                />
              ))}
            </div>
          </div>
        </div>
      </section>

      {/* CTA Section */}
      <section className="section-padding bg-primary-500">
        <div className="section-max text-center text-white">
          <motion.div
            initial={{ opacity: 0, y: 20 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
          >
            <h2 className="heading-2 mb-4">
              Siap Menikmati Kelezatan Nusantara?
            </h2>
            <p className="text-lg mb-8 opacity-90">
              Jangan lewatkan kesempatan untuk memesan makanan khas Indonesia
              favorit Anda
            </p>
            <Link to="/products" className="btn-secondary">
              Mulai Belanja Sekarang
            </Link>
          </motion.div>
        </div>
      </section>

      {/* Product Modal */}
      <ProductModal
        product={selectedProduct}
        onClose={() => setSelectedProduct(null)}
      />
    </div>
  );
};

export default HomePage;
