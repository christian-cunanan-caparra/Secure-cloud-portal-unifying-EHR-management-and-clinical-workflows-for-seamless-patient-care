<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Records</title>
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
        <li><a href="#" id="medicalRecordsLink"><span class="material-symbols-outlined">calendar_today</span> Medical Records</a></li>
        <li><a href="/medical-records/create"><span class="material-symbols-outlined">file_upload</span> Add Medical Records</a></li>
        <li><a href="/loginn"><span class="material-symbols-outlined">exit_to_app</span> Logout</a></li>
    </ul>
</aside>

<!-- Main Content -->
<div class="content">
    <div class="myDiv">
        <h1>Medical Records</h1>

        <!-- Search for Patient ID -->
        <div class="mb-4">
            <div class="input-group">
                <input type="text" class="form-control" id="patientSearch" placeholder="Enter Patient ID" onkeydown="handleKeyDown(event)">
                <button class="btn btn-primary" type="button" onclick="filterRecords()">Search</button>
            </div>
        </div>

        <!-- Patient ID Display -->
        <p id="patientIdDisplay">Patient ID: Not searched yet</p>

        <!-- Success Message -->
        <?php if (session()->getFlashdata('success')): ?>
            <p style="color: green;"><?= esc(session()->getFlashdata('success')) ?></p>
        <?php endif; ?>

        <!-- Medical Records List -->
        <ul id="recordsList">
            <?php if (!empty($records) && is_array($records)): ?>
                <?php foreach ($records as $record): ?>
                    <li data-patient-id="<?= esc($record['patient_id']) ?>">
                        Date: <?= esc($record['date']) ?> |
                        <a href="<?= site_url('medical-records/download/' . $record['id']) ?>" class="btn-theme">Download</a>
                    </li>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No records found.</p>
            <?php endif; ?>
        </ul>

        <!-- Add Medical Record Link -->
        <a href="<?= base_url('/medical-records/create') ?>" class="btn-theme">Add Medical Record</a>
    </div>
</div>

<script>
    // JavaScript for handling the Enter key press and filtering
    function handleKeyDown(event) {
        if (event.key === "Enter") {  // When Enter is pressed
            filterRecords();
        }
    }

    function filterRecords() {
        var searchValue = document.getElementById('patientSearch').value;
        var patientIdDisplay = document.getElementById('patientIdDisplay');
        var recordsList = document.getElementById('recordsList');
        var records = recordsList.getElementsByTagName('li');
        
        patientIdDisplay.textContent = 'Patient ID: ' + searchValue;

        // Update the URL dynamically
        var medicalRecordsLink = document.getElementById('medicalRecordsLink');
        var newUrl = '/medical-records/' + searchValue;
        medicalRecordsLink.setAttribute('href', newUrl);  // Update the Medical Records link in the sidebar
        history.pushState({}, '', newUrl);  // Update the browser URL

        // Filter the records
        for (var i = 0; i < records.length; i++) {
            var record = records[i];
            var patientId = record.getAttribute('data-patient-id');
            if (patientId.includes(searchValue)) {
                record.style.display = ''; // Show matching record
            } else {
                record.style.display = 'none'; // Hide non-matching record
            }
        }
    }
</script>

</body>
</html>
