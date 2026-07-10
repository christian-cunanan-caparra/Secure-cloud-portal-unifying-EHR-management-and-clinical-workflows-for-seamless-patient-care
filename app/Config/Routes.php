<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Router\RouteCollection;

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 * This file lets you set up your routes for the application. You can
 * also specify route filters that can be applied to all routes globally.
 */
$routes = Services::routes();

// Default route
$routes->get('/', 'AdminAuth::logins');

// Authentication Routes
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::processLogin');





$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::processRegister');

// Dashboard Routes
$routes->get('/dashboard', 'Dashboard::index');

// Appointment Routes
$routes->get('/book-appointment', 'Dashboard::bookAppointment');
$routes->post('/book-appointment', 'Dashboard::processAppointment');

// Optional: Logout route
$routes->get('/logout', 'Auth::logout');


// $routes->get('/doctor/dashboard', 'Doctor::dashboard');


// $routes->get('/doctor/login', 'DoctorAuth::login');  // Route to show the doctor login form
// $routes->post('/doctor/process-login', 'DoctorAuth::processLogin');  // Route to handle the login process
// $routes->get('/doctor/dashboard', 'Doctor::dashboard');  // Route to doctor dashboard (after login)
// $routes->get('/doctor/logout', 'DoctorAuth::logout');  // Route for logging out

// Route to show the registration form (GET request)
// $routes->get('/doctor/register', 'Doctor::register');

// Route to handle registration form submission (POST request)
// $routes->post('/doctor/register', 'Doctor::processRegister');

// $routes->get('/doctor/register', 'Doctor::register');
// $routes->post('/doctor/register', 'Doctor::processRegister');
// $routes->get('/doctor/dashboard', 'Doctor::dashboard');

// $routes->get('/appointment/book', 'Appointment::book');
// $routes->post('/appointment/request', 'Appointment::request');

// $routes->get('/doctor/login', 'Auth::doctorLogin');
// $routes->post('/auth/processDoctorLogin', 'Auth::processDoctorLogin');
// $routes->get('/doctor/register', 'Auth::doctorRegister');
// $routes->post('/auth/processDoctorRegister', 'Auth::processDoctorRegister');







$routes->get('/login', 'Auth::login');  // Route for the login page
$routes->post('/processLogin', 'Auth::processLogin');  // Route to handle login submission

$routes->get('/register', 'Auth::register');  // Route for the registration page
$routes->post('/processRegister', 'Auth::processRegister');  // Route to handle registration submission




$routes->get('/logins', 'AdminAuth::login');                   // Route for the login page
$routes->post('/process-logins', 'AdminAuth::processLogin');   // Route for processing login

$routes->get('/register', 'AdminAuth::register');             // Route for the registration page
$routes->post('/process-register', 'AdminAuth::processRegister'); // Route for processing registration

$routes->get('/logout', 'AdminAuth::logout');                 // Route for logout

$routes->get('/admin-dashboard', 'AdminAuth::dashboard');     // Route for the admin dashboard







// For doctor login and registration
// $routes->get('/doctor/login', 'Auth::doctorLogin');
// $routes->post('/doctor/processLogin', 'Auth::processDoctorLogin');

// $routes->get('/doctor/register', 'Auth::doctorRegister');
// $routes->post('/doctor/processRegister', 'Auth::processDoctorRegister');

// $routes->get('/logout', 'Auth::logout');


$routes->get('/dashboard', 'DashboardController::patientDashboard'); // Patient dashboard route
// $routes->get('/doctor/dashboard', 'DashboardController::doctorDashboard'); // Doctor dashboard route
$routes->get('/logout', 'AuthController::logout'); // General logout for patients
// $routes->get('/doctor/logout', 'AuthController::doctorLogout'); // Specific logout for doctors
$routes->get('/login', 'Auth::login');
$routes->post('/processLogin', 'Auth::processLogin');
$routes->get('/register', 'Auth::register');
$routes->post('/processRegister', 'Auth::processRegister');
$routes->get('/logout', 'Auth::logout');

$routes->get('/dashboard', 'Auth::dashboard');
// $routes->get('/doctor/dashboard', 'Auth::doctorDashboard');
// $routes->get('/doctor/login', 'Auth::login'); // Reuse the login view for doctors

// $routes->get('/doctor/dashboard', 'DoctorController::dashboard');
// $routes->get('/doctor/viewAppointment/(:num)', 'DoctorController::viewAppointment/$1');
// $routes->post('/doctor/updateAppointmentStatus/(:num)', 'DoctorController::updateAppointmentStatus/$1');


// $routes->get('/doctor/login', 'DoctorAuth::login');
// $routes->post('/doctor/login', 'DoctorAuth::processLogin'); 
// $routes->get('/doctor/logout', 'DoctorAuth::logout');
// $routes->get('/doctor/dashboard', 'DoctorAuth::dashboard');



$routes->get('/ehospital-systems', 'Pages::ehospital');


$routes->get('/contact-us', 'Contact::index');



$routes->get('users', 'UserController::index');



//patient crud

$routes->get('/patient', 'Patient::patientMgt');
$routes->get('/editPatient/(:any)', to: 'Patient::editPatient/$1');
$routes->post('/updatePatient', 'Patient::updatePatient');

//doctor crud

$routes->get('/doctors', 'Doctor::doctorMgt');
$routes->get('/editDoctor/(:any)', 'Doctor::editDoctor/$1');
$routes->post('/updateDoctor', 'Doctor::updateDoctor');
$routes->get('/deleteDoctor/(:any)', 'Doctor::deleteDoctor/$1');
$routes->get('/addDoctor', 'Doctor::addDoctor');
$routes->post('/storeDoctor', 'Doctor::storeDoctor');




$routes->get('/appointment', 'Appointments::appointments');


$routes->get('/appointments/updateStatus/(:num)/(:alpha)', 'Appointments::updateStatus/$1/$2');


$routes->get('/loginn', 'DoctorController::loginView');
$routes->post('/doctor/loginn', 'DoctorController::login');
$routes->get('/doctordashboard', 'DoctorController::dashboard');
$routes->get('/doctor/logout', 'DoctorController::logout');

$routes->get('/registerr', 'DoctorController::registerView'); // Display the registration form
$routes->post('/registerr', 'DoctorController::register');    // Handle registration submission
  

    $routes->get('/verify', 'Auth::verify');
    $routes->post('/processVerification', 'Auth::processVerification');

    $routes->get('medical', 'MedicalRecordController::index');
    $routes->get('medical-records/download/(:num)', 'MedicalRecordController::download/$1');

    

//inputt here




$routes->get('/forgot-password', 'Auth::forgotPassword');
$routes->post('/forgot-password', 'Auth::processForgotPassword');
$routes->get('/verify-reset-code', 'Auth::verifyResetCode');
$routes->post('/verify-reset-code', 'Auth::processResetCode');
$routes->get('/reset-password', 'Auth::resetPassword');
$routes->post('/reset-password', 'Auth::processResetPassword');


$routes->get('/reset-password', 'Auth::resetPassword');  // Show the reset password form
$routes->post('/process-reset-password', 'Auth::processResetPassword');  // Handle the password reset








//ended


$routes->get('/medical-records/(:num)', 'MedicalRecords::index/$1');
$routes->get('/medical-records/create', 'MedicalRecords::create');
$routes->post('/medical-records/store', 'MedicalRecords::store');

$routes->get('/medical-records/download/(:num)', 'MedicalRecords::download/$1');
$routes->get('/medical-records/(:num)', 'MedicalRecordController::view/$1');
$routes->group('medical-records', ['filter' => 'doctorauth'], function($routes) {
    $routes->get('(:num)', 'MedicalRecordController::view/$1');

    

    
});
