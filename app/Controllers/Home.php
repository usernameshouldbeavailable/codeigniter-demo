<?php

namespace App\Controllers;
use Ap\Models\EmailModel;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }
    public function checkemail()
    {
        helper(['form', 'url']);

        if (! $this->validate(['email' => 'required|valid_email|is_unique[testEmail.email]'])) {
            echo view('checkEmail', [
                'validation' => $this->validator,
            ]);
        } else {
            echo view('successPageEmail');
        }
    }
    function addNewEmail()
    {
        $emailModel = new \App\Models\EmailModel();

        $newEmail = rand(1,100) . '@outlook.com';

        $emailModel->insert([
            'email' => $newEmail
        ]);
    }

    function getEmails()
    {
        $emailModel = new \App\Models\EmailModel();
        $data['emails'] = $emailModel->findAll();
        return view('viewEmails', $data);
    }
    function checkIndividualEmail($id)
    {
        $emailModel = new \App\Models\EmailModel();
        $data['emails'] = $emailModel->where('id', $id)->find();
        return view('viewEmails', $data);
    }
}
