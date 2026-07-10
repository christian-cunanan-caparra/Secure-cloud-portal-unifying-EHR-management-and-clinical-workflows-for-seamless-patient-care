<?php

namespace App\Controllers;

use App\Models\DoctorModel;

class Doctor extends BaseController
{
    protected $doctorModel;

    public function __construct()
    {
        $this->doctorModel = new DoctorModel();
    }

    // Show all doctors
    public function doctorMgt()
    {
        $data['doctors'] = $this->doctorModel->where('status', 1)->findAll();

        return view('doctor_mgt', $data);
    }

    // Show edit form for a specific doctor
    public function editDoctor($id)
    {
        $data['doctor'] = $this->doctorModel->find($id);
        return view('edit_doctor', $data); // Create an edit_doctor.php view for this
    }

    // Update doctor details
    public function updateDoctor()
    {
        $this->doctorModel->save([
            'id' => $this->request->getPost('id'),
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'phone' => $this->request->getPost('phone'),
            'specialization' => $this->request->getPost('specialization'),
            'address' => $this->request->getPost('address'),
            'status' => $this->request->getPost('status'),

        ]);

        return redirect()->to('/doctors')->with('success', 'Doctor updated successfully.');
    }

    // Delete a doctor
    public function deleteDoctor($id)
    {
        $this->doctorModel->delete($id);
        return redirect()->to('/doctors')->with('success', 'Doctor deleted successfully.');
    }

    // Show the form to add a new doctor
    public function addDoctor()
    {
        return view('add_doctor'); // Create an add_doctor.php view for this
    }

    // Store new doctor data
    public function storeDoctor()
    {
        $this->doctorModel->insert([
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'phone' => $this->request->getPost('phone'),
            'specialization' => $this->request->getPost('specialization'),
            'address' => $this->request->getPost('address'),
            'status' => $this->request->getPost('status'),

        ]);

        return redirect()->to('/doctors')->with('success', 'Doctor added successfully.');
    }
}
