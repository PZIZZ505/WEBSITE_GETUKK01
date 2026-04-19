import React from "react";
import { motion } from "framer-motion";
import { ChevronLeft, ChevronRight } from "lucide-react";

interface CarouselProps {
  items: React.ReactNode[];
  autoPlay?: boolean;
  interval?: number;
}

export const Carousel: React.FC<CarouselProps> = ({
  items,
  autoPlay = true,
  interval = 5000,
}) => {
  const [current, setCurrent] = React.useState(0);
  const [isAutoPlay, setIsAutoPlay] = React.useState(autoPlay);

  React.useEffect(() => {
    if (!isAutoPlay) return;

    const timer = setInterval(() => {
      setCurrent((prev) => (prev + 1) % items.length);
    }, interval);

    return () => clearInterval(timer);
  }, [isAutoPlay, interval, items.length]);

  const next = () => {
    setCurrent((prev) => (prev + 1) % items.length);
    setIsAutoPlay(false);
  };

  const prev = () => {
    setCurrent((prev) => (prev - 1 + items.length) % items.length);
    setIsAutoPlay(false);
  };

  return (
    <div className="relative w-full overflow-hidden rounded-2xl group">
      {/* Carousel Items */}
      <div className="relative w-full aspect-video">
        {items.map((item, index) => (
          <motion.div
            key={index}
            className="absolute inset-0"
            initial={{ opacity: 0 }}
            animate={{ opacity: index === current ? 1 : 0 }}
            transition={{ duration: 0.5 }}
            onClick={() => setIsAutoPlay(false)}
          >
            {item}
          </motion.div>
        ))}
      </div>

      {/* Navigation Buttons */}
      <button
        onClick={prev}
        className="absolute left-4 top-1/2 -translate-y-1/2 p-2 rounded-full bg-white/80 dark:bg-black/50 hover:bg-white dark:hover:bg-black text-nusantara-dusk dark:text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10"
      >
        <ChevronLeft size={24} />
      </button>

      <button
        onClick={next}
        className="absolute right-4 top-1/2 -translate-y-1/2 p-2 rounded-full bg-white/80 dark:bg-black/50 hover:bg-white dark:hover:bg-black text-nusantara-dusk dark:text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 z-10"
      >
        <ChevronRight size={24} />
      </button>

      {/* Dots Indicator */}
      <div className="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2 z-10">
        {items.map((_, index) => (
          <button
            key={index}
            onClick={() => {
              setCurrent(index);
              setIsAutoPlay(false);
            }}
            className={`w-2 h-2 rounded-full transition-all duration-300 ${
              index === current
                ? "bg-white w-8"
                : "bg-white/60 hover:bg-white/80"
            }`}
          />
        ))}
      </div>
    </div>
  );
};
