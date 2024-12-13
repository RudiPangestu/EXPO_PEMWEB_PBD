<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Karya Nusantara - Indonesian Handicrafts Marketplace</title>

    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:wght@400;600;700&family=Poppins:wght@300,400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
      :root {
        --primary-color: #8B4513; /* Warm brown inspired by batik and wood crafts */
        --secondary-color: #CD853F; /* Brighter terracotta tone */
        --background-light: #FFF8E7; /* Soft cream background */
        --text-dark: #3E2723; /* Deep brown for text */
        --accent-color: #6D4C41; /* Rich earth tone */
      }

      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        font-family: 'Poppins', sans-serif;
        line-height: 1.6;
        color: var(--text-dark);
        background-color: var(--background-light);
      }

      .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 15px;
      }

      .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px 0;
        background-color: transparent;
      }

      .navbar-brand {
        display: flex;
        align-items: center;
        font-family: 'Crimson Text', serif;
        font-size: 2rem;
        font-weight: 700;
        color: var(--primary-color);
      }

      .navbar-brand i {
        font-size: 2rem;
        margin-right: 10px;
        color: var(--secondary-color);
      }

      .nav-links {
        display: flex;
        list-style: none;
        align-items: center;
      }

      .nav-links li {
        margin-left: 30px;
      }

      .nav-links a {
        text-decoration: none;
        color: var(--text-dark);
        font-weight: 500;
        transition: color 0.3s ease;
        font-family: 'Poppins', sans-serif;
      }

      .nav-links a:hover {
        color: var(--secondary-color);
      }

      .shop-now-btn {
        background-color: var(--secondary-color);
        color: var(--background-light);
        padding: 12px 24px;
        border-radius: 5px;
        text-decoration: none;
        font-weight: 600;
        transition: background-color 0.3s ease, transform 0.3s ease;
      }

      .shop-now-btn:hover {
        background-color: var(--primary-color);
        transform: translateY(-2px);
      }

      .hero {
        display: flex;
        align-items: center;
        padding: 100px 0;
        background-color: var(--background-light);
      }

      .hero-content {
        flex: 1;
        padding-right: 50px;
      }

      .hero-content h1 {
        font-family: 'Crimson Text', serif;
        font-size: 3.5rem;
        margin-bottom: 20px;
        color: var(--primary-color);
        line-height: 1.2;
      }

      .hero-content p {
        font-size: 1.1rem;
        color: var(--accent-color);
        margin-bottom: 30px;
      }

      .hero-image {
        flex: 1;
        text-align: center;
      }

      .hero-image img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
  
      }

      .features {
        display: flex;
        justify-content: space-between;
        padding: 80px 0;
        background-color: white;
      }

      .feature {
        text-align: center;
        flex: 1;
        padding: 0 20px;
      }

      .feature-icon {
        font-size: 3rem;
        color: var(--primary-color);
        margin-bottom: 20px;
      }

      .feature h3 {
        margin-bottom: 15px;
        color: var(--text-dark);
        font-family: 'Crimson Text', serif;
      }

      footer {
        background-color: var(--primary-color);
        color: var(--background-light);
        padding: 40px 0;
        text-align: center;
        font-family: 'Poppins', sans-serif;
      }

      footer i {
        font-size: 1.5rem;
        margin: 0 10px;
        color: var(--background-light);
        transition: color 0.3s ease;
      }

      footer i:hover {
        color: var(--secondary-color);
      }
    </style>
  </head>
  <body>
    <nav class="navbar container">
      <div class="navbar-brand">
        <i class="fas fa-shopping-bag"></i>
        Karya Nusantara
      </div>
      <ul class="nav-links">
        <li><a href="#">Home</a></li>
        <li><a href="#">Categories</a></li>
        <li><a href="#" class="shop-now-btn">Shop Now</a></li>
      </ul>
    </nav>

    <header class="hero container">
      <div class="hero-content">
        <h1>Celebrate Indonesian Craftsmanship</h1>
        <p>Discover authentic handcrafted treasures from across the Indonesian archipelago. Each piece tells a story of tradition, skill, and cultural heritage.</p>
        <a href="#" class="shop-now-btn">Shop Now</a>
      </div>
      <div class="hero-image">
        <img src="images/Miniatur kapal pinisi.png" alt="Indonesian Handicrafts">
      </div>
    </header>

    <section class="features container">
      <div class="feature">
        <div class="feature-icon">
          <i class="fas fa-palette"></i>
        </div>
        <h3>Authentic Crafts</h3>
        <p>Curated collection of traditional Indonesian handicrafts from skilled artisans across the archipelago.</p>
      </div>
      <div class="feature">
        <div class="feature-icon">
          <i class="fas fa-globe"></i>
        </div>
        <h3>Cultural Heritage</h3>
        <p>Support local communities and preserve the rich artistic traditions of Indonesia.</p>
      </div>
      <div class="feature">
        <div class="feature-icon">
          <i class="fas fa-hand-holding-heart"></i>
        </div>
        <h3>Handmade Quality</h3>
        <p>Each piece is meticulously crafted, representing generations of artistic skill and passion.</p>
      </div>
    </section>

    <footer>
      <div class="container">
        <p>&copy; 2024 Karya Nusantara. Celebrating Indonesian Artistry.</p>
        <div>
          <a href="#"><i class="fab fa-facebook"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
        </div>
      </div>
    </footer>
  </body>
</html>