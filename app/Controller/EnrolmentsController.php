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
                $pin = $data[$i][0];
                $student = $this->Student->findByPin($pin);
                $check_duplicate = $this->check_duplicate_enrolment($student['Student']['id'], $curr_session['SchSession']['id']);
                if(empty($student)){
                    unlink($file);
                    $this->Session->setFlash(__($pin.' Incorrect on Row '.$i));
                    $this->redirect($this->referer());
                }elseif($student['Student']['name'] !== $data[$i][1]){
                    unlink($file);
                    $this->Session->setFlash(__(' The portal identification number '.$pin.' doesnot match the name '.$data[$i][1].' on Row '.$i));
                    $this->redirect($this->referer());
                }elseif(!empty($check_duplicate)){
                    unlink($file);
                    $this->Session->setFlash(__(' The student with portal identification number '.$pin.' and the name '.$data[$i][1].' has been enroled before.Please check Row '.$i));
                    $this->redirect($this->referer());
                }
                $this->request->data['StdEnrolment']['student_id'] = $student['Student']['id'];
                $this->request->data['StdEnrolment']['sex'] = $student['Student']['sex'];
                $this->request->data['StdEnrolment']['session_id'] = $curr_session['SchSession']['id'];
                $this->request->data['StdEnrolment']['class_id'] = $this->request->data['Enrolment']['class_id'];
                $this->request->data['StdEnrolment']['year'] = date('Y');
                $this->request->data['StdEnrolment']['added_by'] = $user_id;
                $this->request->data['StdEnrolment']['school_id'] = $sch_id;
                $this->request->data['StdEnrolment']['school_type_id'] = $sch_type;
                $this->StdEnrolment->saveAll($this->request->data);
            }
            unlink($file);
            $this->Session->setFlash(__($real_data.' Uploads Successful!'));
            $this->redirect(array('action' => 'school_enrolments'));
        }

    }

    public function check_duplicate_enrolment($student_id, $session){
        $result = $this->StdEnrolment->findByStudentIdAndSessionId($student_id, $session);
        return $result;
    }

    public function school_enrolments($session_id = null){
        if(!$session_id){
            $ses = $this->SchSession->getCurrentSession();
        }else{
            $ses = $session_id;
        }
        $sch_sessions = $this->SchSession->find('all');
        $classes = $this->SchClass->find('all');
        $this->set('sch_sessions', $sch_sessions);
        $this->set('classes', $classes);
        $this->set('ses', $ses);
    }

    public function view_class_enrolled_students($class_id){
        $session_id = $this->SchSession->getCurrentSession();
        $students = $this->StdEnrolment->getEnrolmentByClass($class_id, $session_id['SchSession']['id']);
        if(!$class_id){
            $this->Session->setFlash(__(' Invalid Class ID!'));
            $this->redirect($this->referer());
        }
        $c_name = $this->getClassName();
        $s_name = $this->getSchoolName();
        $st_name = $this->getStudentName();
        $this->set('students', $students);
        $this->set('class_name', $c_name);
        $this->set('school_name', $s_name);
        $this->set('student_name', $st_name);
    }

    public function delete_enrolment($id){
        if(!$id){
            $this->Session->setFlash(__(' Invalid Enrolment ID!'));
            $this->redirect($this->referer());
        }else{
            $this->StdEnrolment->delete($id);
            $this->Session->setFlash(__(' Deletion Successful!'));
            $this->redirect($this->referer());
        }
    }

    public function update_enrolment($id){
        if(!$id){
            $this->Session->setFlash(__(' Invalid Enrolment ID!'));
            $this->redirect($this->referer());
        }
        $std_id = $this->StdEnrolment->findById($id);
        $std_name = $this->getStudentName();
        $session_id = $this->SchSession->getCurrentSession();
        $classes = $this->SchClass->find('list');
        $this->set('classes', $classes);
        $this->set('std_name', $std_name[$std_id['StdEnrolment']['student_id']]);
        $this->set('curr_session', $session_id['SchSession']['id']);
        if(!empty($this->request->data)){
            $this->StdEnrolment->id = $id;
            $this->StdEnrolment->save($this->request->data);
            $this->Session->setFlash(__('Updated Successfully!'));
            $this->redirect($this->referer());
        }else{
            $this->request->data = $this->StdEnrolment->findById($id);
        }
    }

    public function enrolment_sessions($school_id = null){
        $sch_sess = $this->SchSession->find('all');
        $user_id = $this->Auth->user('id');
        $basic = $this->School->findByUserId($user_id);
        $sch_id = $basic['School']['id'];
        $this->set('sch_sess', $sch_sess);
        $this->set('sch_id', $sch_id);
    }

    public function view_session_enrolments($session_id){

    }
}

?>