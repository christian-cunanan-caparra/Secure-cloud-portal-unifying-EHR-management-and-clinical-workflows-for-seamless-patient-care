<?php 
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'patients'; // Your users table
    protected $primaryKey = 'id'; // Primary key field
    protected $returnType = 'array'; // Return type
}
