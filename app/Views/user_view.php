<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
     <!-- need -->
     <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DASHBOARD</title>
</head>
<body>




<!-- //startsidebar -->


<aside class="sidebar">
    <div class="sidebar-header">
      
      <h2>HOSPITAL <BR>MANAGEMENT<BR> SYSTEM</h2>
    </div>
    <ul class="sidebar-links">
      <h4>
        <span>Main Menu</span>
        <div class="menu-separator"></div>
      </h4>
      <li>
        <a href="/users">
          <span class="material-symbols-outlined"> dashboard </span>Dashboard</a>
      </li>
      <!-- <li>
        <a href="#"><span class="material-symbols-outlined"> overview </span>Overview</a>
      </li>
      <li>
        <a href="#"><span class="material-symbols-outlined"> monitoring </span>Analytic</a>
      </li> -->
      <h4>
        <span>Doctors</span>
        <div class="menu-separator"></div>
      </h4>
      <!-- <li>
        <a href="#"><span class="material-symbols-outlined"> folder </span>Projects</a>
      </li> -->
      <li>
        <a href="#"><span class="material-symbols-outlined"> groups </span>Doctors</a>
      </li>
      <li>
        <a href="#"><span class="material-symbols-outlined"> move_up </span>Specializations</a>
      </li>
      <!-- <li>
        <a href="#"><span class="material-symbols-outlined"> move_up </span>Appointments</a>
      </li>
      <li>
        <a href="#"><span class="material-symbols-outlined"> flag </span>All Reports</a>
      </li>
      <li>
        <a href="#"><span class="material-symbols-outlined">
            notifications_active </span>Notifications</a>
      </li> -->
      <h4>
        <span>Patients</span>
        <div class="menu-separator"></div>
      </h4>
      <li>
        <a href="/patient"><span class="material-symbols-outlined"> account_circle </span>Patients</a>
      </li>
      <li>
        <a href="/appointment"><span class="material-symbols-outlined"> note </span>Appointments</a>
      </li>
      <li>
        <a href="#"><span class="material-symbols-outlined"> info </span>status</a>
      </li>
    </ul>
    <div class="user-account">
      <div class="user-profile">
        <!-- <img src="images/profile-img.jpg" alt="Profile Image" /> -->
        <div class="user-detail">
          <h3>CHRISTIAN CAPARRA</h3>
          <!-- <span>Web Developer</span> -->
        </div>
      </div>
    </div>
  </aside>

<!-- //end -->












<div class="myDiv">
    <br>
    <h1>Total Patients: <?= esc($userCount) ?></h1>


    <!-- <h5>PA KISS MUNA</h5> -->
</div>








    <div class="content">
   
   </div>

   <br><br><br>   <br><br><br>   <br><br><br>   <br><br><br><br><BR></BR><br><br><br><br><br><br> <br><br><br><br><BR></BR><br><br><br> <br><br><br><br><BR></BR><br><br><br>
   <footer class="footer">
       <p>© BSIT 3A CHRISTIAN CAPARRA</p>
   </footer>

   
<style>






@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;

  
  font-family: "Poppins", sans-serif;
}


h5{
  font-size: 200px;
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
  width: 70px;
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

















/* footer{

background-color:BLUE;
}
 */














</style>

</body>
</html>
