import React from "react";
import { motion } from "framer-motion";

interface LoadingSkeletonProps {
  count?: number;
  height?: string;
}

export const LoadingSkeleton: React.FC<LoadingSkeletonProps> = ({
  count = 1,
  height = "h-64",
}) => {
  return (
    <div className="space-y-4">
      {[...Array(count)].map((_, i) => (
        <motion.div
          key={i}
          className={`${height} bg-shimmer rounded-lg`}
          animate={{ opacity: [0.5, 1, 0.5] }}
          transition={{ duration: 2, repeat: Infinity }}
        />
      ))}
    </div>
  );
};

// Toast Notification Component
interface ToastProps {
  message: string;
  type?: "success" | "error" | "info" | "warning";
  duration?: number;
}

export const Toast: React.FC<ToastProps> = ({
  message,
  type = "info",
  duration = 3000,
}) => {
  const [isVisible, setIsVisible] = React.useState(true);

  React.useEffect(() => {
    const timer = setTimeout(() => setIsVisible(false), duration);
    return () => clearTimeout(timer);
  }, [duration]);

  if (!isVisible) return null;

  const bgColor = {
    success: "bg-success-500",
    error: "bg-red-500",
    info: "bg-primary-500",
    warning: "bg-accent-500",
  }[type];

  return (
    <motion.div
      initial={{ opacity: 0, y: -20 }}
      animate={{ opacity: isVisible ? 1 : 0, y: isVisible ? 0 : -20 }}
      exit={{ opacity: 0, y: -20 }}
      className={`fixed top-4 right-4 px-6 py-3 rounded-lg ${bgColor} text-white font-semibold shadow-lg z-50`}
    >
      {message}
    </motion.div>
  );
};

// Empty State Component
export const EmptyState: React.FC<{
  message: string;
  icon?: React.ReactNode;
}> = ({ message, icon }) => {
  return (
    <motion.div
      initial={{ opacity: 0 }}
      animate={{ opacity: 1 }}
      className="flex flex-col items-center justify-center py-20 text-center"
    >
      {icon && <div className="text-6xl mb-4">{icon}</div>}
      <p className="text-gray-600 dark:text-gray-400 text-lg">{message}</p>
    </motion.div>
  );
};
