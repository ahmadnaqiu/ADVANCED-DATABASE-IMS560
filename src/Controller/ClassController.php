<?php
declare(strict_types=1);

namespace App\Controller;

class ClassController extends AppController
{
    public function index()
    {
        // Include both Lecturers and Subjects
        $query = $this->Class->find()
            ->contain(['Lecturers', 'Subjects']);
        $class = $this->paginate($query);

        $this->set(compact('class'));
    }

    public function view($id = null)
    {
        $class = $this->Class->get($id, [
            'contain' => ['Lecturers', 'Subjects']
        ]);
        $this->set(compact('class'));
    }

    public function add()
    {
        $class = $this->Class->newEmptyEntity();
        if ($this->request->is('post')) {
            $class = $this->Class->patchEntity($class, $this->request->getData());
            if ($this->Class->save($class)) {
                $this->Flash->success(__('The class has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The class could not be saved. Please, try again.'));
        }

        $lecturers = $this->Class->Lecturers->find('list', limit: 200)->all();
        $subjects = $this->Class->Subjects->find('list', limit: 200)->all(); // optional for multi-select

        $this->set(compact('class', 'lecturers', 'subjects'));
    }

    public function edit($id = null)
    {
        $class = $this->Class->get($id, ['contain' => ['Subjects']]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $class = $this->Class->patchEntity($class, $this->request->getData());
            if ($this->Class->save($class)) {
                $this->Flash->success(__('The class has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The class could not be updated. Please, try again.'));
        }

        $lecturers = $this->Class->Lecturers->find('list', limit: 200)->all();
        $subjects = $this->Class->Subjects->find('list', limit: 200)->all(); // optional

        $this->set(compact('class', 'lecturers', 'subjects'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $class = $this->Class->get($id);
        if ($this->Class->delete($class)) {
            $this->Flash->success(__('The class has been deleted.'));
        } else {
            $this->Flash->error(__('The class could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}

