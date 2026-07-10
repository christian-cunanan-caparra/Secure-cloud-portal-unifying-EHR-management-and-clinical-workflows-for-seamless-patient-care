<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <style>
        /* Navbar styling */
        .navbar {
            background-color: #004a7c;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #ffffff;
            font-family: Arial, sans-serif;
        }
        .navbar-logo {
            font-size: 24px;
            font-weight: bold;
            color: #ffffff;
            text-decoration: none;
        }
        .navbar-links {
            display: flex;
            gap: 20px;
        }
        .navbar-links a {
            color: #ffffff;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s ease;
        }
        .navbar-links a:hover {
            color: #ffcc00;
        }
        /* Mobile responsive */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                text-align: center;
            }
            .navbar-links {
                flex-direction: column;
                gap: 10px;
                margin-top: 10px;
            }
        }

        /* Container styling */
        .container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
        }
        .header h1 {
            color: #004a7c;
            font-size: 28px;
        }
        .header p {
            color: #555;
            font-size: 16px;
        }

        /* Form styling */
        .contact-form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
        }
        .contact-form label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }
        .contact-form input[type="text"],
        .contact-form input[type="email"],
        .contact-form textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 4px;
            border: 1px solid #ddd;
            font-size: 16px;
        }
        .contact-form button {
            padding: 12px;
            color: #ffffff;
            background-color: #004a7c;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .contact-form button:hover {
            background-color: #003b63;
        }

        /* Alert styling */
        .alert {
            padding: 10px;
            margin-top: 20px;
            border-radius: 4px;
            color: #fff;
        }
        .alert-success {
            background-color: #28a745;
        }
        .alert-danger {
            background-color: #dc3545;
        }

        /* Contact info */
        .contact-info {
            margin-top: 30px;
            color: #333;
        }
        .contact-info h2 {
            color: #004a7c;
            font-size: 22px;
            margin-bottom: 10px;
        }
        .contact-info p {
            margin: 5px 0;
            font-size: 16px;
        }

        /* Map styling */
        .map-container {
            margin-top: 30px;
            text-align: center;
        }
        .map-container iframe {
            width: 100%;
            height: 400px;
            border: 0;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <!-- Logo -->
        <a href="/" class="navbar-logo">eHospital</a>
        
        <!-- Navigation Links -->
        <div class="navbar-links">
            <a href="<?= base_url('/home'); ?>">Home</a>
            <a href="<?= base_url('/services'); ?>">Services</a>
            <a href="<?= base_url('/about'); ?>">About Us</a>
            <a href="<?= base_url('/contact-us'); ?>">Contact Us</a>
            <a href="<?= base_url('/login'); ?>">Login</a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container">
        <div class="header">
            <h1>Contact Us</h1>
            <p>We'd love to hear from you! Please fill out the form below or reach out directly.</p>
        </div>

        <!-- Display success message -->
        <?php if (session()->getFlashdata('message')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('message'); ?></div>
        <?php endif; ?>

        <form action="<?= base_url('/contact-us/submit') ?>" method="post" class="contact-form">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="5" required></textarea>

            <button type="submit">Send Message</button>
        </form>

        <div class="contact-info">
            <h2>Contact Information</h2>
            <p><strong>Address:</strong> San Luis District Hospital</p>
            <p><strong>Phone:</strong> 09942060319</p>
            <p><strong>Email:</strong> Ehospital@gmail.com</p>
        </div>

        <div class="map-container">
            <h2>Our Location</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3852.918556256544!2d120.77823577493318!3d15.052620385489051!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3396f96081a42089%3A0x8d2eb009dcb8c947!2sSan%20Luis%20District%20Hospital!5e0!3m2!1sen!2sph!4v1731113710673!5m2!1sen!2sph" allowfullscreen loading="lazy"></iframe>
        </div>
    </div>
</body>
</html>
