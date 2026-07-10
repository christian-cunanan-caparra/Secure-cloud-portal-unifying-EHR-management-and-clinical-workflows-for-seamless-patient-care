<?php

namespace App\Controllers;

use App\Models\PatientModel;
use CodeIgniter\Controller;

class Auth extends Controller
{
    public function login()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function processLogin()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $patientModel = new \App\Models\PatientModel();
        $patient = $patientModel->getPatientByEmail($email);

        if ($patient && password_verify($password, $patient['password'])) {
            session()->set([
                'patient_id' => $patient['id'],
                'name' => $patient['name'],
                'email' => $patient['email'],
                'contact' => $patient['phone'],
                'logged_in' => true,
                'user_type' => 'patient'
            ]);

            return redirect()->to('/dashboard');
        } else {
            session()->setFlashdata('error', 'Incorrect email or password.');
            return redirect()->to('/login');
        }
    }

    public function processRegister()
    {
        $email = $this->request->getPost('email');
        $model = new PatientModel();
    
        // Check if the email already exists in the database
        if ($model->where('email', $email)->first()) {
            return redirect()->back()->with('error', 'This email is already associated with an existing account. Please use a different email.');
        }
    
        // Generate a random verification code (could be alphanumeric or numeric)
        $verificationCode = rand(100000, 999999); // Example: 6-digit random number
    
        // Prepare the registration data to be stored in the session
        $registrationData = [
            'name'     => $this->request->getPost('name'),
            'email'    => $email,
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'phone'    => $this->request->getPost('phone'),
            'address'  => $this->request->getPost('address'),
        ];
    
        // Store the verification code and registration data in the session
        session()->set('verification_code', $verificationCode);
        session()->set('registration_data', $registrationData);
    
        // Send the verification email with the code
        $this->sendVerificationEmail($email, $verificationCode);
    
        // Return a view or redirect to the verify page
        return redirect()->to('/verify')->with('success', 'A verification code has been sent to your email address.');
    }
    



    private function sendVerificationEmail($email, $verificationCode)
    {
        $emailService = \Config\Services::email();
    
        $emailService->setFrom('youremail@example.com', 'Hospital Management System');
        $emailService->setTo($email);
        $emailService->setSubject('Registration Verification Code');
        $emailService->setMessage("
            <h3>Hello!</h3>
            <p>Thank you for registering. Please use the following verification code to complete your registration:</p>
            <h2>$verificationCode</h2>
            <p>If you did not request this, please ignore this email.</p>
            <p>Best regards,<br>Hospital Management System</p>
        ");
    
        if (!$emailService->send()) {
            log_message('error', 'Failed to send email: ' . $emailService->printDebugger(['headers']));
        }
    }
    
    







    public function verify()
    {
       
        return view('auth/verify');
    }
    
    
    public function processVerification()
    {
        $enteredCode = $this->request->getPost('verification_code');
        $storedCode = session()->get('verification_code');

        if ($enteredCode == $storedCode) {
            // Proceed with registration completion
            $model = new PatientModel();
            $data = session()->get('registration_data');

            if ($model->createPatient($data)) {
                session()->setFlashdata('success', 'Registration completed successfully!');
                return redirect()->to('/login');
            } else {
                session()->setFlashdata('error', 'Registration failed');
                return redirect()->back();
            }
        } else {
            session()->setFlashdata('error', 'Invalid verification code');
            return redirect()->back();
        }
    
    }
    










    private function sendConfirmationEmail($email, $name)
    {
        $emailService = \Config\Services::email();

        $emailService->setFrom('caparrachristian47@gmail.com', 'Hospital Management System');
        $emailService->setTo($email);
        $emailService->setSubject('Registration Confirmation');
        $emailService->setMessage("
            <h3>Hello, $name!</h3>
            <p>Thank you for registering with our Hospital Management System. Your registration is complete.</p>
            <p>If you have any questions, feel free to reach out to our support team.</p>
            <p>Best regards,<br>Hospital Management System</p>
        ");

        if (!$emailService->send()) {
            log_message('error', 'Failed to send email: ' . $emailService->printDebugger(['headers']));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    public function dashboard()
{
    if (!session()->has('logged_in') || session()->get('user_type') !== 'patient') {
        return redirect()->to('/login');
    }

    $appointmentModel = new \App\Models\AppointmentModel();
    $appointments = $appointmentModel->getAppointmentsByPatient(session()->get('patient_id'));

    $medicalRecordModel = new \App\Models\MedicalRecordModel();
    $medicalRecords = $medicalRecordModel->getRecordsByPatient(session()->get('patient_id'));

    return view('dashboard', [
        'appointments' => $appointments,
        'medicalRecords' => $medicalRecords
    ]);
}


public function forgotPassword()
{
    return view('auth/forgot_password');
}



public function processForgotPassword()
{
    $email = $this->request->getPost('email');
    $patientModel = new \App\Models\PatientModel();
    $patient = $patientModel->getPatientByEmail($email);

    if ($patient) {
        // Generate a random verification code
        $resetCode = rand(100000, 999999);
        
        // Store the reset code in the session for validation later
        session()->set('reset_code', $resetCode);
        session()->set('email', $email);

        // Send the reset code to the user's email
        $this->sendResetEmail($email, $resetCode);

        return redirect()->to('/verify-reset-code');
    } else {
        session()->setFlashdata('error', 'No account found with this email address.');
        return redirect()->to('/forgot-password');
    }
}

private function sendResetEmail($email, $resetCode)
{
    $emailService = \Config\Services::email();

    $emailService->setFrom('youremail@example.com', 'Hospital Management System');
    $emailService->setTo($email);
    $emailService->setSubject('Password Reset Code');
    $emailService->setMessage("
        <h3>Hello!</h3>
        <p>To reset your password, please use the following code:</p>
        <h2>$resetCode</h2>
        <p>If you did not request this, please ignore this email.</p>
        <p>Best regards,<br>Hospital Management System</p>
    ");

    if (!$emailService->send()) {
        log_message('error', 'Failed to send email: ' . $emailService->printDebugger(['headers']));
    }
}
 


public function verifyResetCode()
{
    return view('auth/verify_reset_code');
}

public function processResetCode()
{
    $enteredCode = $this->request->getPost('reset_code');
    $storedCode = session()->get('reset_code');

    if ($enteredCode == $storedCode) {
        // Allow the user to reset their password
        return redirect()->to('/reset-password');
    } else {
        session()->setFlashdata('error', 'Invalid reset code.');
        return redirect()->back();
    }
}


public function resetPassword()
{
    return view('auth/reset_password');
}

public function processResetPassword()
{
    $newPassword = $this->request->getPost('password');
    $email = session()->get('email');

    // Update the password in the database
    $patientModel = new \App\Models\PatientModel();
    $patient = $patientModel->getPatientByEmail($email);

    if ($patient) {
        // Hash the new password
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

        // Update the password
        $patientModel->update($patient['id'], ['password' => $hashedPassword]);

        session()->setFlashdata('success', 'Your password has been successfully reset.');
        return redirect()->to('/login');
    } else {
        session()->setFlashdata('error', 'Error resetting password.');
        return redirect()->to('/reset-password');
    }
}






}


