<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
</head>
<body>
    <div class="container">
        <h2>Book an Appointment</h2>

        <form action="/appointment/request" method="post">
            <?= csrf_field(); ?>

            <label for="doctor_id">Doctor ID:</label>
            <input type="text" name="doctor_id" id="doctor_id" required>

            <label for="patient_name">Your Name:</label>
            <input type="text" name="patient_name" id="patient_name" required>

            <label for="appointment_date">Appointment Date:</label>
            <input type="datetime-local" name="appointment_date" id="appointment_date" required>

            <button type="submit">Request Appointment</button>
        </form>
    </div>
</body>
</html>
