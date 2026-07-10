<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eHospital - Home</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
</head>
<body>
    <!-- Navbar -->
    <header class="navbar">
        <a href="/" class="logo">eHospital</a>
        <nav class="navbar-links">
            <a href="<?= base_url('/home'); ?>">Home</a>
            <a href="<?= base_url('/about'); ?>">About</a>
            <a href="<?= base_url('/services'); ?>">Services</a>
            <a href="<?= base_url('/contact-us'); ?>">Contact</a>
            <a href="<?= base_url('/login'); ?>">Login</a>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <h1>Welcome to eHospital</h1>
        <p>Your trusted healthcare solution</p>
        <a href="<?= base_url('/services'); ?>" class="cta-button">Explore Services</a>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="feature">
            <h2>Advanced Technology</h2>
            <p>Our hospital system is equipped with state-of-the-art technology.</p>
        </div>
        <div class="feature">
            <h2>Expert Staff</h2>
            <p>Our team consists of qualified and experienced healthcare professionals.</p>
        </div>
        <div class="feature">
            <h2>24/7 Support</h2>
            <p>Get round-the-clock support for your health needs.</p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; <?= date('Y'); ?> eHospital. All rights reserved.</p>
    </footer>

</body>
</html>
