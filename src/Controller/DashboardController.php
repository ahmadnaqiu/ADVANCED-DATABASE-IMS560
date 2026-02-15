<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\EventInterface;
use Cake\I18n\FrozenDate;

class DashboardController extends AppController
{
 public function beforeFilter(EventInterface $event)
{
    parent::beforeFilter($event);

    $session = $this->request->getSession();

    if (!$session->check('Auth')) {
        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }



    $user = $session->read('Auth');

    // Lecturer >> Lecturer Dashboard
    if ($user['role'] === 'lecturer' && $this->getRequest()->getParam('action') !== 'index') {
        return $this->redirect(['controller' => 'Dashboard', 'action' => 'index']);
    }

    // Student >> StudentDashboard
    if ($user['role'] === 'student' && $this->getRequest()->getParam('action') !== 'studentDashboard') {
        return $this->redirect(['controller' => 'Dashboard', 'action' => 'studentDashboard']);
    }
}

    // Lecturer Dashboard Function
    public function index()
    {
        $user = $this->request->getSession()->read('Auth');
        $this->set('user', $user);

        //lecturer profile
        
    }

    // StudeDashboard function
    public function studentDashboard()
    {
        $session = $this->request->getSession();
        $user = $session->read('Auth');

        // Student profile
        $studentsTable = $this->getTableLocator()->get('Students');
        $studentProfile = $studentsTable->get($user['id']);

        // Student Subject
        $subjectsTable = $this->getTableLocator()->get('Subjects');
        
        $subjectsQuery = $subjectsTable->find()
            ->contain(['Lecturers', 'Class']);

        if (!empty($studentProfile->class_id)) {
            $subjectsQuery->where(['Subjects.class_id' => $studentProfile->class_id]);
        }

        $subjects = $subjectsQuery->all();

        // Load attendance 
        $attendanceTable = $this->getTableLocator()->get('Attendance');
        $today = FrozenDate::now()->toDateString();
        $todayAttendance = $attendanceTable->find()
            ->where([
                'student_id' => $user['id'],
                'DATE(date)' => $today
            ])
            ->all();

        $this->set([
            'user' => $user,
            'studentProfile' => $studentProfile,
            'subjects' => $subjects,
            'todayAttendance' => $todayAttendance
        ]);
    }
}
