<?php

class ExaminationsController extends AppController {

	public $uses = array('SchoolType', 'School', 'User', 'Address', 'SchoolProperty', 'SchoolStaff', 'SchoolPayment', 'Exam', 'SchSession');
	
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login','add'); 
    }

    public function all_exams(){
        $allowed = array(1);
        $this->check_access($allowed);
        $exams = $this->Exam->find('all', array('conditions'=>array('Exam.deleted'=>0)));
        $this->set('exams', $exams);
    }

    public function add_exam() {
        $allowed = array(1);
        $this->check_access($allowed);
        $sch_session = $this->SchSession->find('list');
        $this->set('ses', $sch_session);
        if ($this->request->is('post')) {
            $this->Exam->create();
            if ($this->Exam->save($this->request->data)) {
                $this->Session->setFlash(__('The Exam has been created!'));
                $this->redirect(array('action' => 'all_exams'));
            } else {
                $this->Session->setFlash(__('The Exam could not be created. Please, try again.'));
            }
        }
    }

    public function update_exam($id = null) {
        $allowed = array(1);
        $this->check_access($allowed);
        $sch_session = $this->SchSession->find('list');
        $this->set('ses', $sch_session);
        if (!$id) {
            $this->Session->setFlash('Please provide an Exam id');
            $this->redirect(array('action'=>'all_exams'));
        }

        $user = $this->Exam->findById($id);
        if (!$user) {
            $this->Session->setFlash('Invalid Exam ID Provided');
            $this->redirect(array('action'=>'all_exams'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Exam->id = $id;
            if ($this->Exam->save($this->request->data)) {
                $this->Session->setFlash(__('The Exam has been updated'));
                $this->redirect(array('action' => 'all_exams'));
            }else{
                $this->Session->setFlash(__('Unable to update your Exam.'));
            }
        }

        if (!$this->request->data) {
            $this->request->data = $user;
        }
    }

    public function delete_exams($id = null) {
        $allowed = array(1);
        $this->check_access($allowed);
        if (!$id) {
            $this->Session->setFlash('Please provide an Exam id');
            $this->redirect(array('action'=>'all_exams'));
        }

        $this->Exam->id = $id;
        if (!$this->Exam->exists()) {
            $this->Session->setFlash('Invalid Exam id provided');
            $this->redirect(array('action'=>'all_exams'));
        }
        if ($this->Exam->saveField('deleted', 1)) {
            $this->Session->setFlash(__('Exam deleted'));
            $this->redirect(array('action' => 'all_exams'));
        }
        $this->Session->setFlash(__('Exam was not deleted'));
        $this->redirect(array('action' => 'all_exams'));
    }

}

?>