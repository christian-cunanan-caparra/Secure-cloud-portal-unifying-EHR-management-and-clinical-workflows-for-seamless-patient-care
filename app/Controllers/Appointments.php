<?php

namespace App\Controllers;

use App\Models\AppointmentModel;
use CodeIgniter\Email\Email;
use App\Models\DoctorModel;

class Appointments extends BaseController
{



    public function bookAppointment()
    {
        $doctorModel = new DoctorModel();
        $doctors = $doctorModel->findAll();
    
        dd($doctors); // Debug output
        return view('auth/book_appointments', ['doctors' => $doctors]);
    }
    

    
    public function appointments()
    {
        $appointmentModel = new AppointmentModel();
        $data['app'] = $appointmentModel->getAppointmentsWithPatientName(); // Use the new method here
        return view('doctordashboard', $data);
    }
    

    public function updateStatus($id, $status)
    {
        $appointmentModel = new AppointmentModel();

        // Update the status of the appointment
        $appointmentModel->update($id, ['status' => $status]);

        // Fetch the appointment details along with the patient email
        $appointment = $appointmentModel->getAppointmentWithPatientEmail($id);

        if ($appointment) {
            $patientEmail = $appointment['patient_email'];
            
            // Load the email library and set up configuration
            $email = \Config\Services::email();

            // Email details
            $email->setTo($patientEmail);
            $email->setFrom('caparrachristian47@gmail.com', 'Hospital Management System');
            $email->setSubject('Appointment Status Updated');
            $email->setMessage("Dear Patient,\n\nYour appointment status has been updated to: $status.\n\nThank you,\nHospital Management System");

            // Send email and check for success
            if ($email->send()) {
                return redirect()->to('/doctordashboard')->with('status', 'Appointment updated and email sent successfully');
            } else {
                // Log or show email errors
                $data = $email->printDebugger(['headers']);
                return redirect()->to('/doctordashboard')->with('status', 'Appointment updated but email could not be sent');
            }
        }

        return redirect()->to('/doctordashboard')->with('status', 'Appointment updated, but patient email could not be found');
    }
}
