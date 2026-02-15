<?php
namespace App\Controller;

use App\Controller\AppController;

class UsersController extends AppController
{
    protected $Lecturers;
    protected $Students;

    public function initialize(): void
    {
        parent::initialize();

        $this->Lecturers = $this->getTableLocator()->get('Lecturers');
        $this->Students = $this->getTableLocator()->get('Students');

        $this->loadComponent('Flash');
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $email = trim($this->request->getData('email'));
            $password = trim($this->request->getData('password'));

            if (!$email || !$password) {
                $this->Flash->error('Email and password are required');
                return;
            }

            // ===== Lecturer Role =====
            $lecturer = $this->Lecturers
                ->find()
                ->where(['TRIM(email) = ' => $email])
                ->first();

            if ($lecturer && trim($lecturer->password) === $password) {
                $this->request->getSession()->write('Auth', [
                    'role' => 'lecturer',
                    'id' => $lecturer->lecturer_id,
                    'name' => $lecturer->name,
                    'email' => $lecturer->email
                ]);

                return $this->redirect(['controller' => 'Dashboard', 'action' => 'Dashboard']);
            }

            // ===== Student Role =====
            $student = $this->Students
                ->find()
                ->where(['TRIM(email) = ' => $email])
                ->first();

            if ($student && trim($student->password) === $password) {
                $this->request->getSession()->write('Auth', [
                    'role' => 'student',
                    'id' => $student->student_id,
                    'name' => $student->name,
                    'email' => $student->email
                ]);

                // Go to student profile
                return $this->redirect(['controller' => 'Dashboard', 'action' => 'studentDashboard']);
            }

            $this->Flash->error('Invalid email or password');
        }
    }

    public function logout()
    {
        $this->request->getSession()->delete('Auth');
        $this->Flash->success('You have been logged out.');
        return $this->redirect(['action' => 'login']);
    }
}
