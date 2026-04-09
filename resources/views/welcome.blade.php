<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NexTech - Premium Catalog</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&family=Outfit:wght@400;700;900&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color: #050505;
            --surface-color: #111111;
            --surface-highlight: #1a1a1a;
            --primary: #4e00c2;
            --secondary: #00d2ff;
            --text-main: #ffffff;
            --text-muted: #888888;
            --accent: #ff0055;
            --glass-bg: rgba(17, 17, 17, 0.7);
            --glass-border: rgba(255, 255, 255, 0.05);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-main);
            overflow-x: hidden;
            -webkit-font-smoothing: antialiased;
        }

        /* Typography */
        h1, h2, h3, h4 {
            font-family: 'Outfit', sans-serif;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* Navbar */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 80px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 5%;
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--glass-border);
            z-index: 1000;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 900;
            background: linear-gradient(to right, var(--secondary), var(--primary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -1px;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .nav-links li a {
            font-weight: 600;
            font-size: 0.95rem;
            transition: color 0.3s ease;
            color: var(--text-muted);
        }

        .nav-links li a:hover {
            color: var(--secondary);
        }

        .cart-btn {
            background: transparent;
            color: var(--text-main);
            border: 1px solid var(--glass-border);
            padding: 0.6rem 1.2rem;
            border-radius: 30px;
            cursor: pointer;
            font-weight: 600;
            font-family: 'Inter', sans-serif;
            transition: all 0.3s ease;
        }

        .cart-btn:hover {
            background: var(--text-main);
            color: var(--bg-color);
        }

        /* Hero Section */
        header {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            padding: 0 5%;
            text-align: center;
            overflow: hidden;
        }

        .hero-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('{{ asset('img/hero_background_1775705335157.png') }}');
            background-size: cover;
            background-position: center;
            z-index: 0;
            opacity: 0.4;
        }

        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at center, transparent 0%, var(--bg-color) 80%);
            z-index: 1;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            animation: fadeUp 1s ease-out forwards;
        }

        .hero-tag {
            display: inline-block;
            padding: 0.4rem 1rem;
            background: rgba(0, 210, 255, 0.1);
            color: var(--secondary);
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .hero-content h1 {
            font-size: 4.5rem;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            font-weight: 900;
        }

        .hero-content h1 span {
            background: linear-gradient(45deg, var(--secondary), #b5min, var(--primary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-content p {
            font-size: 1.2rem;
            color: var(--text-muted);
            margin-bottom: 2.5rem;
            line-height: 1.6;
        }

        .btn-primary {
            display: inline-block;
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            color: white;
            padding: 1rem 2.5rem;
            border-radius: 30px;
            font-weight: 700;
            font-size: 1rem;
            border: none;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 10px 20px rgba(78, 0, 194, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 25px rgba(0, 210, 255, 0.4);
        }

        /* Products Section */
        .products {
            padding: 8rem 5%;
            position: relative;
        }

        .section-header {
            margin-bottom: 4rem;
            text-align: center;
        }

        .section-header h2 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .section-header p {
            color: var(--text-muted);
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2.5rem;
        }

        .product-card {
            background: var(--surface-color);
            border-radius: 20px;
            padding: 1.5rem;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border: 1px solid var(--glass-border);
            position: relative;
            overflow: hidden;
            group: card;
        }

        .product-card:hover {
            transform: translateY(-10px);
            border-color: rgba(255, 255, 255, 0.15);
            box-shadow: 0 20px 40px rgba(0,0,0,0.5), 0 0 40px rgba(0, 210, 255, 0.1);
        }

        .product-image-container {
            width: 100%;
            height: 280px;
            border-radius: 12px;
            overflow: hidden;
            background: var(--surface-highlight);
            margin-bottom: 1.5rem;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .product-image {
            max-width: 90%;
            max-height: 90%;
            object-fit: contain;
            transition: transform 0.5s ease;
        }

        .product-card:hover .product-image {
            transform: scale(1.08);
        }

        .badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: var(--accent);
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 700;
            z-index: 2;
        }

        .product-info {
            display: flex;
            flex-direction: column;
            gap: 0.8rem;
        }

        .product-category {
            color: var(--secondary);
            font-size: 0.85rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .product-title {
            font-size: 1.4rem;
            font-weight: 700;
            line-height: 1.3;
        }

        .product-price {
            font-size: 1.5rem;
            font-family: 'Outfit', sans-serif;
            font-weight: 900;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 0.5rem;
        }

        .add-to-cart {
            background: rgba(255,255,255,0.05);
            border: none;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .product-card:hover .add-to-cart {
            background: var(--secondary);
            color: var(--bg-color);
        }

        /* Footer */
        footer {
            background: var(--surface-color);
            padding: 4rem 5%;
            text-align: center;
            border-top: 1px solid var(--glass-border);
        }

        .footer-logo {
            font-size: 2rem;
            margin-bottom: 1rem;
            background: linear-gradient(to right, var(--secondary), var(--primary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-family: 'Outfit', sans-serif;
            font-weight: 900;
        }

        .footer-text {
            color: var(--text-muted);
            margin-bottom: 2rem;
        }

        /* Animations */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Categories Section */
        .categories {
            padding: 5rem 5%;
            background: var(--surface-color);
        }

        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        .category-card {
            background: var(--surface-highlight);
            padding: 2rem;
            border-radius: 16px;
            text-align: center;
            border: 1px solid var(--glass-border);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .category-card:hover {
            transform: translateY(-5px);
            border-color: var(--secondary);
            box-shadow: 0 10px 20px rgba(0, 210, 255, 0.1);
        }

        .category-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: var(--text-main);
        }

        /* About Section */
        .about {
            padding: 8rem 5%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 4rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .about-content {
            flex: 1;
        }
        
        .about-content h2 {
            font-size: 3rem;
            margin-bottom: 1.5rem;
        }
        
        .about-content p {
            color: var(--text-muted);
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 1.5rem;
        }

        .about-image {
            flex: 1;
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid var(--glass-border);
            box-shadow: 0 20px 40px rgba(0,0,0,0.5);
            max-height: 500px;
        }
        
        .about-image img {
            width: 100%;
            height: 100%;
            display: block;
            opacity: 0.8;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 3rem;
            }
            .nav-links {
                display: none;
            }
        }
    </style>
</head>
<body>

    <nav>
        <div class="logo">NexTech</div>
        <ul class="nav-links">
            <li><a href="#home">Home</a></li>
            <li><a href="#products">New Arrivals</a></li>
            <li><a href="#categories">Categories</a></li>
            <li><a href="#about">About Us</a></li>
        </ul>
        <button class="cart-btn" id="cartCountBtn">Cart (0)</button>
    </nav>

    <header id="home">
        <div class="hero-bg"></div>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <div class="hero-tag">New Generation 2026</div>
            <h1>Experience The <span>Future</span> <br>Of Technologies</h1>
            <p>Discover our meticulously curated collection of premium gadgets, designed to elevate your everyday experiences with cutting-edge innovation.</p>
            <a href="#products" class="btn-primary" style="display: inline-block;">Explore Catalog</a>
        </div>
    </header>

    <section class="products" id="products">
        <div class="section-header">
            <h2>Featured Products</h2>
            <p>Our most popular and highly rated gear, loved by tech enthusiasts around the globe.</p>
        </div>

        <div class="product-grid">
            
            <!-- Product 1 -->
            <div class="product-card">
                <div class="badge">Hot</div>
                <div class="product-image-container">
                    <img src="{{ asset('img/product_smartwatch_1775705351092.png') }}" class="product-image" alt="Aura Smartwatch Pro">
                </div>
                <div class="product-info">
                    <div class="product-category">Wearables</div>
                    <div class="product-title">Aura Smartwatch Pro Series X</div>
                    <div class="product-price">
                        $349.00
                        <button class="add-to-cart">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="product-card">
                <div class="badge">Sale</div>
                <div class="product-image-container">
                    <img src="{{ asset('img/product_earbuds_1775705367703.png') }}" class="product-image" alt="Sonic True Wireless Earbuds">
                </div>
                <div class="product-info">
                    <div class="product-category">Audio</div>
                    <div class="product-title">Sonic Air Stealth Earbuds</div>
                    <div class="product-price">
                        $159.00
                        <button class="add-to-cart">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="product-card">
                <div class="product-image-container">
                    <img src="{{ asset('img/product_vr_1775705385216.png') }}" class="product-image" alt="Vision VR Infinity">
                </div>
                <div class="product-info">
                    <div class="product-category">Gaming</div>
                    <div class="product-title">Vision VR Infinity Headset</div>
                    <div class="product-price">
                        $599.00
                        <button class="add-to-cart">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 4 -->
            <div class="product-card">
                <div class="product-image-container">
                    <img src="{{ asset('img/product_keyboard_1775705401877.png') }}" class="product-image" alt="Mech Pro Keychron">
                </div>
                <div class="product-info">
                    <div class="product-category">Accessories</div>
                    <div class="product-title">MechPro Carbon RGB Keyboard</div>
                    <div class="product-price">
                        $225.00
                        <button class="add-to-cart">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section class="categories" id="categories">
        <div class="section-header">
            <h2>Shop By Category</h2>
            <p>Find exactly what you're looking for in our specialized tech departments.</p>
        </div>
        <div class="category-grid">
            <div class="category-card">
                <div class="category-icon">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="7"></circle><polyline points="12 9 12 12 13.5 13.5"></polyline><path d="M16.51 17.35l-.35 3.83a2 2 0 0 1-2 1.82H9.83a2 2 0 0 1-2-1.82l-.35-3.83m.01-10.7l.35-3.83A2 2 0 0 1 9.83 1h4.35a2 2 0 0 1 2 1.82l.35 3.83"></path></svg>
                </div>
                <h3>Wearables</h3>
            </div>
            <div class="category-card">
                <div class="category-icon">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 18v-6a9 9 0 0 1 18 0v6"></path><path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path></svg>
                </div>
                <h3>Audio</h3>
            </div>
            <div class="category-card">
                <div class="category-icon">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="6" width="20" height="12" rx="2"></rect><path d="M6 12h4"></path><path d="M8 10v4"></path><line x1="15" y1="13" x2="15.01" y2="13"></line><line x1="18" y1="11" x2="18.01" y2="11"></line></svg>
                </div>
                <h3>Gaming</h3>
            </div>
            <div class="category-card">
                <div class="category-icon">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="7"></rect><path d="M12 6v4"></path></svg>
                </div>
                <h3>Accessories</h3>
            </div>
        </div>
    </section>

    <section class="about" id="about">
        <div class="about-content">
            <h2>About NexTech</h2>
            <p>Founded in 2026, NexTech has been at the forefront of delivering premium technology directly to enthusiasts worldwide. We carefully curate our catalog to ensure that every product meets our rigorous standards for quality, design, and innovation.</p>
            <p>Our mission is to simplify the premium tech shopping experience, bringing you closer to the gadgets that define the future. Whether you are upgrading your setup or finding the perfect gift, NexTech has you covered.</p>
            <a href="#categories" class="btn-primary" style="margin-top: 1rem; display: inline-block;">View Categories</a>
        </div>
        <div class="about-image">
            <img src="{{ asset('img/hero_background_1775705335157.png') }}" alt="About NexTech" style="object-fit: cover; height: 100%;">
        </div>
    </section>

    <footer>
        <div class="logo footer-logo">NexTech</div>
        <p class="footer-text">&copy; 2026 NexTech Premium Catalog. All rights reserved.</p>
    </footer>

    <script>
        // Smooth scroll for anchors
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });

        // Dummy Cart logic & animation
        let cartCount = 0;
        const cartBtn = document.getElementById('cartCountBtn');
        
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function() {
                cartCount++;
                cartBtn.textContent = `Cart (${cartCount})`;
                
                // Pop animation for the cart button
                cartBtn.style.transition = 'all 0.2s ease-out';
                cartBtn.style.transform = 'scale(1.15)';
                cartBtn.style.background = 'var(--accent)';
                cartBtn.style.borderColor = 'var(--accent)';
                cartBtn.style.color = '#fff';
                
                setTimeout(() => {
                    cartBtn.style.transform = 'scale(1)';
                    cartBtn.style.background = 'transparent';
                    cartBtn.style.borderColor = 'var(--glass-border)';
                    cartBtn.style.color = 'var(--text-main)';
                }, 300);
            });
        });
    </script>
</body>
</html>
