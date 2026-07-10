<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Contact extends Controller
{
    public function index()
    {
        return view('contact_us');
    }

    public function submit()
    {
        // Load the form helper and email library
        helper(['form']);
        $email = \Config\Services::email();
    
        // Define validation rules
        $rules = [
            'name'    => 'required|min_length[3]|max_length[50]',
            'email'   => 'required|valid_email',
            'message' => 'required|min_length[10]',
        ];
    
        if ($this->validate($rules)) {
            // Collect form data
            $name = $this->request->getPost('name');
            $emailAddress = $this->request->getPost('email');
            $message = $this->request->getPost('message');
    
            // Configure email settings
            $email->setFrom($emailAddress, $name);
            $email->setTo('caparrachristian47@gmail.com.com'); // Set recipient's email
            $email->setSubject('New Contact Message');
            
            // Email message
            $email->setMessage("
                Name: $name\n
                Email: $emailAddress\n
                Message: $message
            ");
    
            // Attempt to send the email
            if ($email->send()) {
                // Redirect with success message if email is sent
                return redirect()->to('/contact-us')->with('message', 'Thank you for contacting us! We will get back to you soon.');
            } else {
                // Redirect with error message if email fails
                return redirect()->to('/contact-us')->with('error', 'Sorry, there was an error sending your message. Please try again later.');
            }
        } else {
            // Redirect with validation errors if validation fails
            return redirect()->to('/contact-us')->with('errors', $this->validator->getErrors());
        }
    }
    
}
