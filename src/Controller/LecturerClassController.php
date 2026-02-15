<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\ORM\TableRegistry;

class LecturerClassController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Flash'); // Keep Flash messages
        // No loadModel(), use TableLocator when needed
    }

    // List all classes for the logged-in lecturer
    public function index()
    {
        $lecturerId = $this->request->getSession()->read('Auth.id');

        // Load Class table using TableLocator
        $classTable = $this->getTableLocator()->get('Class');

        // Get all classes for this lecturer with Subjects
        $classes = $classTable->find()
            ->where(['Class.lecturer_id' => $lecturerId])
            ->contain(['Subjects'])
            ->all(); 
        $this->set(compact('classes'));
    }

    // View a single class
    public function view($id = null)
    {
        $lecturerId = $this->request->getSession()->read('Auth.id');

        $classTable = $this->getTableLocator()->get('Class');
        $class = $classTable->get($id, ['contain' => ['Subjects']]);

        if ($class->lecturer_id != $lecturerId) {
            $this->Flash->error('Unauthorized access.');
            return $this->redirect(['action' => 'index']);
        }

        $this->set(compact('class'));
    }

    // Edit a class
    public function edit($id = null)
    {
        $lecturerId = $this->request->getSession()->read('Auth.id');

        $classTable = $this->getTableLocator()->get('Class');
        $class = $classTable->get($id, ['contain' => ['Subjects']]);

        if ($class->lecturer_id != $lecturerId) {
            $this->Flash->error('Unauthorized.');
            return $this->redirect(['action' => 'index']);
        }

        if ($this->request->is(['patch', 'post', 'put'])) {
            $class = $classTable->patchEntity($class, $this->request->getData());
            if ($classTable->save($class)) {
                $this->Flash->success('Class updated.');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Update failed.');
        }

        // Load Subject
        $subjectsTable = $this->getTableLocator()->get('Subjects');
        $subjects = $subjectsTable->find('list')->all();

        $this->set(compact('class', 'subjects'));
    }
}
