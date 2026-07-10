<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Records</title>
</head>
<body>

<!-- Sidebar -->
<aside class="sidebar">
    <div class="sidebar-header">
        <h2>HOSPITAL <br> MANAGEMENT <br> SYSTEM</h2>
    </div>
    <ul class="sidebar-links">
        <h4><span>Doctors</span></h4>
        <li><a href="/doctors"><span class="material-symbols-outlined"> groups </span>Doctors</a></li>
        <h4><span>Patients</span></h4>
        <li><a href="/patient"><span class="material-symbols-outlined"> account_circle </span>Patients</a></li>
        <li><a href="/medical"><span class="material-symbols-outlined"> note </span>Medical Records</a></li>
    </ul>
</aside>

<!-- Main Content -->
<div class="main-content">
    <h1 class="text-primary">Medical Records</h1>
    <div class="myDiv">
        <br><br>

        <!-- Search Input -->
        <div class="input-group mb-3" style="width: 50%; margin: 0 auto;">
            <input type="text" id="searchInput" class="form-control" placeholder="Search by ID" aria-label="Search">
        </div>

        <!-- Table for Medical Records -->
        <table class="table table-info table-hover p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" style="width: 100%;">
            <thead>
                <tr>
                    
                <td>ID</td>
                <td>Patient ID</td>
                <td>Patient Name</td>

                    <td class="aba">Record Date</td>
                    <td class="aba">File</td>
                </tr>
            </thead>
            <tbody id="medicalRecordsTable">
                <?php if (!empty($medicalRecords)): ?>
                    <?php foreach ($medicalRecords as $record): ?>
                        <tr class="table-light">
                        <td><?= esc($record['id']); ?></td>
                       
                        <td><?= esc($record['patient_id']); ?></td>
 <td><?= esc($record['patient_name']); ?></td>


                            <td><?= esc($record['date']); ?></td>
                            <td>
                                <?php if (!empty($record['file'])): ?>
                                    <a href="<?= site_url('medical-records/download/' . $record['id']); ?>" class="btn-theme" target="_blank">Download</a>
                                <?php else: ?>
                                    No file available
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="2">No medical records found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Footer -->
<!-- <footer class="footer">
    <p>© 2024 Hospital Management System</p>
</footer> -->

<!-- Sidebar Styling -->
<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    body {
        display: flex;
        height: 100vh;
        background: #F0F4FF;
    }

    



.sidebar {
  position: fixed;
  top: 0;
  left: 0;
  height: 100%;
  width: 260px;
  display: flex;
  overflow-x: hidden;
  flex-direction: column;
  background: #161a2d;
  padding: 25px 20px;
  transition: all 0.4s ease;
}

/* .sidebar:hover {
  width: 260px;
} */

.sidebar .sidebar-header {
  display: flex;
  align-items: center;
}

.sidebar .sidebar-header img {
  width: 42px;
  border-radius: 50%;
}

.sidebar .sidebar-header h2 {
  color: #fff;
  font-size: 1.25rem;
  font-weight: 600;
  white-space: nowrap;
  margin-left: 23px;
}

.sidebar-links h4 {
  color: #fff;
  font-weight: 500;
  white-space: nowrap;
  margin: 10px 0;
  position: relative;
}

.sidebar-links h4 span {
  opacity: 1;
}



.sidebar-links .menu-separator {
  position: absolute;
  left: 0;
  top: 50%;
  width: 100%;
  height: 1px;
  transform: scaleX(1);
  transform: translateY(-50%);
  background: #4f52ba;
  transform-origin: right;
  transition-delay: 0.2s;
}

/* .sidebar:hover .sidebar-links .menu-separator {
  transition-delay: 0s;
  transform: scaleX(0);
} */

.sidebar-links {
  list-style: none;
  margin-top: 20px;
  height: 80%;
  overflow-y: auto;
  scrollbar-width: none;
}

.sidebar-links::-webkit-scrollbar {
  display: none;
}

.sidebar-links li a {
  display: flex;
  align-items: center;
  gap: 0 20px;
  color: #fff;
  font-weight: 500;
  white-space: nowrap;
  padding: 15px 10px;
  text-decoration: none;
  transition: 0.2s ease;
  
}

.sidebar-links li a:hover {
  color: #161a2d;
  background: #fff;
  border-radius: 4px;
}


    .main-content {
        margin-left: 270px;
        padding: 20px;
        flex-grow: 1;
    }

    .myDiv {
        text-align: center;
        margin-top: 30px;
        border-radius: 10px;
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 10px 5px;
        background-color: white;
        padding: 20px;
    }

    .table td {
        font-weight: bold;
    }

    .btn-theme {
        display: inline-block;
        padding: 10px 15px;
        color: white;
        background-color: #007bff;
        border: none;
        border-radius: 4px;
        font-size: 14px;
        text-align: center;
        cursor: pointer;
        text-decoration: none;
    }

    .btn-theme:hover {
        background-color: #0056b3;
    }

    footer {
        background-color: #007bff;
        color: white;
        text-align: center;
        padding: 10px;
        position: absolute;
        bottom: 0;
        width: 100%;
    }
</style>

<script>
    document.getElementById('searchInput').addEventListener('input', function() {
        const searchValue = this.value.toLowerCase();
        const rows = document.querySelectorAll('#medicalRecordsTable tr');

        rows.forEach(row => {
            const date = row.children[0].textContent.toLowerCase();
            if (date.includes(searchValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>

</body>
</html>
