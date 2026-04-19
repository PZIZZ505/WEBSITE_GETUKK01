import React from "react";
import { motion } from "framer-motion";
import { Mail, Lock, Eye, EyeOff, Chrome } from "lucide-react";
import { Link, useNavigate } from "react-router-dom";
import { useAuth } from "../store";
import { validateEmail, validatePassword } from "../utils/helpers";

const LoginPage: React.FC = () => {
  const navigate = useNavigate();
  const auth = useAuth();
  const [email, setEmail] = React.useState("");
  const [password, setPassword] = React.useState("");
  const [showPassword, setShowPassword] = React.useState(false);
  const [errors, setErrors] = React.useState<Record<string, string>>({});
  const [isLoading, setIsLoading] = React.useState(false);

  const validateForm = () => {
    const newErrors: Record<string, string> = {};

    if (!email) newErrors.email = "Email wajib diisi";
    else if (!validateEmail(email))
      newErrors.email = "Format email tidak valid";

    if (!password) newErrors.password = "Password wajib diisi";
    else if (!validatePassword(password))
      newErrors.password = "Password minimal 8 karakter";

    setErrors(newErrors);
    return Object.keys(newErrors).length === 0;
  };

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();

    if (!validateForm()) return;

    setIsLoading(true);
    try {
      await auth.login(email, password);
      navigate("/");
    } catch (error) {
      setErrors({
        submit: "Login gagal. Silakan cek email dan password Anda.",
      });
    } finally {
      setIsLoading(false);
    }
  };

  const handleGoogleLogin = () => {
    // Implementasi Google Login
    alert("Google Login - Coming Soon");
  };

  return (
    <div className="min-h-screen bg-gradient-to-br from-primary-50 to-accent-50 dark:from-nusantara-night dark:to-primary-900 flex items-center justify-center px-4 relative overflow-hidden">
      {/* Decorative Elements */}
      <div className="absolute top-0 left-0 w-72 h-72 bg-primary-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse-soft" />
      <div className="absolute bottom-0 right-0 w-72 h-72 bg-accent-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse-soft" />

      <div className="relative z-10 w-full max-w-md">
        <motion.div
          initial={{ opacity: 0, y: 20 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.5 }}
        >
          {/* Logo */}
          <div className="text-center mb-8">
            <div className="inline-block p-4 bg-gradient-warm rounded-2xl mb-4">
              <span className="text-4xl">🍲</span>
            </div>
            <h1 className="heading-3">Nusantara Rasa</h1>
            <p className="text-gray-600 dark:text-gray-400 mt-2">
              Masuk ke akun Anda
            </p>
          </div>

          {/* Form Card */}
          <div className="card p-8 shadow-xl">
            {errors.submit && (
              <motion.div
                initial={{ opacity: 0, y: -10 }}
                animate={{ opacity: 1, y: 0 }}
                className="mb-4 p-3 bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-200 rounded-lg text-sm"
              >
                {errors.submit}
              </motion.div>
            )}

            <form onSubmit={handleSubmit} className="space-y-5">
              {/* Email */}
              <div>
                <label className="block font-semibold mb-2">Email</label>
                <div className="relative">
                  <Mail
                    className="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"
                    size={20}
                  />
                  <input
                    type="email"
                    value={email}
                    onChange={(e) => setEmail(e.target.value)}
                    className={`input-primary pl-10 ${errors.email ? "border-red-500" : ""}`}
                    placeholder="email@example.com"
                  />
                </div>
                {errors.email && (
                  <p className="text-red-500 text-sm mt-1">{errors.email}</p>
                )}
              </div>

              {/* Password */}
              <div>
                <label className="block font-semibold mb-2">Password</label>
                <div className="relative">
                  <Lock
                    className="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"
                    size={20}
                  />
                  <input
                    type={showPassword ? "text" : "password"}
                    value={password}
                    onChange={(e) => setPassword(e.target.value)}
                    className={`input-primary pl-10 pr-10 ${errors.password ? "border-red-500" : ""}`}
                    placeholder="Masukkan password"
                  />
                  <button
                    type="button"
                    onClick={() => setShowPassword(!showPassword)}
                    className="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400"
                  >
                    {showPassword ? <EyeOff size={20} /> : <Eye size={20} />}
                  </button>
                </div>
                {errors.password && (
                  <p className="text-red-500 text-sm mt-1">{errors.password}</p>
                )}
              </div>

              {/* Remember & Forgot */}
              <div className="flex items-center justify-between text-sm">
                <label className="flex items-center cursor-pointer">
                  <input type="checkbox" className="mr-2 rounded" />
                  <span>Ingat saya</span>
                </label>
                <a
                  href="#"
                  className="text-primary-500 hover:text-primary-600 font-semibold"
                >
                  Lupa Password?
                </a>
              </div>

              {/* Submit Button */}
              <button
                type="submit"
                disabled={isLoading}
                className="w-full btn-primary disabled:opacity-50"
              >
                {isLoading ? "Memproses..." : "Masuk"}
              </button>
            </form>

            {/* Divider */}
            <div className="relative my-6">
              <div className="absolute inset-0 flex items-center">
                <div className="w-full border-t border-gray-300 dark:border-gray-600" />
              </div>
              <div className="relative flex justify-center text-sm">
                <span className="px-2 bg-white dark:bg-nusantara-dusk text-gray-500">
                  Atau lanjutkan dengan
                </span>
              </div>
            </div>

            {/* Google Login */}
            <button
              type="button"
              onClick={handleGoogleLogin}
              className="w-full py-3 border-2 border-gray-300 dark:border-gray-600 rounded-lg font-semibold hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors flex items-center justify-center space-x-2"
            >
              <Chrome size={20} />
              <span>Login dengan Google</span>
            </button>
          </div>

          {/* Register Link */}
          <div className="text-center mt-6">
            <p className="text-gray-600 dark:text-gray-400">
              Belum punya akun?{" "}
              <Link
                to="/register"
                className="text-primary-500 hover:text-primary-600 font-semibold"
              >
                Daftar sekarang
              </Link>
            </p>
          </div>
        </motion.div>
      </div>
    </div>
  );
};

export default LoginPage;
