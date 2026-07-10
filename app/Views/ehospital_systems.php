<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JMC Hospital Systems</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f9;
        }
        .header {
            padding: 20px;
            background-color: #007bff;
            color: white;
            text-align: center;
        }
        .main-content {
            padding: 20px;
            max-width: 1200px;
            margin: auto;
        }
        .section-title {
            font-size: 28px;
            color: #333;
            margin-bottom: 10px;
        }
        .doctor-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .doctor-card {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            flex: 1 1 calc(33.333% - 20px);
            text-align: center;
        }
        .doctor-card h3 {
            font-size: 20px;
            color: #007bff;
            margin-bottom: 10px;
        }
        .doctor-card p {
            font-size: 14px;
            color: #555;
        }
        .doctor-card a {
            text-decoration: none;
            color: #007bff;
        }
        .doctor-card a:hover {
            text-decoration: underline;
        }

        /* Styling for the Google Map iframe */
        .map-container {
            margin-top: 20px;
            max-width: 100%;
            height: 400px;
            border-radius: 8px;
            overflow: hidden;
        }
        .map-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }

        /* Footer Styles */
        .footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 40px;
        }
        .footer p {
            margin: 0;
            font-size: 14px;
        }
        .footer a {
            color: #007bff;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>JMC Hospital Systems</h1>
        <p>Your comprehensive solution for hospital management</p>
    </div>

    <div class="main-content">
        <section>
            <h2 class="section-title">Overview</h2>
            <p>JMC Hospital Systems is an integrated hospital management system designed to manage all aspects of hospital operations. It includes management of administrative, medical, legal, and financial control.</p>
        </section>

        <section>
            <h2 class="section-title">Doctors and Specializations</h2>
            <div class="doctor-list">
                <div class="doctor-card">
                    <h3><a href="/login" target="_blank">Dr. Arzel Pinpin</a></h3>
                    <p>Cardiologist</p>
                </div>
                <div class="doctor-card">
                    <h3><a href="/login" target="_blank">Dr. Noel Salac</a></h3>
                    <p>Neurologist</p>
                </div>
                <div class="doctor-card">
                    <h3><a href="/login" target="_blank">Dr. Rommel San Pablo</a></h3>
                    <p>Orthopedic Surgeon</p>
                </div>
                <div class="doctor-card">
                    <h3><a href="/login" target="_blank">Dr. Clarence Estacio</a></h3>
                    <p>Pediatrician</p>
                </div>
                <div class="doctor-card">
                    <h3><a href="/login" target="_blank">Dr. John Elmo Mangune</a></h3>
                    <p>Dermatologist</p>
                </div>
                <div class="doctor-card">
                    <h3><a href="/login" target="_blank">Dr. Camille Joy Flores</a></h3>
                    <p>General Practitioner</p>
                </div>
            </div>
        </section>

        <!-- Google Map Section -->
        <section>
            <h2 class="section-title">Our Location</h2>
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3852.918556256544!2d120.77823577493318!3d15.052620385489051!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3396f96081a42089%3A0x8d2eb009dcb8c947!2sSan%20Luis%20District%20Hospital!5e0!3m2!1sen!2sph!4v1731113710673!5m2!1sen!2sph" allowfullscreen loading="lazy"></iframe>
            </div>
        </section>
    </div>

    <!-- Footer Section -->
    <div class="footer">
        <p>&copy; 2024 JMC Hospital Systems. All Rights Reserved.</p>
        <p>Contact Us: <a href="mailto:contact@jmchospital.com">contact@jmchospital.com</a></p>
    </div>
</body>
</html>
