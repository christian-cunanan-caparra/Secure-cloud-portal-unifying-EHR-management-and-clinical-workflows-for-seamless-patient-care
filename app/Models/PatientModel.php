<?php

namespace App\Models;

use CodeIgniter\Model;

class PatientModel extends Model
{
    protected $table      = 'patients';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'password', 'phone', 'address'];
    protected $useTimestamps = true;

    public function getPatientByEmail($email)
    {
        return $this->where('email', $email)->first();
    }

    public function createPatient($data)
    {
        return $this->insert($data);
    }
}
