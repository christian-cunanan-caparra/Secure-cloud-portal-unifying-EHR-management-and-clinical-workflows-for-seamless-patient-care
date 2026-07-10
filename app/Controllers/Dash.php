<?php

namespace App\Controllers;

use App\Models\AppointmentModel;
use App\Models\PatientModel;

class Dash extends BaseController
{
    public function index()
    {
        $appointmentModel = new AppointmentModel();
        $patientModel = new PatientModel();

        // Fetch the counts
        $data['appointmentCount'] = $appointmentModel->countAllResults();
        $data['patientCount'] = $patientModel->countAllResults();

        // Load the dashboard view
        return view('user_view', ['data' => $data]);
        
    }
}
