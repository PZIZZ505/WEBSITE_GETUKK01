import React from "react";
import { motion } from "framer-motion";
import {
  User,
  Mail,
  Lock,
  Phone,
  Eye,
  EyeOff,
  Chrome,
  CheckCircle,
} from "lucide-react";
import { Link, useNavigate } from "react-router-dom";
import { useAuth } from "../store";
import {
  validateEmail,
  validatePassword,
  validatePhone,
} from "../utils/helpers";

const RegisterPage: React.FC = () => {
  const navigate = useNavigate();
  const auth = useAuth();
  const [formData, setFormData] = React.useState({
    name: "",
    email: "",
    phone: "",
    password: "",
    confirmPassword: "",
  });
  const [showPassword, setShowPassword] = React.useState(false);
  const [showConfirmPassword, setShowConfirmPassword] = React.useState(false);
  const [errors, setErrors] = React.useState<Record<string, string>>({});
  const [agree, setAgree] = React.useState(false);
  const [isLoading, setIsLoading] = React.useState(false);

  const validateForm = () => {
    const newErrors: Record<string, string> = {};

    if (!formData.name.trim()) newErrors.name = "Nama wajib diisi";
    else if (formData.name.trim().length < 3)
      newErrors.name = "Nama minimal 3 karakter";

    if (!formData.email) newErrors.email = "Email wajib diisi";
    else if (!validateEmail(formData.email))
      newErrors.email = "Format email tidak valid";

    if (!formData.phone) newErrors.phone = "WhatsApp/Telepon wajib diisi";
    else if (!validatePhone(formData.phone))
      newErrors.phone = "Nomor telepon tidak valid";

    if (!formData.password) newErrors.password = "Password wajib diisi";
    else if (!validatePassword(formData.password))
      newErrors.password = "Password minimal 8 karakter";

    if (!formData.confirmPassword)
      newErrors.confirmPassword = "Konfirmasi password wajib diisi";
    else if (formData.password !== formData.confirmPassword)
      newErrors.confirmPassword = "Password tidak cocok";

    if (!agree) newErrors.agree = "Anda harus menyetujui syarat dan ketentuan";

    setErrors(newErrors);
    return Object.keys(newErrors).length === 0;
  };

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();

    if (!validateForm()) return;

    setIsLoading(true);
    try {
      await auth.register(
        formData.name,
        formData.email,
        formData.password,
        formData.phone,
      );
      navigate("/");
    } catch (error) {
      setErrors({ submit: "Registrasi gagal. Silakan coba lagi." });
    } finally {
      setIsLoading(false);
    }
  };

  const handleChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    const { name, value } = e.target;
    setFormData((prev) => ({ ...prev, [name]: value }));
    // Clear error when user starts typing
    if (errors[name]) {
      setErrors((prev) => ({ ...prev, [name]: "" }));
    }
  };

  return (
    <div className="min-h-screen bg-gradient-to-br from-primary-50 to-accent-50 dark:from-nusantara-night dark:to-primary-900 flex items-center justify-center px-4 py-8 relative overflow-hidden">
      {/* Decorative Elements */}
      <div className="absolute top-0 left-0 w-72 h-72 bg-primary-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse-soft" />
      <div className="absolute bottom-0 right-0 w-72 h-72 bg-accent-300 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-pulse-soft" />

      <div className="relative z-10 w-full max-w-lg">
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
            <h1 className="heading-3">Bergabung dengan Nusantara Rasa</h1>
            <p className="text-gray-600 dark:text-gray-400 mt-2">
              Buat akun baru dan mulai berbelanja
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

            <form onSubmit={handleSubmit} className="space-y-4">
              {/* Name */}
              <div>
                <label className="block font-semibold mb-2">Nama Lengkap</label>
                <div className="relative">
                  <User
                    className="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"
                    size={20}
                  />
                  <input
                    type="text"
                    name="name"
                    value={formData.name}
                    onChange={handleChange}
                    className={`input-primary pl-10 ${errors.name ? "border-red-500" : ""}`}
                    placeholder="Masukkan nama lengkap"
                  />
                </div>
                {errors.name && (
                  <p className="text-red-500 text-sm mt-1">{errors.name}</p>
                )}
              </div>

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
                    name="email"
                    value={formData.email}
                    onChange={handleChange}
                    className={`input-primary pl-10 ${errors.email ? "border-red-500" : ""}`}
                    placeholder="email@example.com"
                  />
                </div>
                {errors.email && (
                  <p className="text-red-500 text-sm mt-1">{errors.email}</p>
                )}
              </div>

              {/* Phone */}
              <div>
                <label className="block font-semibold mb-2">
                  WhatsApp / Telepon
                </label>
                <div className="relative">
                  <Phone
                    className="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"
                    size={20}
                  />
                  <input
                    type="tel"
                    name="phone"
                    value={formData.phone}
                    onChange={handleChange}
                    className={`input-primary pl-10 ${errors.phone ? "border-red-500" : ""}`}
                    placeholder="0812xxx atau +62812xxx"
                  />
                </div>
                {errors.phone && (
                  <p className="text-red-500 text-sm mt-1">{errors.phone}</p>
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
                    name="password"
                    value={formData.password}
                    onChange={handleChange}
                    className={`input-primary pl-10 pr-10 ${errors.password ? "border-red-500" : ""}`}
                    placeholder="Minimal 8 karakter"
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

              {/* Confirm Password */}
              <div>
                <label className="block font-semibold mb-2">
                  Konfirmasi Password
                </label>
                <div className="relative">
                  <Lock
                    className="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"
                    size={20}
                  />
                  <input
                    type={showConfirmPassword ? "text" : "password"}
                    name="confirmPassword"
                    value={formData.confirmPassword}
                    onChange={handleChange}
                    className={`input-primary pl-10 pr-10 ${errors.confirmPassword ? "border-red-500" : ""}`}
                    placeholder="Ulangi password"
                  />
                  <button
                    type="button"
                    onClick={() => setShowConfirmPassword(!showConfirmPassword)}
                    className="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400"
                  >
                    {showConfirmPassword ? (
                      <EyeOff size={20} />
                    ) : (
                      <Eye size={20} />
                    )}
                  </button>
                </div>
                {errors.confirmPassword && (
                  <p className="text-red-500 text-sm mt-1">
                    {errors.confirmPassword}
                  </p>
                )}
              </div>

              {/* Terms & Conditions */}
              <label
                className={`flex items-start space-x-2 p-3 rounded-lg cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-800 ${errors.agree ? "bg-red-50 dark:bg-red-900" : ""}`}
              >
                <input
                  type="checkbox"
                  checked={agree}
                  onChange={(e) => {
                    setAgree(e.target.checked);
                    if (e.target.checked && errors.agree) {
                      setErrors((prev) => ({ ...prev, agree: "" }));
                    }
                  }}
                  className="mt-1"
                />
                <span className="text-sm">
                  Saya setuju dengan{" "}
                  <a
                    href="#"
                    className="text-primary-500 hover:text-primary-600 font-semibold"
                  >
                    Syarat & Ketentuan
                  </a>{" "}
                  dan{" "}
                  <a
                    href="#"
                    className="text-primary-500 hover:text-primary-600 font-semibold"
                  >
                    Kebijakan Privasi
                  </a>
                </span>
              </label>
              {errors.agree && (
                <p className="text-red-500 text-sm">{errors.agree}</p>
              )}

              {/* Submit Button */}
              <button
                type="submit"
                disabled={isLoading}
                className="w-full btn-primary disabled:opacity-50 mt-6"
              >
                {isLoading ? "Memproses..." : "Daftar"}
              </button>
            </form>

            {/* Divider */}
            <div className="relative my-6">
              <div className="absolute inset-0 flex items-center">
                <div className="w-full border-t border-gray-300 dark:border-gray-600" />
              </div>
              <div className="relative flex justify-center text-sm">
                <span className="px-2 bg-white dark:bg-nusantara-dusk text-gray-500">
                  Atau
                </span>
              </div>
            </div>

            {/* Google Register */}
            <button
              type="button"
              className="w-full py-3 border-2 border-gray-300 dark:border-gray-600 rounded-lg font-semibold hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors flex items-center justify-center space-x-2"
            >
              <Chrome size={20} />
              <span>Daftar dengan Google</span>
            </button>
          </div>

          {/* Login Link */}
          <div className="text-center mt-6">
            <p className="text-gray-600 dark:text-gray-400">
              Sudah punya akun?{" "}
              <Link
                to="/login"
                className="text-primary-500 hover:text-primary-600 font-semibold"
              >
                Masuk sekarang
              </Link>
            </p>
          </div>
        </motion.div>
      </div>
    </div>
  );
};

export default RegisterPage;
