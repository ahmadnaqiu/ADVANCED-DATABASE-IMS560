<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Attendance Controller
 *
 * @property \App\Model\Table\AttendanceTable $Attendance
 */
class AttendanceController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Attendance->find()
            ->contain(['Students', 'Lecturers', 'Subjects']);
        $attendance = $this->paginate($query);

        $this->set(compact('attendance'));
    }

    /**
     * View method
     *
     * @param string|null $id Attendance id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $attendance = $this->Attendance->get($id, contain: ['Students', 'Lecturers', 'Subjects']);
        $this->set(compact('attendance'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $attendance = $this->Attendance->newEmptyEntity();
        if ($this->request->is('post')) {
            $attendance = $this->Attendance->patchEntity($attendance, $this->request->getData());
            if ($this->Attendance->save($attendance)) {
                $this->Flash->success(__('The attendance has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The attendance could not be saved. Please, try again.'));
        }
        $students = $this->Attendance->Students->find('list', limit: 200)->all();
        $lecturers = $this->Attendance->Lecturers->find('list', limit: 200)->all();
        $subjects = $this->Attendance->Subjects->find('list', limit: 200)->all();
        $this->set(compact('attendance', 'students', 'lecturers', 'subjects'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Attendance id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $attendance = $this->Attendance->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $attendance = $this->Attendance->patchEntity($attendance, $this->request->getData());
            if ($this->Attendance->save($attendance)) {
                $this->Flash->success(__('The attendance has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The attendance could not be saved. Please, try again.'));
        }
        $students = $this->Attendance->Students->find('list', limit: 200)->all();
        $lecturers = $this->Attendance->Lecturers->find('list', limit: 200)->all();
        $subjects = $this->Attendance->Subjects->find('list', limit: 200)->all();
        $this->set(compact('attendance', 'students', 'lecturers', 'subjects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Attendance id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $attendance = $this->Attendance->get($id);
        if ($this->Attendance->delete($attendance)) {
            $this->Flash->success(__('The attendance has been deleted.'));
        } else {
            $this->Flash->error(__('The attendance could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    //Attendance
    
    public function mark()
{
    $this->request->allowMethod(['post']);
    $this->autoRender = false;

    $data = $this->request->getData();

    $attendance = $this->Attendance->find()
        ->where([
            'subject_id' => $data['subject_id'],
            'student_id' => $data['student_id']
        ])
        ->first();

    if (!$attendance) {
        $attendance = $this->Attendance->newEmptyEntity();
    }

    $attendance = $this->Attendance->patchEntity($attendance, [
        'subject_id' => $data['subject_id'],
        'lecturer_id' => $data['lecturer_id'],
        'student_id' => $data['student_id'],
        'status' => $data['status']
        
    ]);

}
}
