// Cart State Management dengan Zustand
import { create } from "zustand";

export interface CartItem {
  id: string;
  name: string;
  price: number;
  quantity: number;
  image: string;
  variant?: string;
}

export interface CartStore {
  items: CartItem[];
  total: number;
  addItem: (item: CartItem) => void;
  removeItem: (id: string) => void;
  updateQuantity: (id: string, quantity: number) => void;
  clearCart: () => void;
  getTotalItems: () => number;
  getTotalPrice: () => number;
}

export const useCart = create<CartStore>((set, get) => ({
  items: JSON.parse(localStorage.getItem("cart") || "[]"),
  total: 0,

  addItem: (item: CartItem) => {
    set((state) => {
      const existingItem = state.items.find(
        (i) => i.id === item.id && i.variant === item.variant,
      );

      let newItems;
      if (existingItem) {
        newItems = state.items.map((i) =>
          i.id === item.id && i.variant === item.variant
            ? { ...i, quantity: i.quantity + item.quantity }
            : i,
        );
      } else {
        newItems = [...state.items, item];
      }

      localStorage.setItem("cart", JSON.stringify(newItems));
      return { items: newItems, total: get().getTotalPrice() };
    });
  },

  removeItem: (id: string) => {
    set((state) => {
      const newItems = state.items.filter((i) => i.id !== id);
      localStorage.setItem("cart", JSON.stringify(newItems));
      return { items: newItems, total: get().getTotalPrice() };
    });
  },

  updateQuantity: (id: string, quantity: number) => {
    set((state) => {
      const newItems = state.items
        .map((i) =>
          i.id === id ? { ...i, quantity: Math.max(0, quantity) } : i,
        )
        .filter((i) => i.quantity > 0);

      localStorage.setItem("cart", JSON.stringify(newItems));
      return { items: newItems, total: get().getTotalPrice() };
    });
  },

  clearCart: () => {
    set(() => {
      localStorage.setItem("cart", JSON.stringify([]));
      return { items: [], total: 0 };
    });
  },

  getTotalItems: () => {
    return get().items.reduce((sum, item) => sum + item.quantity, 0);
  },

  getTotalPrice: () => {
    return get().items.reduce(
      (sum, item) => sum + item.price * item.quantity,
      0,
    );
  },
}));

// Auth State Management
export interface User {
  id: string;
  name: string;
  email: string;
  phone: string;
  avatar?: string;
}

export interface AuthStore {
  user: User | null;
  isLoading: boolean;
  login: (email: string, password: string) => Promise<void>;
  register: (
    name: string,
    email: string,
    password: string,
    phone: string,
  ) => Promise<void>;
  logout: () => void;
  setUser: (user: User | null) => void;
}

export const useAuth = create<AuthStore>((set) => ({
  user: JSON.parse(localStorage.getItem("user") || "null"),
  isLoading: false,

  login: async (email: string, password: string) => {
    set({ isLoading: true });
    try {
      // Simulasi API call - Replace dengan real API
      await new Promise((resolve) => setTimeout(resolve, 1000));

      const user: User = {
        id: "1",
        name: "User",
        email,
        phone: "",
      };

      localStorage.setItem("user", JSON.stringify(user));
      set({ user, isLoading: false });
    } catch (error) {
      set({ isLoading: false });
      throw error;
    }
  },

  register: async (
    name: string,
    email: string,
    password: string,
    phone: string,
  ) => {
    set({ isLoading: true });
    try {
      // Simulasi API call - Replace dengan real API
      await new Promise((resolve) => setTimeout(resolve, 1000));

      const user: User = {
        id: "1",
        name,
        email,
        phone,
      };

      localStorage.setItem("user", JSON.stringify(user));
      set({ user, isLoading: false });
    } catch (error) {
      set({ isLoading: false });
      throw error;
    }
  },

  logout: () => {
    localStorage.removeItem("user");
    set({ user: null });
  },

  setUser: (user: User | null) => {
    if (user) {
      localStorage.setItem("user", JSON.stringify(user));
    } else {
      localStorage.removeItem("user");
    }
    set({ user });
  },
}));
