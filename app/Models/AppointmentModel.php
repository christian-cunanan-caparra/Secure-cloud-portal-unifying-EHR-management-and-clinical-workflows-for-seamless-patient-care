<?php

namespace App\Models;

use CodeIgniter\Model;

class AppointmentModel extends Model
{
    protected $table = 'appointments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['patient_id', 'doctor_id', 'appointment_date', 'status'];
    protected $useTimestamps = true;

    // Fetch all appointments for a specific patient

    

    public function getAppointmentsWithPatientName()
    {
        return $this->select('appointments.*, patients.name AS patient_name')
                    ->join('patients', 'patients.id = appointments.patient_id')
                    ->findAll();
    }
    

    public function getAppointmentsByPatient($patient_id)
    {
        return $this->where('patient_id', $patient_id)->findAll();
    }

    public function getAppointmentsByDoctor($doctor_id)
    {
        return $this->where('patient_id', $doctor_id)->findAll();
    }

    // Create a new appointment
    public function createAppointment($data)
    {
        return $this->insert($data);
    }

    // Fetch an appointment with patient's email
    public function getAppointmentWithPatientEmail($appointmentId)
    {
        return $this->select('appointments.*, patients.email AS patient_email')
                    ->join('patients', 'patients.id = appointments.patient_id')
                    ->where('appointments.id', $appointmentId)
                    ->first();
    }


    







    
}












