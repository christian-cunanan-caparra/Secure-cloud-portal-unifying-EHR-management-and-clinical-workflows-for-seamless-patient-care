<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Hospital Management</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <style>
        /* Base styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .header {
            padding: 30px 20px;
            background-color: #007bff;
            color: white;
            text-align: center;
            margin-bottom: 30px;
        }
        .main-content {
            padding: 30px 20px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .section-title {
            font-size: 28px;
            color: #333;
            margin-bottom: 15px;
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fafafa;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #f1f1f1;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Link styling */
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 25px;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            font-size: 16px;
        }
        a:hover {
            background-color: #0056b3;
        }

        /* Logout button styling */
        .logout-btn {
            margin-top: 20px;
            padding: 12px 25px;
            color: #fff;
            background-color: #dc3545; /* Red color for logout */
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            font-size: 16px;
        }
        .logout-btn:hover {
            background-color: #c82333;
        }

        /* Map button styling */
        .map-button {
            display: inline-block;
            margin-top: 30px;
            padding: 12px 25px;
            color: #fff;
            background-color: #28a745; /* Green color for map button */
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            font-size: 16px;
        }
        .map-button:hover {
            background-color: #218838;
        }

        /* Map container styling */
       /* Map container styling */
.map-container {
    display: none;
    margin-top: 20px;
    width: 100%; /* Set to full width */
    height: 450px; /* Adjust the height as per requirement */
    border-radius: 8px;
    overflow: hidden;
}


        /* Footer Styles */
        .footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 50px;
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

        /* Responsive styling */
        @media (max-width: 768px) {
            .main-content {
                padding: 20px;
            }
            .doctor-card {
                flex: 1 1 100%;
            }
            .map-container {
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <div class="header">
        <h1>Hospital Management Dashboard</h1>
        <p>Welcome to your personalized hospital management portal</p>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <?php if (!session()->has('logged_in') || session()->get('user_type') !== 'patient'): ?>
            <p>You do not have access to this page. Please log in as a patient.</p>
            <a href="/login">Go to Login</a>
        <?php else: ?>
            <!-- User Info Section -->
            <section>
                <h2 class="section-title">Welcome, <?= esc(session()->get('name')); ?>!</h2>
                <p>Email: <?= esc(session()->get('email')); ?></p>
                <p>Name: <?= esc(session()->get('name')); ?></p>
                <p>Contact: <?= esc(session()->get('contact')); ?></p>
            </section>

            <!-- Appointments Section -->
            <section>
                <h2 class="section-title">Your Appointments</h2>
                <table>
                    <tr>
                        <th>Doctor</th>
                        <th>Appointment Date</th>
                        <th>Status</th>
                    </tr>
                    <?php foreach ($appointments as $appointment): ?>
                        <tr>
                            <td><?= esc($appointment['doctor_id']); ?></td>
                            <td><?= esc($appointment['appointment_date']); ?></td>
                            <td><?= esc($appointment['status']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </section>

            <!-- Medical Records Section -->
            <section>
                <h2 class="section-title">Your Medical Records</h2>
                <?php if (!empty($medicalRecords) && is_array($medicalRecords)): ?>
                    <table>
                        <tr>
                            <th>Record Date</th>
                            <th>File</th>
                        </tr>
                        <?php foreach ($medicalRecords as $record): ?>
                            <tr>
                                <td><?= esc($record['date']); ?></td>
                                <td>
                                    <a href="<?= site_url('medical-records/download/' . $record['id']); ?>" target="_blank">Download</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php else: ?>
                    <p>No medical records found.</p>
                <?php endif; ?>
            </section>

            <!-- Book Appointment and Logout -->
            <section>
                <a href="/book-appointment">Book a New Appointment</a>
                <br>
               
            </section>

            <!-- Map Section -->
           <!-- Map Section -->
<section>
    <button class="map-button" onclick="toggleMap()">Show Map</button>
    <div class="map-container" id="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3852.918556256544!2d120.77823577493318!3d15.052620385489051!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3396f96081a42089%3A0x8d2eb009dcb8c947!2sSan%20Luis%20District%20Hospital!5e0!3m2!1sen!2sph!4v1731113710673!5m2!1sen!2sph" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</section>
 <a href="/logout" class="logout-btn">Logout</a>
        <?php endif; ?>
    </div>

    <!-- Footer Section -->
    <div class="footer">
        <p>&copy; 2024 Hospital Management Systems. All Rights Reserved.</p>
        <!-- <p>Contact Us: <a href="mailto:contact@hospital.com">contact@hospital.com</a></p> -->
    </div>

    <script>
        // JavaScript function to toggle map visibility
        function toggleMap() {
            const mapContainer = document.getElementById('map');
            const mapButton = document.querySelector('.map-button');
            if (mapContainer.style.display === 'none' || mapContainer.style.display === '') {
                mapContainer.style.display = 'block';
                mapButton.textContent = 'Hide Map';
            } else {
                mapContainer.style.display = 'none';
                mapButton.textContent = 'Show Map';
            }
        }
    </script>
</body>
</html>
