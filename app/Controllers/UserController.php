<?php 
namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $userCount = $userModel->countAll();

        return view('user_view', ['userCount' => $userCount]);
    }
}
