<?php

namespace App\Controllers;

use App\Models\DoctorModel;
use App\Models\AppointmentModel;
use CodeIgniter\Controller;

class DoctorController extends Controller
{
    public function loginView()
    {
        return view('doctor/loginn');
    }

    public function login()
    {
        $session = session();
        $doctorModel = new DoctorModel();
        // Sanitize email and password inputs
        $email = filter_var($this->request->getPost('email'), FILTER_SANITIZE_EMAIL);
        $password = $this->request->getPost('password');

        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()->with('error', 'Invalid email format.');
        }

        $doctor = $doctorModel->where('email', $email)->first();

        if ($doctor) {
            if (password_verify($password, $doctor['password'])) {
                // Regenerate session ID to prevent session fixation
                session_regenerate_id(true);

                $session->set([
                    'doctor_id' => $doctor['id'],
                    'doctor_email' => $doctor['email'],
                    'isLoggedIn' => true,
                ]);
                return redirect()->to('/doctordashboard');
            } else {
                return redirect()->back()->with('error', 'Invalid login credentials.');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid login credentials.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/loginn');
    }

    public function dashboard()
    {
        $session = session();
    
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/loginn');
        }
    
        session_regenerate_id(true); // Regenerate session ID
    
        $doctorId = $session->get('doctor_id');
        $doctorModel = new \App\Models\DoctorModel();
    
        // Fetch the doctor's details
        $doctor = $doctorModel->find($doctorId);
    
        // Fetch appointments for the doctor with patient names
        $db = \Config\Database::connect();
        $builder = $db->table('appointments');
        $builder->select('appointments.id, patients.name as patient_name, appointments.appointment_date, appointments.status');
        $builder->join('patients', 'patients.id = appointments.patient_id');
        $builder->where('appointments.doctor_id', $doctorId);
        $appointments = $builder->get()->getResultArray();
    
        return view('doctordashboard', [
            'doctor' => $doctor,
            'appointments' => $appointments,
        ]);
    }
    

    public function registerView()
    {
        return view('doctor/registerr');
    }

    public function register()
    {
        $doctorModel = new DoctorModel();

        $name = $this->request->getPost('name');
        $email = filter_var($this->request->getPost('email'), FILTER_SANITIZE_EMAIL); // Sanitize email
        $password = $this->request->getPost('password');
        $phone = $this->request->getPost('phone');
        $specialization = $this->request->getPost('specialization');
        $address = $this->request->getPost('address');

        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()->with('error', 'Invalid email format.');
        }

        // Validate password strength
        if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
            return redirect()->back()->with('error', 'Password must be at least 8 characters long, contain at least one letter, one number, and one special character.');
        }

        // Check if email already exists
        if ($doctorModel->where('email', $email)->first()) {
            return redirect()->back()->with('error', 'Email is already registered.');
        }

        $data = [
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'phone' => $phone,
            'specialization' => $specialization,
            'address' => $address,
        ];

        if ($doctorModel->insert($data)) {
            return redirect()->to('/loginn')->with('success', 'Registration successful! You can now log in.');
        } else {
            return redirect()->back()->with('error', 'An error occurred during registration. Please try again.');
        }
    }

    // Secure Search Method for Doctor's Dashboard
    public function searchAppointments()
    {
        $session = session();
        $doctorId = $session->get('doctor_id');

        // Get the search term from GET request
        $searchTerm = $this->request->getGet('search');
        
        // Sanitize and validate the search term
        $searchTerm = filter_var($searchTerm, FILTER_SANITIZE_STRING);  // Remove harmful characters
        $searchTerm = htmlspecialchars($searchTerm, ENT_QUOTES, 'UTF-8'); // Prevent XSS
        
        // Validate the search term (only alphanumeric and spaces allowed)
        if (!preg_match('/^[a-zA-Z0-9 ]*$/', $searchTerm)) {
            return redirect()->back()->with('error', 'Invalid search term.');
        }

        // Fetch appointments based on search term
        $appointmentModel = new AppointmentModel();
        $appointments = $appointmentModel->where('doctor_id', $doctorId)
            ->like('patient_name', $searchTerm)
            ->orWhere('patient_id', $searchTerm)
            ->findAll();

        return view('doctordashboard', [
            'appointments' => $appointments
        ]);
    }
}
