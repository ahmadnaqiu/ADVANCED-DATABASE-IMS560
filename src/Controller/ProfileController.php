<?php
namespace App\Controller;

use App\Controller\AppController;

class ProfileController extends AppController
{
    public function index()
    {
        $session = $this->request->getSession();
        $user = $session->read('Auth');

        // from Students table
        $studentsTable = $this->getTableLocator()->get('Students');
        $profile = $studentsTable->get($user['id']);

        $this->set(compact('profile'));
    }
}
