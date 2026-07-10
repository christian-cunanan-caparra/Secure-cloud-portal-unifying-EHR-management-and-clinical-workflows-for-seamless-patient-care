<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Patient</title>
</head>
<body>
<aside class="sidebar">
    <div class="sidebar-header">
        <h2>HOSPITAL<br>MANAGEMENT<br>SYSTEM</h2>
    </div>
    <ul class="sidebar-links">
        <h4>
            <span>Doctors</span>
            <div class="menu-separator"></div>
        </h4>
        <li><a href="/doctors"><span class="material-symbols-outlined">groups</span>Doctors</a></li>
        <h4>
            <span>Patients</span>
            <div class="menu-separator"></div>
        </h4>
        <li><a href="/patient"><span class="material-symbols-outlined">account_circle</span>Patients</a></li>
        <li><a href="/medicalrecord"><span class="material-symbols-outlined">note</span>Medical Records</a></li>
    </ul>
    <div class="user-account">
        <div class="user-profile">
            <div class="user-detail">
                <h3>ADMIN</h3>
            </div>
        </div>
    </div>
</aside>

<div class="container myDiv">
    <h1 class="text-primary text-center">EDIT PATIENT</h1>
    <form action="<?= base_url('/updatePatient') ?>" method="post" class="row g-3 p-4">
        <input type="hidden" name="id" value="<?= $p['id'] ?>">
        <div class="col-md-6">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="<?= $p['name'] ?>" required>
        </div>
        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="<?= $p['email'] ?>" required>
        </div>
        <div class="col-md-6">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" value="<?= $p['password'] ?>" required>
        </div>
        <div class="col-md-6">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" id="phone" name="phone" class="form-control" value="<?= $p['phone'] ?>" required>
        </div>
        <div class="col-md-6">
            <label for="address" class="form-label">Address</label>
            <input type="text" id="address" name="address" class="form-control" value="<?= $p['address'] ?>" required>
        </div>
        
        <div class="col-12 text-center">
        <BR></BR>
        <BR></BR>
       
            <button type="submit" class="btn btn-primary btn-update" onclick="showAlert()">Update Patient</button>
        </div>
    </form>
</div>

<script>
    function showAlert() {
        alert("Successfully Updated");
    }
</script>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        height: 100vh;
        background-color: #f8f9fa;
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

    .myDiv {
        margin-left: 300px;
        margin-top: 50px;
        border-radius: 10px;
        background-color: white;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .btn-update {
        background-color: #007bff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
    }

    .btn-update:hover {
        background-color: #0056b3;
    }
</style>
</body>
</html>
