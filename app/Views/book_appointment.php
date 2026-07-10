<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment - Hospital Management</title>
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
        .container {
            max-width: 500px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }
        /* Form styling */
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            font-size: 14px;
            color: #666;
            margin-bottom: 5px;
        }
        select,
        input[type="datetime-local"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 20px;
            font-size: 16px;
        }
        select:focus,
        input[type="datetime-local"]:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }
        /* Button styling */
        button {
            padding: 12px;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
        /* Responsive styling */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <div class="header">
        <h1>Book an Appointment</h1>
        <p>Schedule your visit with the doctor</p>
    </div>

    <!-- Appointment Form -->
    <div class="container">
        <h2>Book an Appointment</h2>
        <form action="<?= base_url('book-appointment') ?>" method="POST">
            <div class="form-group">
                <label for="doctor_id">Select Doctor</label>
                <select name="doctor_id" id="doctor_id" required>
                    <option value="" disabled selected>Select a doctor</option>
                    <option value="5">test - ARfggggg</option>
                    <option value="6">Christian Caparra - DogStyle</option>
                    <option value="7">Adrian Macabali - 69 position</option>
                    <option value="8">Jhuniel Galang  - ALBULARYO</option>
                </select>
            </div>

            <div class="form-group">
                <label for="appointment_date">Appointment Date</label>
                <input type="datetime-local" name="appointment_date" id="appointment_date" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Book Appointment</button>
        </form>
    </div>
</body>
</html>

