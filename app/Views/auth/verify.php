<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify - Hospital Management</title>
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
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
            font-size: 16px;
        }
        input[type="text"]:focus {
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
        /* Flash Messages */
        .alert {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 15px;
            font-size: 14px;
            text-align: left;
        }
        .alert-success {
            color: #388e3c;
            background-color: #e8f5e9;
            border: 1px solid #388e3c;
        }
        .alert-danger {
            color: #f44336;
            background-color: #ffebee;
            border: 1px solid #f44336;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Verify Your Email</h2>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error'); ?></div>
        <?php endif; ?>

        <form action="/processVerification" method="post">
            <?= csrf_field(); ?>

            <label for="verification_code">Enter Verification Code:</label>
            <input type="text" name="verification_code" id="verification_code" placeholder="Enter the code sent to your email" required>

            <button type="submit">Verify</button>
        </form>
    </div>
</body>
</html>
