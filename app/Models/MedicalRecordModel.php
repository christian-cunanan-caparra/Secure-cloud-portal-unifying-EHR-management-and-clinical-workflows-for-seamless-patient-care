<?php

namespace App\Models;

use CodeIgniter\Model;

class MedicalRecordModel extends Model
{
    protected $table = 'medical_records';
    protected $primaryKey = 'id';
    protected $allowedFields = ['patient_id', 'date', 'file'];
    protected $useTimestamps = true;

    public function getMedicalRecordsWithPatientName()
    {
        return $this->select('medical_records.id, medical_records.patient_id, medical_records.date, medical_records.file, patients.name as patient_name')
                    ->join('patients', 'patients.id = medical_records.patient_id', 'left')
                    ->findAll();
    }
    public function getRecordsByPatient($patient_id)
    {
        return $this->where('patient_id', $patient_id)->findAll();
    }

    public function createRecord($data)
    {
        return $this->insert($data);
    }
}
