<?php

namespace App\Controllers;

use App\Models\AppointmentModel;
use App\Models\MedicalRecordModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $patient_id = session()->get('patient_id');
        $appointmentModel = new AppointmentModel();
        $medicalRecordModel = new MedicalRecordModel();

        $appointments = $appointmentModel->getAppointmentsByPatient($patient_id);
        
     

        $medicalRecords = $medicalRecordModel->getRecordsByPatient($patient_id);

        return view('dashboard', [
            'appointments' => $appointments,
            'medicalRecords' => $medicalRecords
        ]);
    }

    public function bookAppointment()
    {


        
        return view('book_appointment');
    }

    public function processAppointment()
{
    $patient_id = session()->get('patient_id');
    $doctor_id = $this->request->getPost('doctor_id'); // Captures doctor_id
    $appointment_date = $this->request->getPost('appointment_date');

    $appointmentModel = new AppointmentModel();

    $appointmentModel->createAppointment([
        'patient_id' => $patient_id,
        'doctor_id' => $doctor_id,
        'appointment_date' => $appointment_date,
    ]);

    return redirect()->to('/dashboard');
}
     public function appointments()
    {
        $appointmentModel = new AppointmentModel();
        $data['app'] = $appointmentModel->getAppointmentsWithPatientName(); // Use the new method here
        return view('appointments', $data);
    }
    

}
