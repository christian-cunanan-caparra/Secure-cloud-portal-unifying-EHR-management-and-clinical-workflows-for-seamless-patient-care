<?php

namespace App\Controllers;

use App\Models\PatientLists;



class Patient extends BaseController
{
    public function patientMgt()
    {
        $p=new PatientLists();
    
        $data['ptnt'] = $p  ->findAll();


        

        return view('patient_mgt', $data);
    }






    public function editPatient($id=null){
        $p=new PatientLists();
        $data['p']=$p->where('id', $id)->first();
        return view('edit_patient', $data);

    }
    public function updatePatient(){
        $id=$this->request->getVar('id');
        $name=$this->request->getVar('name');
        $email=$this->request->getVar('email');
        $password=$this->request->getVar('password');
        $phone=$this->request->getVar('phone');
        $address=$this->request->getVar('address');

        $pl=new PatientLists();
        // Array
        $data=[
            'name'=>$name,
            'email'=>$email,    
            'password'=>$password,
            'phone'=>$phone,
            'address'=>$address
           
            
            
            

        ];
            $pl->set($data)->where('id',$id)->update();
            // $this->response->redirect(site_url('/user'));
            return redirect()->to('/patient');
        
    }






    
// public function deleteUser($id) {
//     $pls = new PatientLists();
//     $deleted = $pls->deletePatient($id);
//     return redirect()->to('/patient');

    
// }



// public function insert(){
//     return view ('insert');
// }

// public function actioninsert(){
   
//     $id=$this->request->getVar('userID');
//     $Fname=$this->request->getVar('Fname');
//     $Lname=$this->request->getVar('Lname');
//     $Mname=$this->request->getVar('Mname');
//     $Bdate=$this->request->getVar('Bdate');
//     $Gender=$this->request->getVar('Gender');
//     $Address=$this->request->getVar('Address');
//     $ContactNo=$this->request->getVar('ContactNo');
//     $Email=$this->request->getVar('Email');
//     $Username=$this->request->getVar('Username');
//     $Password=$this->request->getVar('Password');
//     $Role=$this->request->getVar('Role');   
//     $STATUS=$this->request->getVar('STATUS');   

//     $data2=[
//         'Fname'=>$Fname,
//         'Lname'=>$Lname,
//         'Mname'=>$Mname,
//         'Bdate'=>$Bdate,
//         'Gender'=>$Gender,
//         'Address'=>$Address,
//         'ContactNo'=>$ContactNo,
//         'Email'=>$Email,
//         'Username'=>$Username,
//         'Password'=>$Password,
//         'Role'=>$Role,
//         'STATUS'=>$STATUS

        
//     ];
//     $iii=new UserLists();
//     $iii->save($data2);

//     return redirect()->to('/user');

// }

// public function archiveMgt()
// {
//     $uu=new UserLists();

//     $data['usr'] = $uu->where('status', 0)->findAll();


    

//     return view('archive_Mgt', $data);
// }








}