<?php
namespace App\Controller;

use App\Controller\AppController;

class LecturerSubjectsController extends AppController
{
    public function index()
    {
        $lecturerId = $this->request->getSession()->read('Auth.id');

        // Load Subjects table
        $subjectsTable = $this->getTableLocator()->get('Subjects');

        $subjects = $subjectsTable->find()
            ->where(['Subjects.lecturer_id' => $lecturerId])
            ->contain(['Class'])
            ->all(); // fetch all rows

        $this->set(compact('subjects'));
    }

    public function view($id = null)
    {
        $lecturerId = $this->request->getSession()->read('Auth.id');
        $subjectsTable = $this->getTableLocator()->get('Subjects');

        $subject = $subjectsTable->get($id, ['contain' => ['Class']]);

        if ($subject->lecturer_id != $lecturerId) {
            $this->Flash->error('Unauthorized access.');
            return $this->redirect(['action' => 'index']);
        }

        $this->set(compact('subject'));
    }
}
