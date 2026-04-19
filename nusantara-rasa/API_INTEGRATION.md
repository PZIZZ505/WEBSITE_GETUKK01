API Routes untuk Backend Integration:

## Authentication

POST /api/auth/login - Login
POST /api/auth/register - Register
POST /api/auth/logout - Logout
POST /api/auth/refresh - Refresh token
POST /api/auth/google - Google OAuth
POST /api/auth/forgot-password - Forgot password
POST /api/auth/reset-password - Reset password

## Products

GET /api/products - Get all products (with pagination, filter)
GET /api/products/:id - Get product detail
GET /api/products/search?q= - Search products
GET /api/categories - Get all categories
GET /api/products/:id/reviews - Get product reviews

## Cart

GET /api/cart - Get cart
POST /api/cart/add - Add item to cart
PUT /api/cart/update - Update cart item
DELETE /api/cart/:id - Remove item from cart
DELETE /api/cart - Clear cart

## Orders

POST /api/orders - Create order
GET /api/orders - Get user orders
GET /api/orders/:id - Get order detail
PUT /api/orders/:id - Update order status

## User

GET /api/user/profile - Get user profile
PUT /api/user/profile - Update profile
GET /api/user/orders - Get user orders
POST /api/user/addresses - Add address
GET /api/user/addresses - Get saved addresses

## Testimonials

GET /api/testimonials - Get testimonials

---

Request/Response Format:

Success Response:
{
"success": true,
"message": "Success message",
"data": { /_ data _/ }
}

Error Response:
{
"success": false,
"message": "Error message",
"errors": { /_ field errors _/ }
}

---

Headers untuk semua request:

- Content-Type: application/json
- Authorization: Bearer {token} (untuk protected routes)

---

Untuk testing API, gunakan insomnia atau postman dengan base URL:
http://localhost:3001/api
