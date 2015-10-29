<?php

class SchoolsController extends AppController {

	public $uses = array('SchoolType', 'School', 'SchClass','Student','User', 'Address', 'SchSession','SchoolProperty', 'SchoolStaff', 'SchoolPayment', 'StdEnrolment');
    public $components = array('ExcelReader', 'Resources');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login','add'); 
    }

    public function all_schools(){
        $allowed = array(1);
        $this->check_access($allowed);
        $schools = $this->School->find('all', array('conditions'=>array('School.deleted'=>0)));
        $this->set('schools', $schools);
    }

    public function dashboard(){

    }

    public function add_school() {
        $allowed = array(1);
        $this->check_access($allowed);
        $portal_reg_no = $this->portalNo(8);
        $sch_type_options = $this->SchoolType->find('list');
        $this->set('portal_reg_no', $portal_reg_no);
        $this->set('sch_type_options', $sch_type_options);
        if ($this->request->is('post')) {
            $password = $this->randomString(6);
            $this->request->data['User']['username'] = $this->request->data['School']['portal_reg_no'];
            $this->request->data['User']['password'] = $password;
            $this->request->data['User']['email'] = $this->request->data['School']['email'];
            $this->request->data['User']['role_id'] = 2;
/*            pr($this->request->data); exit;*/
			if ($this->User->save($this->request->data)) {
                $user_id = $this->User->findByUsername($this->request->data['School']['portal_reg_no']);
                $this->request->data['School']['user_id'] = $user_id['User']['id'];
                $this->School->create();
                if($this->School->save($this->request->data)){
                    $this->request->data['School']['user_id'] = 2;
                    $email = $this->request->data['School']['email'];
                    $subject = 'Your Schools Login Detail on IFO ZEO Portal';
                    $message = 'Dear Sir/Ma,';
                    $message .= 'Your School: '.$this->request->data['School']['name'].' has been registered on the Ministry of Education Portal. Please find below your login details';
                    $message .= 'Username: '.$this->request->data['School']['portal_reg_no'];
                    $message .= 'Password: '.$password;
                    $message .= 'Thank You!';
                    mail($email, $subject,$message);
                    $this->Session->setFlash(__('The School has been created! The username is '.$this->request->data['School']['portal_reg_no'].', and the password is '.$password));
                    $this->redirect(array('action' => 'all_schools'));
                }
			} else {
				$this->Session->setFlash(__('The school could not be created. Please, try again.'));
			}	
        }
    }

    public function update_school($id = null) {
            $allowed = array(1);
            $this->check_access($allowed);
            $sch_type_options = $this->SchoolType->find('list');
            $this->set('sch_type_options', $sch_type_options);
		    if (!$id) {
				$this->Session->setFlash('Please provide a school id');
				$this->redirect(array('action'=>'all_schools'));
			}

			$sch = $this->School->findById($id);
			if (!$sch) {
				$this->Session->setFlash('Invalid School ID Provided');
				$this->redirect(array('action'=>'all_schools'));
			}

			if ($this->request->is('post') || $this->request->is('put')) {
				$this->School->id = $id;
				if ($this->School->save($this->request->data)) {
					$this->Session->setFlash(__('The school has been updated'));
					$this->redirect(array('action' => 'all_schools'));
				}else{
					$this->Session->setFlash(__('Unable to update your school.'));
				}
			}

			if (!$this->request->data) {
				$this->request->data = $sch;
			}
    }

    public function delete($id = null) {
        $allowed = array(1);
        $this->check_access($allowed);
		if (!$id) {
			$this->Session->setFlash('Please provide a school id');
			$this->redirect(array('action'=>'all_schools'));
		}
		
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid school id provided');
			$this->redirect(array('action'=>'all_schools'));
        }
        if ($this->User->saveField('deleted', 1)) {
            $this->Session->setFlash(__('School deleted'));
            $this->redirect(array('action' => 'all_schools'));
        }
        $this->Session->setFlash(__('School was not deleted'));
        $this->redirect(array('action' => 'all_schools'));
    }
	
	public function activate($id = null) {
        $allowed = array(1);
        $this->check_access($allowed);
		if (!$id) {
			$this->Session->setFlash('Please provide a user id');
			$this->redirect(array('action'=>'index'));
		}
		
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid user id provided');
			$this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 1)) {
            $this->Session->setFlash(__('User re-activated'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not re-activated'));
        $this->redirect(array('action' => 'index'));
    }

    public function getSchoolTypeName($type_id){
        $name = $this->SchoolType->getName($type_id);
        return $name['SchoolType']['name'];
    }

    public function getSchoolEnrolmentsByType($type_id){

        $cur_session = $this->SchSession->getCurrentSession();
        $enrolment = $this->StdEnrolment->getSchoolEnrolmentsByType($type_id, $cur_session['SchSession']['id']);
        return $enrolment;

    }

    public function getEnrolmentByClass($class_id){

        $cur_session = $this->SchSession->getCurrentSession();
        $enrolment = $this->StdEnrolment->getEnrolmentByClass($class_id, $cur_session['SchSession']['id']);
        return $enrolment;

    }

    public function getSchoolsByType($type_id){

        $schools = $this->School->getSchoolsByType($type_id);
        return $schools;

    }

    public function school_profile($id){

        $basic = $this->School->findById($id);
        $property = $this->SchoolProperty->findBySchoolId($id);
        $staffs = $this->SchoolStaff->findBySchoolId($id);
        $payments = $this->SchoolPayment->findBySchoolId($id);
        $this->set('basic', $basic);
        $this->set('property', $property);
        $this->set('staffs', $staffs);
        $this->set('payments', $payments);

    }

    public function general_profile(){

        $user_id = $this->Auth->user('id');
        $basic = $this->School->findByUserId($user_id);
        $staffs = $this->SchoolStaff->findBySchoolId($basic['School']['id']);
        $payments = $this->SchoolPayment->findBySchoolId($basic['School']['id']);
        $property = $this->SchoolProperty->findBySchoolId($basic['School']['id']);
        $this->set('basic', $basic);
        $this->set('property', $property);
        $this->set('staffs', $staffs);
        $this->set('payments', $payments);


    }

    public function update_school_profile() {

        $allowed = array(2);
        $this->check_access($allowed);
        $sch_type_options = $this->SchoolType->find('list');
        $user_id = $this->Auth->user('id');
        $basic = $this->School->findByUserId($user_id);
        $id = $basic['School']['id'];
        $this->set('sch_type_options', $sch_type_options);
        if (!$id) {
            $this->Session->setFlash('Please provide a school id');
            $this->redirect(array('action'=>'general_profile'));
        }

        $sch = $this->School->findById($id);
        if (!$sch) {
            $this->Session->setFlash('Invalid School ID Provided');
            $this->redirect(array('action'=>'general_profile'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->School->id = $id;
            if ($this->School->save($this->request->data)) {
                $this->Session->setFlash(__('Your school profile has been updated'));
                $this->redirect(array('action' => 'general_profile'));
            }else{
                $this->Session->setFlash(__('Unable to update your school.'));
            }
        }

        if (!$this->request->data) {
            $this->request->data = $sch;
        }

    }

    public function update_school_facilities() {
        $allowed = array(2);
        $this->check_access($allowed);
        $sch_type_options = $this->SchoolType->find('list');
        $user_id = $this->Auth->user('id');
        $basic = $this->School->findByUserId($user_id);
        $id = $basic['School']['id'];
        $sch_property = $this->SchoolProperty->findBySchoolId($id);
        $name = $basic['School']['name'];
        $nos = $this->generate_numbers(1,50);
        $this->set('sch_type_options', $sch_type_options);
        $this->set('sch_id', $id);
        $this->set('name', $name);
        $this->set('nos', $nos);
        if (!$id) {
            $this->Session->setFlash('Please provide a school id');
            $this->redirect(array('action'=>'general_profile'));
        }elseif(!empty($sch_property)){
            if ($this->request->is('post') || $this->request->is('put')) {
                $this->SchoolProperty->id = $sch_property['SchoolProperty']['id'];
                if ($this->SchoolProperty->save($this->request->data)) {
                    $this->Session->setFlash(__('Your school profile has been updated'));
                    $this->redirect(array('action' => 'general_profile'));
                }else{
                    $this->Session->setFlash(__('Unable to update your school profile.'));
                }
            }
        }else{
            if ($this->request->is('post') || $this->request->is('put')) {
                if ($this->SchoolProperty->save($this->request->data)) {
                    $this->Session->setFlash(__('Your school profile has been updated'));
                    $this->redirect(array('action' => 'general_profile'));
                }else{
                    $this->Session->setFlash(__('Unable to update your school profile.'));
                }
            }
        }
        if (!$this->request->data) {
            $this->request->data = $sch_property;
        }
    }

    public function add_staff(){
        $allowed = array(2);
        $this->check_access($allowed);
        $user_id = $this->Auth->user('id');
        $basic = $this->School->findByUserId($user_id);
        $id = $basic['School']['id'];
        $name = $basic['School']['name'];
        $this->set('sch_id', $id);
        $this->set('name', $name);
        if(!empty($this->request->data)){
            $this->request->data['SchoolStaff']['school_id'] = $id;
            $this->request->data['SchoolStaff']['year_acquired'] = $this->request->data['SchoolStaff']['year_acquired']['year'];
            if ($this->request->is('post') || $this->request->is('put')) {
                if ($this->SchoolStaff->save($this->request->data)) {
                    $this->Session->setFlash(__('Your school staff has been added'));
                    $this->redirect(array('action' => 'general_profile'));
                }else{
                    $this->Session->setFlash(__('Unable to update your school profile.'));
                }
            }

        }

    }

    public function update_school_staff($id){
        $allowed = array(2);
        $this->check_access($allowed);
        $user_id = $this->Auth->user('id');
        $basic = $this->School->findByUserId($user_id);
        $s_id = $basic['School']['id'];
        $name = $basic['School']['name'];
        $this->set('sch_id', $id);
        $this->set('name', $name);
        if(!empty($this->request->data)){
            $this->request->data['SchoolStaff']['id'] = $id;
            $this->request->data['SchoolStaff']['school_id'] = $s_id;
            $this->request->data['SchoolStaff']['year_acquired'] = $this->request->data['SchoolStaff']['year_acquired']['year'];
            if ($this->request->is('post') || $this->request->is('put')) {
                if ($this->SchoolStaff->save($this->request->data)) {
                    $this->Session->setFlash(__('Your school staff has been updated'));
                    $this->redirect(array('action' => 'general_profile'));
                }else{
                    $this->Session->setFlash(__('Unable to update your school profile.'));
                }
            }
        }else{
            $this->request->data = $this->SchoolStaff->findById($id);
        }

    }

    public function delete_school_staff($id){
        if (!$id) {
            $this->Session->setFlash('Invalid Staff ID Provided');
            $this->redirect(array('action'=>'general_profile'));
        }
        if($this->SchoolStaff->delete($id)){
            $this->Session->setFlash(__('Staff deleted'));
            $this->redirect($this->referer());
        }
    }

    public function school_students($sch_id = null){
        $allowed = array(1,2);
        $this->check_access($allowed);
        if(isset($sch_id)){
            $students = $this->Student->find('all', array('conditions'=>array('Student.school_id'=>$sch_id, 'deleted'=>0)));
        }else{
            $user_id = $this->Auth->user('id');
            $basic = $this->School->findByUserId($user_id);
            $sch_id = $basic['School']['id'];
            $students = $this->Student->find('all', array('conditions'=>array('Student.school_id'=>$sch_id, 'deleted'=>0)));
        }
        $this->set('students', $students);
    }

    public function add_student(){
        $allowed = array(1,2);
        $this->check_access($allowed);
        $user_id = $this->Auth->user('id');
        $basic = $this->School->findByUserId($user_id);
        $classes = $this->SchClass->find('list');
        $id = $basic['School']['id'];
        $type = $basic['School']['school_type_id'];
        $name = $basic['School']['name'];
        $pin = $this->portalNo(10);
        $this->set('sch_id', $id);
        $this->set('pin', $pin);
        $this->set('type', $type);
        $this->set('name', $name);
        $this->set('classes', $classes);
        if(!empty($this->request->data)){
            $this->request->data['Student']['school_id'] = $id;
            if ($this->request->is('post') || $this->request->is('put')) {
                if ($this->Student->save($this->request->data)) {
                    $this->Session->setFlash(__('Your school student has been added'));
                    $this->redirect(array('action' => 'school_students'));
                }else{
                    $this->Session->setFlash(__('Unable to update your school student.'));
                }
            }

        }

    }

    public function add_bulk_student(){

        if(!empty($this->request->data)){
            //application/octet-stream
            $i_file = $this->request->data['Student']['file'];
            $filename = $i_file['name'];
            $type = $i_file['type'];
            $user_id = $this->Auth->user('id');
            $basic = $this->School->findByUserId($user_id);
            $sch_id = $basic['School']['id'];
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
                $this->request->data['Student']['name'] = $data[$i][0];
                $this->request->data['Student']['school_id'] = $sch_id;
                $this->request->data['Student']['day_boarding'] = $data[$i][1];
                $this->request->data['Student']['sex'] = $data[$i][2];
                $this->request->data['Student']['d_o_b'] = $this->ExcelReader->format_date($data[$i][3]);
                $this->Student->saveAll($this->request->data);
            }
            unlink($file);
            $this->Session->setFlash(__($real_data.' Uploads Successful!'));
            $this->redirect(array('action' => 'school_students'));
        }

    }

    public function update_student($std_id){
        $allowed = array(1,2);
        $this->check_access($allowed);
        $user_id = $this->Auth->user('id');
        $basic = $this->School->findByUserId($user_id);
        $classes = $this->SchClass->find('list');
        $id = $basic['School']['id'];
        $type = $basic['School']['school_type_id'];
        $name = $basic['School']['name'];
        $this->set('sch_id', $id);
        $this->set('type', $type);
        $this->set('name', $name);
        $this->set('classes', $classes);
        if(!$std_id){
            $this->Session->setFlash(__('Invalid School ID!'));
            $this->redirect($this->referer());
        }
        if(!empty($this->request->data)){
            $this->request->data['Student']['id'] = $std_id;
            $this->request->data['Student']['school_id'] = $id;
            if ($this->request->is('post') || $this->request->is('put')) {
                if ($this->Student->save($this->request->data)) {
                    $this->Session->setFlash(__('Your school student has been updated'));
                    $this->redirect(array('action' => 'school_students'));
                }else{
                    $this->Session->setFlash(__('Unable to update your school student.'));
                }
            }
        }else{
            $this->request->data = $this->Student->findById($std_id);
        }

    }

    public function delete_student($std_id){
        if(!$std_id){
            $this->Session->setFlash(__('Invalid School ID!'));
            $this->redirect($this->referer());
        }
        $this->request->data['Student']['id'] = $std_id;
        $this->request->data['Student']['deleted'] = 1;
        if ($this->Student->save($this->request->data)) {
            $this->Session->setFlash(__('Your school student has been deleted'));
            $this->redirect(array('action' => 'school_students'));
        }else{
            $this->Session->setFlash(__('Unable to update your school student.'));
        }
    }

    public function enrolments(){
        $classes = $this->SchClass->find('all');
        $this->set('classes', $classes);
    }

    public function enrol_class($class_id){
        $user_id = $this->Auth->user('id');
        $basic = $this->School->findByUserId($user_id);
        $sch_id = $basic['School']['id'];
        $students = $this->Student->find('all', array('conditions'=>array('Student.school_id'=>$sch_id, 'deleted'=>0)));
        $current_action = $this->action;
        $class_name = $this->SchClass->findById($class_id);
        $this->set('students', $students);
        $this->set('class_id', $class_id);
        $this->set('class_name', $class_name['SchClass']['name']);
        $this->set('current_action', $current_action);
        if(!empty($this->request->data)){
            pr($this->request->data); exit;
        }
    }



}

?>