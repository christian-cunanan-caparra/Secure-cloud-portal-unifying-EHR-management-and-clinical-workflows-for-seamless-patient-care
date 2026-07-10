<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Hospital Management</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <style>
        /* Base Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #e0f7fa;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .container {
            max-width: 400px;
            width: 100%;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        h2 {
            font-size: 24px;
            color: #007bff;
            margin-bottom: 20px;
        }
        /* Form Styling */
        form {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        label {
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
            font-size: 16px;
            resize: vertical;
        }
        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus,
        textarea:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
        }
        /* Button Styling */
        button {
            width: 100%;
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
        /* Success and Error Messages */
        .alert {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            font-size: 14px;
            text-align: left;
            margin-bottom: 15px;
        }
        .alert-success {
            color: #4CAF50;
            background-color: #E8F5E9;
            border: 1px solid #4CAF50;
        }
        .alert-danger {
            color: #f44336;
            background-color: #ffebee;
            border: 1px solid #f44336;
        }
        /* Link Styling */
        p {
            margin-top: 20px;
            font-size: 14px;
            color: #333;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Hospital Management Registration</h2>
        
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
        <?php endif; ?>
        
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error'); ?></div>
        <?php endif; ?>

        <form action="/register" method="post">
            <?= csrf_field(); ?>

            <label for="name">Full Name:</label>
            <input type="text" name="name" id="name" placeholder="Enter your full name" required>
            
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>
            
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" placeholder="Create a password" required>
            
            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone" placeholder="Enter your phone number">
            
            <label for="address">Address:</label>
            <textarea name="address" id="address" placeholder="Enter your address"></textarea>

            <button type="submit">Register</button>
        </form>
        
        <p>Already have an account? <a href="/login">Login here</a></p>
    </div>
</body>
</html>
