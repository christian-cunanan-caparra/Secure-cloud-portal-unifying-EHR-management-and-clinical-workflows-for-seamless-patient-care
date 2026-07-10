<?php
namespace App\Models;
use CodeIgniter\Model;

class PatientLists extends Model
{
    protected $table = 'patients';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id',
        'name',
        'email',
        'password',
        'phone',
        'address'
        
        
    ];
    // public function deleteUser($id) {
    //     return $this->delete($id); // Use the delete method
    // }



    


}

?>