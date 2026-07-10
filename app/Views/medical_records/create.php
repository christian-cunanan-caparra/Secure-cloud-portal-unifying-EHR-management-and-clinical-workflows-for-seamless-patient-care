<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Medical Record</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
        /* Custom styles */
        body {
            font-family: 'Poppins', sans-serif;
            background: #f0f4ff;
            display: flex;
            flex-direction: row;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 260px;
            background: #161a2d;
            padding: 25px 20px;
            color: #fff;
        }
        .sidebar h2 {
            font-size: 1.5rem;
            margin-bottom: 30px;
        }
        .sidebar .sidebar-links {
            list-style: none;
            padding-left: 0;
        }
        .sidebar .sidebar-links li {
            margin: 15px 0;
        }
        .sidebar .sidebar-links a {
            color: #fff;
            text-decoration: none;
            font-size: 1rem;
            padding: 10px;
            display: block;
            transition: 0.3s;
        }
        .sidebar .sidebar-links a:hover {
            background: #4f52ba;
            border-radius: 5px;
        }
        .content {
            padding: 20px;
            width: 100%;
        }
        .content h1 {
            color: #161a2d;
        }
        .myDiv {
            margin-left: 300px;
            padding: 20px;
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 10px 5px;
            background: white;
            border-radius: 10px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .btn-theme {
            padding: 5px 10px;
            background-color: #4f52ba;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
        }
        .btn-theme:hover {
            background-color: #3b4199;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<aside class="sidebar">
    <h2>HOSPITAL MANAGEMENT SYSTEM</h2>
    <ul class="sidebar-links">
        <li><a href="/doctordashboard"><span class="material-symbols-outlined">calendar_today</span> Appointments</a></li>
        <li><a href="/medical-records/0"><span class="material-symbols-outlined">calendar_today</span> Medical Records</a></li>

        <li><a href="/medical-records/create"><span class="material-symbols-outlined">file_upload</span> Add Medical Record</a></li>
        <li><a href="/loginn"><span class="material-symbols-outlined">exit_to_app</span> Logout</a></li>
    </ul>
</aside>

<!-- Main Content -->
<div class="content">
    <div class="myDiv">
        <h1>Add Medical Record</h1>

        <!-- Add Medical Record Form -->
        <form action="/medical-records/store" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="form-group">
                <label for="patient_id">Patient ID:</label>
                <input type="text" name="patient_id" id="patient_id" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="file">Upload File (Word):</label>
                <input type="file" name="file" id="file" class="form-control" accept=".doc,.docx" required>
            </div>

            <button type="submit" class="btn-theme">Save</button>
        </form>
    </div>
</div>

</body>
</html>
