<?php
declare(strict_types=1);

namespace App\Controller;

class SubjectsController extends AppController
{
    public function index()
    {
        $query = $this->Subjects->find()
            ->contain(['Lecturers', 'Class']); // Singular Class
        $subjects = $this->paginate($query);

        $this->set(compact('subjects'));
    }

    public function view($id = null)
    {
        $subject = $this->Subjects->get($id, [
            'contain' => ['Lecturers', 'Class']
        ]);
        $this->set(compact('subject'));
    }

    public function add()
    {
        $subject = $this->Subjects->newEmptyEntity();
        if ($this->request->is('post')) {
            $subject = $this->Subjects->patchEntity($subject, $this->request->getData());
            if ($this->Subjects->save($subject)) {
                $this->Flash->success(__('The subject has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The subject could not be saved. Please, try again.'));
            debug($subject->getErrors()); // <-- show validation errors
        }

        $lecturers = $this->Subjects->Lecturers->find('list', ['limit' => 200])->all();
        $classes = $this->Subjects->Class->find('list', ['limit' => 200])->all(); // Singular Class
        $this->set(compact('subject', 'lecturers', 'classes'));
    }

    public function edit($id = null)
    {
        $subject = $this->Subjects->get($id, ['contain' => []]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $subject = $this->Subjects->patchEntity($subject, $this->request->getData());
            if ($this->Subjects->save($subject)) {
                $this->Flash->success(__('The subject has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The subject could not be saved. Please, try again.'));
            debug($subject->getErrors()); // <-- show validation errors
        }

        $lecturers = $this->Subjects->Lecturers->find('list', ['limit' => 200])->all();
        $classes = $this->Subjects->Class->find('list', ['limit' => 200])->all();
        $this->set(compact('subject', 'lecturers', 'classes'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $subject = $this->Subjects->get($id);
        if ($this->Subjects->delete($subject)) {
            $this->Flash->success(__('The subject has been deleted.'));
        } else {
            $this->Flash->error(__('The subject could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
