<?php

namespace App\Controllers;

use App\Models\MedicalRecordModel;
use CodeIgniter\Controller;

class MedicalRecordController extends Controller
{
    public function index()
    {
        // Load the MedicalRecordModel
        $model = new MedicalRecordModel();
        
        // Get the logged-in patient's ID from the session

        // Fetch medical records for the logged-in patient
        $data['medicalRecords'] = $model->getMedicalRecordsWithPatientName();
        // Pass the medical records to the view
        return view('medicalrecord', $data);
       
    }

    // Download method for the file (if applicable)
    public function download($id)
    {
        $model = new MedicalRecordModel();
        $record = $model->find($id);

        if ($record && !empty($record['file'])) {
            $filePath = WRITEPATH . 'uploads/' . $record['file'];  // Assuming the file is in the 'writable/uploads' directory
            return $this->response->download($filePath, null);
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("File not found");
        }
    }
}
