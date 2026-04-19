@extends('layouts.app')

@section('title', 'Produk - Nusantara Rasa')

@section('content')
<style>
    /* Header Section */
    .products-header {
        background: linear-gradient(135deg, #FF9800 0%, #FF7043 25%, #FF6F00 50%, #FF9800 75%, #FFB74D 100%);
        color: white;
        padding: 60px 0;
        margin-bottom: 50px;
        position: relative;
        overflow: hidden;
    }

    .products-header h1 {
        font-size: 2.5rem;
        font-weight: 900;
        text-shadow: 2px 2px 8px rgba(0,0,0,0.2);
        margin-bottom: 15px;
    }

    .products-header p {
        font-size: 1.1rem;
        opacity: 0.95;
    }

    /* Filter Sidebar */
    .filter-card {
        border: none;
        border-radius: 14px;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
        position: sticky;
        top: 100px;
        background: white;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .filter-card:hover {
        box-shadow: 0 4px 20px rgba(255, 152, 0, 0.12);
    }

    .filter-card-header {
        background: linear-gradient(135deg, #FF9800 0%, #FF7043 100%);
        color: white;
        padding: 24px 25px;
        font-weight: 800;
        font-size: 1.15rem;
        margin: 0;
        border: none;
        letter-spacing: 0.5px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .filter-card-header i {
        font-size: 1.3rem;
    }

    .filter-card .card-body {
        padding: 30px;
    }

    .filter-section-title {
        font-weight: 700;
        color: #222;
        margin-bottom: 18px;
        margin-top: 24px;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .filter-section-title:first-of-type {
        margin-top: 0;
    }

    .filter-section-title i {
        color: #FF9800;
        font-size: 1rem;
    }

    .form-check {
        margin-bottom: 14px;
        padding: 12px 14px;
        background: #fafafa;
        border-radius: 8px;
        transition: all 0.25s ease;
        border: 1px solid transparent;
        display: flex;
        align-items: center;
    }

    .form-check:hover {
        background: #f5f5f5;
        border-color: #e8e8e8;
    }

    .form-check-input {
        width: 22px;
        height: 22px;
        border: 2.5px solid #ccc;
        cursor: pointer;
        transition: all 0.25s ease;
        background-color: white;
        margin: 0;
        margin-right: 12px;
        border-radius: 5px;
        flex-shrink: 0;
    }

    .form-check-input:checked {
        background-color: #FF9800;
        border-color: #FF9800;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='none' stroke='white' stroke-linecap='round' stroke-linejoin='round' stroke-width='3' d='M6 10l3 3l6-6'/%3e%3c/svg%3e");
        background-size: 100% 100%;
        background-position: center;
        background-repeat: no-repeat;
    }

    .form-check-input:hover {
        border-color: #FF9800;
        background-color: #fff9f5;
    }

    .form-check-input:checked:hover {
        background-color: #FF7043;
        border-color: #FF7043;
    }

    .form-check-input:focus {
        border-color: #FF9800;
        outline: none;
        box-shadow: 0 0 0 3px rgba(255, 152, 0, 0.1);
    }

    .form-check-label {
        cursor: pointer;
        transition: all 0.25s ease;
        color: #222;
        font-weight: 500;
        margin: 0;
        user-select: none;
        display: flex;
        align-items: center;
        padding: 0;
        font-size: 0.92rem;
        flex: 1;
    }

    .form-check-label:hover {
        color: #FF9800;
    }

    .btn-reset-filter {
        background: linear-gradient(135deg, #FF9800 0%, #FF7043 100%);
        border: none;
        color: white;
        font-weight: 700;
        padding: 14px 24px;
        border-radius: 8px;
        transition: all 0.3s ease;
        margin-top: 28px;
        width: 100%;
        font-size: 0.95rem;
        letter-spacing: 0.3px;
        cursor: pointer;
        box-shadow: 0 4px 12px rgba(255, 152, 0, 0.2);
    }

    .btn-reset-filter:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(255, 152, 0, 0.3);
        background: linear-gradient(135deg, #FF7043 0%, #FF6F00 100%);
        color: white;
    }

    .btn-reset-filter:active {
        transform: translateY(0);
        box-shadow: 0 2px 6px rgba(255, 152, 0, 0.2);
    }

    /* Products Section */
    .products-toolbar {
        background: white;
        padding: 20px;
        border-radius: 12px;
        margin-bottom: 30px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
    }

    .products-count {
        font-weight: 600;
        color: #333;
    }

    .products-count strong {
        color: #FF9800;
        font-size: 1.2rem;
    }

    .sort-select {
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        padding: 10px 15px;
        font-weight: 600;
        color: #333;
        transition: all 0.3s;
    }

    .sort-select:focus {
        border-color: #FF9800;
        outline: none;
        box-shadow: 0 0 0 3px rgba(255, 152, 0, 0.1);
    }

    .sort-select:hover {
        border-color: #FF9800;
    }

    /* Product Cards */
    .product-card-menu {
        border: none;
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(255, 152, 0, 0.1);
        background: white;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .product-card-menu:hover {
        transform: translateY(-12px);
        box-shadow: 0 16px 32px rgba(255, 152, 0, 0.25);
    }

    .product-card-menu img {
        height: 220px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .product-card-menu:hover img {
        transform: scale(1.08);
    }

    .product-card-menu .card-body {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .product-badge {
        display: inline-block;
        background: linear-gradient(135deg, #FF9800, #FF7043);
        color: white;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 700;
        margin-bottom: 12px;
    }

    .product-card-menu .card-title {
        color: #333;
        font-weight: 700;
        font-size: 0.95rem;
        margin-bottom: 8px;
    }

    .product-card-menu .card-text {
        color: #666;
        font-size: 0.85rem;
        margin-bottom: 12px;
        flex-grow: 1;
    }

    .product-rating {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 15px;
    }

    .product-rating .fa-star {
        color: #FFC107;
    }

    .product-rating-text {
        color: #999;
        font-size: 0.8rem;
    }

    .product-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-top: 1px solid #f0f0f0;
        padding-top: 15px;
    }

    .product-price {
        color: #FF9800;
        font-weight: 800;
        font-size: 1.2rem;
    }

    .btn-view {
        background: linear-gradient(135deg, #FF9800, #FF7043);
        border: none;
        color: white;
        padding: 8px 16px;
        border-radius: 8px;
        transition: all 0.3s;
        font-weight: 600;
        font-size: 0.85rem;
    }

    .btn-view:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 12px rgba(255, 152, 0, 0.3);
        background: linear-gradient(135deg, #FF7043, #FF6F00);
        color: white;
    }

    /* No Results */
    .no-results-message {
        text-align: center;
        padding: 60px 20px;
        color: #999;
    }

    .no-results-message i {
        font-size: 3rem;
        color: #FF9800;
        margin-bottom: 20px;
        opacity: 0.6;
    }

    .no-results-message p {
        color: #333;
        font-weight: 600;
        font-size: 1.1rem;
    }

    /* Scrollbar styling */
    .filter-card::-webkit-scrollbar {
        width: 6px;
    }

    .filter-card::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    .filter-card::-webkit-scrollbar-thumb {
        background: #FF9800;
        border-radius: 10px;
    }

    .filter-card::-webkit-scrollbar-thumb:hover {
        background: #FF7043;
    }

    /* Text overrides */
    h1, h2, h3, h4, h5, h6,
    .lead,
    label,
    .form-check-label,
    .text-muted {
        color: #333 !important;
    }

    /* Footer styling - keep white */
    footer,
    footer * {
        color: white !important;
    }

    footer a {
        color: white !important;
        text-decoration: none !important;
    }

    footer a:hover {
        color: white !important;
        text-decoration: underline !important;
    }
</style>

<!-- Header Section -->
<div class="products-header">
    <div class="container">
        <h1 class="mb-2">
            <i class="fas fa-utensils"></i> Menu Produk
        </h1>
        <p class="lead">Jelajahi koleksi lengkap produk makanan dan minuman tradisional nusantara kami</p>
    </div>
</div>

<div class="container py-5">

    <div class="row g-4">
        <!-- Filter Section -->
        <div class="col-lg-3">
            <div class="filter-card">
                <div class="filter-card-header">
                    <i class="fas fa-filter"></i> Filter Produk
                </div>
                <div class="card-body">
                    <form id="filterForm">
                        <!-- Kategori -->
                        <div class="mb-4">
                            <div class="filter-section-title">
                                <i class="fas fa-list"></i> Kategori
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="cat-makanan" value="makanan">
                                <label class="form-check-label" for="cat-makanan">
                                    Makanan (4)
                                </label>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="cat-minuman" value="minuman">
                                <label class="form-check-label" for="cat-minuman">
                                    Minuman (3)
                                </label>
                            </div>
                        </div>

                        <!-- Rating -->
                        <div class="mb-4">
                            <div class="filter-section-title">
                                <i class="fas fa-star"></i> Rating
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rating-5" value="5">
                                <label class="form-check-label" for="rating-5">
                                    ★★★★★ 5 Bintang
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rating-4" value="4">
                                <label class="form-check-label" for="rating-4">
                                    ★★★★ 4 Bintang & Ke Atas
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rating-3" value="3">
                                <label class="form-check-label" for="rating-3">
                                    ★★★ 3 Bintang & Ke Atas
                                </label>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="reset" class="btn btn-reset-filter">
                                <i class="fas fa-redo"></i> Reset Filter
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="col-lg-9">
            <!-- Sort and View Options -->
            <div class="products-toolbar">
                <div class="products-count">
                    <i class="fas fa-box"></i> Menampilkan <strong>7</strong> Produk
                </div>
                <div>
                    <select id="sortDropdown" class="sort-select">
                        <option value="price-low" selected>Urutkan: Harga Terendah</option>
                        <option value="price-high">Urutkan: Harga Tertinggi</option>
                        <option value="rating-high">Urutkan: Rating Tertinggi</option>
                    </select>
                </div>
            </div>

            <!-- Products -->
            <div class="row g-4" id="productsContainer">
                @php
                    $products = [
                        ['image' => '/Getuk.jpeg', 'title' => 'Getuk ', 'price' => 25000, 'reviews' => 55, 'category' => 'makanan', 'rating' => 4.8, 'id' => 1, 'date' => '2024-01-15'],
                        ['image' => '/klepon.jpeg', 'title' => 'Klepon ', 'price' => 12000, 'reviews' => 60, 'category' => 'makanan', 'rating' => 4.9, 'id' => 2, 'date' => '2024-01-20'],
                        ['image' => '/kue kucur.jpeg', 'title' => 'Kue Kuncur ', 'price' => 20000, 'reviews' => 65, 'category' => 'makanan', 'rating' => 4.7, 'id' => 3, 'date' => '2024-01-10'],
                        ['image' => '/kue rangi.jpeg', 'title' => 'Kue Rangi ', 'price' => 10000, 'reviews' => 70, 'category' => 'makanan', 'rating' => 5.0, 'id' => 4, 'date' => '2024-01-25'],
                        ['image' => '/onde onde.jpeg', 'title' => 'Onde Onde ', 'price' => 14000, 'reviews' => 75, 'category' => 'makanan', 'rating' => 4.6, 'id' => 5, 'date' => '2024-01-30'],
                        ['image' => '/Angsle.jpg', 'title' => 'Es Angsle ', 'price' => 8000, 'reviews' => 70, 'category' => 'minuman', 'rating' => 4.8, 'id' => 6, 'date' => '2024-02-05'],
                        ['image' => '/Es Tawon.jpg', 'title' => 'Es Tawon ', 'price' => 10000, 'reviews' => 78, 'category' => 'minuman', 'rating' => 4.9, 'id' => 7, 'date' => '2024-02-10'],
                        ['image' => '/Es Pleret .jpg', 'title' => 'Es Pleret ', 'price' => 7000, 'reviews' => 82, 'category' => 'minuman', 'rating' => 4.7, 'id' => 8, 'date' => '2024-02-15']
                    ];
                @endphp
                @foreach($products as $index => $product)
                    <div class="col-sm-6 col-lg-4 product-item" data-category="{{ $product['category'] }}" data-rating="{{ $product['rating'] }}" data-price="{{ $product['price'] }}" data-reviews="{{ $product['reviews'] }}" data-date="{{ $product['date'] }}" data-id="{{ $product['id'] }}">
                        <div class="card h-100 product-card-menu">
                            <img src="{{ $product['image'] }}" class="card-img-top cursor-pointer" alt="{{ $product['title'] }}" data-id="{{ $index + 1 }}">
                            <div class="card-body">
                                <span class="product-badge"><i class="fas fa-fire"></i> Populer</span>
                                <h6 class="card-title">{{ $product['title'] }}</h6>
                                <p class="card-text">Produk berkualitas tinggi dari UMKM lokal dengan bahan-bahan pilihan terbaik.</p>
                                
                                <div class="product-rating">
                                    <div>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <span class="product-rating-text">({{ $product['reviews'] }} ulasan)</span>
                                </div>

                                <div class="product-footer">
                                    <div class="product-price">Rp {{ number_format($product['price'], 0, ',', '.') }}</div>
                                    <a href="{{ route('getuk.detail', $index + 1) }}" class="btn btn-view">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination removed -->
        </div>
    </div>
</div>

<script>
    // Product image click
    document.querySelectorAll('.product-card-menu img').forEach(img => {
        img.addEventListener('click', function() {
            const productId = this.getAttribute('data-id');
            window.location.href = '{{ route("getuk.detail", ":id") }}'.replace(':id', productId);
        });
    });

    // Filter functionality
    const filterForm = document.getElementById('filterForm');
    const filterCheckboxes = filterForm.querySelectorAll('input[type="checkbox"]');
    const productsContainer = document.getElementById('productsContainer');
    const productCount = document.querySelector('.text-muted strong');

    // Function to get selected filters
    function getSelectedFilters() {
        const selectedCategories = [];
        const selectedRatings = [];

        // Get selected categories
        document.querySelectorAll('input[id^="cat-"]:checked').forEach(checkbox => {
            selectedCategories.push(checkbox.value);
        });

        // Get selected ratings
        document.querySelectorAll('input[id^="rating-"]:checked').forEach(checkbox => {
            selectedRatings.push(parseFloat(checkbox.value));
        });

        return { categories: selectedCategories, ratings: selectedRatings };
    }

    // Function to filter products
    function filterProducts() {
        const filters = getSelectedFilters();
        let visibleCount = 0;

        // Get all product items
        const productItems = productsContainer.querySelectorAll('.product-item');

        productItems.forEach(item => {
            const productCategory = item.getAttribute('data-category');
            const productRating = parseFloat(item.getAttribute('data-rating'));

            let showProduct = true;

            // Check category filter
            if (filters.categories.length > 0) {
                showProduct = filters.categories.includes(productCategory);
            }

            // Check rating filter (product rating must be >= minimum selected rating)
            if (showProduct && filters.ratings.length > 0) {
                const minRating = Math.min(...filters.ratings);
                showProduct = productRating >= minRating;
            }

            // Show or hide product
            if (showProduct) {
                item.style.display = '';
                visibleCount++;
            } else {
                item.style.display = 'none';
            }
        });

        // Update product count
        if (productCount) {
            productCount.textContent = visibleCount;
        }

        // Show "No results" message if needed
        let noResultsMsg = productsContainer.querySelector('.no-results-message');
        if (visibleCount === 0) {
            if (!noResultsMsg) {
                noResultsMsg = document.createElement('div');
                noResultsMsg.className = 'col-12 no-results-message text-center py-5';
                noResultsMsg.innerHTML = '<p class="text-muted"><i class="fas fa-search"></i> Tidak ada produk yang sesuai dengan filter pilihan Anda</p>';
                productsContainer.appendChild(noResultsMsg);
            }
        } else {
            if (noResultsMsg) {
                noResultsMsg.remove();
            }
        }
    }

    // Sorting functionality
    const sortDropdown = document.getElementById('sortDropdown');

    // Function to sort products
    function sortProducts() {
        const sortValue = sortDropdown.value;
        const visibleItems = Array.from(productsContainer.querySelectorAll('.product-item')).filter(item => item.style.display !== 'none');

        visibleItems.sort((a, b) => {
            switch(sortValue) {
                case 'price-low':
                    // Sort by price ascending
                    return parseFloat(a.dataset.price) - parseFloat(b.dataset.price);
                
                case 'price-high':
                    // Sort by price descending
                    return parseFloat(b.dataset.price) - parseFloat(a.dataset.price);
                
                case 'rating-high':
                default:
                    // Sort by rating descending
                    return parseFloat(b.dataset.rating) - parseFloat(a.dataset.rating);
            }
        });

        // Reorder products in the DOM
        visibleItems.forEach(item => {
            productsContainer.appendChild(item);
        });
    }

    // Add event listener to sort dropdown
    sortDropdown.addEventListener('change', sortProducts);

    // Combine filter and sort
    function applyFiltersAndSort() {
        filterProducts();
        sortProducts();
    }

    // Update filter listeners to also apply sort
    filterCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', applyFiltersAndSort);
    });

    // Update reset button to trigger sort
    filterForm.addEventListener('reset', function() {
        setTimeout(() => {
            applyFiltersAndSort();
        }, 0);
    });

    // Initialize on page load
    applyFiltersAndSort();
</script>
@endsection
