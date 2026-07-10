<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors</title>
</head>
<body>


  <aside class="sidebar">
    <div class="sidebar-header">
      <h2>HOSPITAL <br>MANAGEMENT<br> SYSTEM</h2>
    </div>
    <ul class="sidebar-links">
      <h4>
        <span>Doctors</span>
        <div class="menu-separator"></div>
      </h4>
      <li>
        <a href="/doctors"><span class="material-symbols-outlined">groups</span>Doctors</a>
      </li>
      <h4>
        <span>Patients</span>
        <div class="menu-separator"></div>
      </h4>
      <li>
        <a href="/patient"><span class="material-symbols-outlined">account_circle</span>Patients</a>
      </li>
      <li>
        <a href="/medical"><span class="material-symbols-outlined">note</span>Medical Records</a>
      </li>
    </ul>
    <!-- <div class="user-account">
      <div class="user-profile">
        <div class="user-detail">
          <h3>ADMIN</h3>
        </div>
      </div>
    </div> -->
  </aside>

  <div class="myDiv">
    <br><br>
    <h1 class="text-primary">Doctors</h1>
    <br><br>

    <!-- Search Input -->
    <div class="input-group mb-3" style="width: 50%; margin: 0 auto;">
      <input type="text" id="searchInput" class="form-control" placeholder="Search by ID, Name, or Specialization" aria-label="Search">
    </div>

    <table class="table table-info table-hover p-3 text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3" style="width: 100%;">
      <thead>
        <tr>
          <td class="aba">ID</td>
          <td class="aba">NAME</td>
          <td class="aba">EMAIL</td>
          <td class="aba">PASSWORD</td>
          <td class="aba">PHONE</td>
          <td class="aba">SPECIALIZATION</td>
          <td class="aba">Address</td>
          <td class="aba">ACTIONS</td>
          <td></td>
          <!-- <td><a href="/archive/" class="backb">ARCHIVE</a></td> -->
        </tr>
      </thead>
      <tbody id="doctorsTable">
        <?php foreach($doctors as $doctor): ?>
        <tr class="table-light">
          <td><?= $doctor['id'] ?></td>
          <td><?= $doctor['name'] ?></td>
          <td><?= $doctor['email'] ?></td>
          <td><span class="password" id="password-<?= $doctor['password'] ?>">**********</span></td>
          <td><?= $doctor['phone'] ?></td>
          <td><?= $doctor['specialization'] ?></td>
          <td><?= $doctor['address'] ?></td>
          <td> <a href="/editDoctor/<?= $doctor['id'] ?>" class="btn-theme">Edit</a></td>

          <td>
   
    

            <!-- <a href="/editDoctor/<?= $doctor['id'] ?>" class="editb">EDIT</a> -->
            <!-- <a href="/deleteDoctor/<?= $doctor['id'] ?>" onclick="return confirm('Are you sure?')" class="delb">DELETE</a> -->
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

  <script>
    document.getElementById('searchInput').addEventListener('input', function() {
      const searchValue = this.value.toLowerCase();
      const rows = document.querySelectorAll('#doctorsTable tr');

      rows.forEach(row => {
        const id = row.children[0].textContent.toLowerCase();
        const name = row.children[1].textContent.toLowerCase();
        const specialization = row.children[5].textContent.toLowerCase();

        if (id.includes(searchValue) || name.includes(searchValue) || specialization.includes(searchValue)) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      });
    });
  </script>

<style>


@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;

  
  font-family: "Poppins", sans-serif;
}

body {
  min-height: 100vh;
  background: #F0F4FF;
}




html, body {
    height: 100%;
}

body {
    display: flex;
     /* font-family: "Lato", sans-serif; */
    flex-direction: column;
}

content {
    flex: 1; /* This allows the content to take up the available space */
    padding: 20px;
}

footer {
    background-color:blue;
    color: white;
    text-align: center;
    padding: 10px 0;
}













.backb{
    background-color: red;
    border-radius: 10px;
    border: 0px;
    color: white;
  padding: 5px;
  width: 80px;
    display: block;
    text-decoration: none;
    text-align: center;
    float: right;
    margin-right: 20px;
}


    .aba{
        font-weight: bold;
    }
    
   .editb {
    width: 50px;
  background-color: yellow;
  color: black;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
 border-radius: 10px;
padding: 5px;
}


.delb {
  background-color:red;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
 border-radius: 10px;
padding: 5px;
}


.addb {
    width: 80px;
  background-color:greenyellow;
  color: black;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
 border-radius: 10px;
padding: 5px;
width: 9s0px;


}




.myDiv {
  border: 5px  WHITE;
   
  text-align: center;
  margin-left: 300px;
 
  margin-right: 50px;
  margin-top: 30px;
  border-radius: 10px;
  box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 10px 5px;

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

.user-account {
  margin-top: auto;
  padding: 12px 10px;
  margin-left: -10px;
  background: #fff;
  border-radius: 4px;
}

.user-profile {
  display: flex;
  align-items: center;
  color: #161a2d;
}

.user-profile img {
  width: 42px;
  border-radius: 50%;
  border: 2px solid #fff;
}

.user-profile h3 {
  font-size: 1rem;
  font-weight: 600;
}

.user-profile span {
  font-size: 0.775rem;
  font-weight: 600;
}

.user-detail {
  margin-left: 23px;
  white-space: nowrap;
}

/* .sidebar:hover .user-account {
  background: #fff;
  border-radius: 4px;
} */


.btn-theme {
    display: inline-block;
    padding: 10px 15px;
    color: #fff;
    background-color: #007bff; /* Primary blue color */
    border: none;
    border-radius: 4px;
    font-size: 14px;
    text-align: center;
    cursor: pointer;
    text-decoration: none;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.btn-theme:hover {
    background-color: #0056b3; /* Darker blue on hover */
    transform: translateY(-2px);
}

.btn-theme:active {
    transform: translateY(0);
    background-color: #004085; /* Even darker blue on click */
}

.btn-cancel {
    background-color: #dc3545; /* Red for cancel */
}

.btn-cancel:hover {
    background-color: #a71d2a;
}

.btn-pending {
    background-color: #ffc107; /* Yellow for pending */
    color: #212529; /* Dark text for contrast */
}

.btn-pending:hover {
    background-color: #e0a800;
}

.btn-confirm {
    background-color: #28a745; /* Green for confirm */
}

.btn-confirm:hover {
    background-color: #1e7e34;
}















/* footer{

background-color:BLUE;
}
 */














</style>
</body>
</html>
