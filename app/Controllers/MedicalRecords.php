<?php

namespace App\Controllers;

use App\Models\MedicalRecordModel;

class MedicalRecords extends BaseController
{
    protected $medicalRecordModel;

    public function __construct()
    {
        $this->medicalRecordModel = new MedicalRecordModel();
    }

    public function index($patient_id)
    {
        // Fetch records matching the patient ID
        $records = $this->medicalRecordModel->where('patient_id', $patient_id)->findAll();

        return view('medical_records/index', [
            'records' => $records,
            'patient_id' => $patient_id
        ]);
    }

    public function create()
    {
        return view('medical_records/create');
    }

    public function store()
    {
        $file = $this->request->getFile('file');

        if ($file->isValid() && !$file->hasMoved()) {
            $filename = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads', $filename);

            $this->medicalRecordModel->save([
                'patient_id' => $this->request->getPost('patient_id'),
                'date' => $this->request->getPost('date'),
                'file' => $filename,
            ]);

            return redirect()->to('/medical-records/' . $this->request->getPost('patient_id'))->with('success', 'Medical record uploaded.');
        }

        return redirect()->back()->with('error', 'Failed to upload file.');
    }

    public function download($id)
    {
        // Fetch the record by ID
        $record = $this->medicalRecordModel->find($id);

        if (!$record) {
            return redirect()->back()->with('error', 'File not found.');
        }

        // File path
        $filePath = WRITEPATH . 'uploads/' . $record['file'];

        if (!file_exists($filePath)) {
            return redirect()->back()->with('error', 'File not found in storage.');
        }

        // Serve the file for download
        return $this->response->download($filePath, null);
    }


    public function view($patientId)
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/loginn');
        }

        $doctorId = $session->get('doctor_id');

        // Check if the patient belongs to the logged-in doctor
        $medicalRecordModel = new MedicalRecordModel();
        $record = $medicalRecordModel->where('patient_id', $patientId)->first();

        if (!$record) {
            return redirect()->back()->with('error', 'Medical record not found.');
        }

        // Check if the patient belongs to the current doctor
        if ($record['doctor_id'] !== $doctorId) {
            return redirect()->back()->with('error', 'You are not authorized to view this medical record.');
        }

        return view('medical_record/view', ['record' => $record]);
    }








    
}
