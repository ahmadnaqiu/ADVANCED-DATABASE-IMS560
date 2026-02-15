<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Auth\DefaultPasswordHasher;


/**
 * Lecturers Controller
 *
 * @property \App\Model\Table\LecturersTable $Lecturers
 */
class LecturersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Lecturers->find();
        $lecturers = $this->paginate($query);

        $this->set(compact('lecturers'));
    }

    // Login Function
   public function login()
{
    if ($this->request->is('post')) {

        $email = $this->request->getData('email');

        $lecturer = $this->Lecturers->find()
            ->where(['email' => $email])
            ->first();

        if ($lecturer) {

            $this->request->getSession()->write('Lecturer', [
                'lecturer_id' => $lecturer->lecturer_id,
                'name' => $lecturer->name,
                'email' => $lecturer->email
            ]);

            return $this->redirect([
                'controller' => 'Dashboard',
                'action' => 'index'
            ]);
        }

        $this->Flash->error('Email not found');
    }
}



    /**
     * View method
     *
     * @param string|null $id Lecturer id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lecturer = $this->Lecturers->get($id, contain: []);
        $this->set(compact('lecturer'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $lecturer = $this->Lecturers->newEmptyEntity();
        if ($this->request->is('post')) {
            $lecturer = $this->Lecturers->patchEntity($lecturer, $this->request->getData());
            if ($this->Lecturers->save($lecturer)) {
                $this->Flash->success(__('The lecturer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lecturer could not be saved. Please, try again.'));
        }
        $this->set(compact('lecturer'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Lecturer id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lecturer = $this->Lecturers->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lecturer = $this->Lecturers->patchEntity($lecturer, $this->request->getData());
            if ($this->Lecturers->save($lecturer)) {
                $this->Flash->success(__('The lecturer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The lecturer could not be saved. Please, try again.'));
        }
        $this->set(compact('lecturer'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Lecturer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lecturer = $this->Lecturers->get($id);
        if ($this->Lecturers->delete($lecturer)) {
            $this->Flash->success(__('The lecturer has been deleted.'));
        } else {
            $this->Flash->error(__('The lecturer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    //For attendance
    public function dashboard($subjectId)
{
    $attendance = $this->Attendance->find()
        ->where([
            'subject_id' => $subjectId,
            'lecturer_id' => $this->Auth->user('id')
        ])
        ->contain(['Students'])
        ->all();

    $this->set(compact('attendance'));
}

}
