<?php
namespace App\Models;
use CodeIgniter\Model;

class AppointmentLists extends Model
{
    protected $table = 'appointments';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'patient_id',
        'doctor_name',
        'appointment_date',
        'status'
        
        
        
    ];
    // public function deleteUser($id) {
    //     return $this->delete($id); // Use the delete method
    // }



    


}

?>