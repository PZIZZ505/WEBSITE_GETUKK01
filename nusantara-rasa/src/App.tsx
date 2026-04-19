import React from "react";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import { Navbar, Footer } from "./components";
import {
  HomePage,
  ProductsPage,
  LoginPage,
  RegisterPage,
  CartPage,
} from "./pages";
import "./styles/globals.css";

function App() {
  return (
    <Router>
      <div className="flex flex-col min-h-screen bg-white dark:bg-nusantara-night">
        <Navbar />
        <main className="flex-1">
          <Routes>
            <Route path="/" element={<HomePage />} />
            <Route path="/products" element={<ProductsPage />} />
            <Route path="/login" element={<LoginPage />} />
            <Route path="/register" element={<RegisterPage />} />
            <Route path="/cart" element={<CartPage />} />

            {/* 404 Page */}
            <Route
              path="*"
              element={
                <div className="section-padding section-max text-center">
                  <h1 className="heading-2 mb-4">
                    404 - Halaman Tidak Ditemukan
                  </h1>
                  <p className="text-gray-600 dark:text-gray-400 mb-8">
                    Maaf, halaman yang Anda cari tidak ada.
                  </p>
                  <a href="/" className="btn-primary">
                    Kembali ke Home
                  </a>
                </div>
              }
            />
          </Routes>
        </main>
        <Footer />
      </div>
    </Router>
  );
}

export default App;
