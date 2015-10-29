<?php

class EnrolmentsController extends AppController {

    public $uses = array('SchoolType', 'School', 'SchClass','Student','User', 'Address', 'SchSession','SchoolProperty', 'SchoolStaff', 'SchoolPayment', 'StdEnrolment');
    public $components = array('ExcelReader', 'Resources');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login','add'); 
    }

    public function new_enrolment(){

        $classes = $this->SchClass->find('list');
        $curr_session = $this->SchSession->getCurrentSession();
        $this->set('classes', $classes);
        $this->set('curr_session', $curr_session['SchSession']['name']);
        if(!empty($this->request->data)){
            $i_file = $this->request->data['Enrolment']['file'];
            $filename = $i_file['name'];
            $type = $i_file['type'];
            $user_id = $this->Auth->user('id');
            $basic = $this->School->findByUserId($user_id);
            $sch_id = $basic['School']['id'];
            $sch_type = $basic['School']['school_type_id'];
            if($type !== 'application/octet-stream'){
                $this->Session->setFlash(__('Sorry you can only upload Excel Files in the format .xls'));
                $this->redirect($this->referer());
            }
            $permitted = array('application/octet-stream');
            $this->Resources->uploadFiles('files', $i_file, $itemId = null, $permitted);
            $file = WWW_ROOT . 'files/' .$filename;
            $this->set('filename', $file);
            $data = $this->ExcelReader->loadExcelFile($file);
            $data_count = count($data);
            $real_data = $data_count - 1;
            for($i = 1; $i < $data_count; $i++){
                $this->request->data['StdEnrolment']['student_id'] = $data[$i][0];
                $this->request->data['StdEnrolment']['sex'] = $sch_id;
                $this->request->data['StdEnrolment']['session_id'] = $data[$i][1];
                $this->request->data['StdEnrolment']['class_id'] = $data[$i][2];
                $this->request->data['StdEnrolment']['year'] = date('Y');
                $this->request->data['StdEnrolment']['added_by'] = $user_id;
                $this->request->data['StdEnrolment']['school_id'] = $sch_id;
                $this->request->data['StdEnrolment']['school_type_id'] = $sch_type;
                $this->Student->saveAll($this->request->data);
            }
            unlink($file);
            $this->Session->setFlash(__($real_data.' Uploads Successful!'));
            $this->redirect(array('action' => 'school_students'));
        }

    }
}

?>