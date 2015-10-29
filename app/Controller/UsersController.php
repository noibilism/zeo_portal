<?php

class UsersController extends AppController {

	public $paginate = array(
        'limit' => 25,
        'conditions' => array('deleted' => '0'),
    	'order' => array('User.username' => 'asc' ) 
    );
    public $uses = array('SchSession', 'Subject', 'SchClass', 'StdEnrolment', 'ExamEnrolment','SchoolType','User', 'NoticeBoard');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login','add'); 
    }

	public function login() {
		
		$this->layout = 'login';
		//if already logged-in, redirect
		if($this->Session->check('Auth.User')){
			$this->redirect(array('action' => 'dashboard'));
		}
		
		// if we get the post information, try to authenticate
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
                $this->updateLastLogin();
				$this->Session->setFlash(__('Logged in Successfully!'));
				$this->redirect('dashboard');
			} else {
				$this->Session->setFlash(__('Invalid username or password'));
			}
		} 
	}

    public function updateLastLogin(){

        $user_id = $this->Auth->user('id');
        $this->request->data['User']['id'] = $user_id;
        $this->request->data['User']['last_login'] = date('Y-m-d H:i:s');
        $saved = $this->User->save($this->request->data);
        return $saved;

    }

    public function change_password(){

        $user_id = $this->Auth->user('id');
        if(!empty($this->data)){
            $old_password = $this->data['User']['old_password'];
            $new_password = $this->data['User']['new_password'];
            $new_password_repeat = $this->data['User']['new_password_repeat'];
            if($new_password == $new_password_repeat){
                $get_old_password = $this->User->find('first', array('conditions'=>array('User.id'=>$user_id)));
                $hashed_old_password = $this->Auth->password($old_password);
                if($get_old_password['User']['password'] == $hashed_old_password){
                    $this->User->id = $user_id;
                    if($this->User->saveField('password', $new_password)){
                        $subject = 'Password Reset on IFO ZEO Portal';
                        $message = 'Dear Sir/Ma,';
                        $message = 'You have requested to change your password on the IFO ZEO Portal as follows:';
                        $message .= 'Username: '.$this->Auth->user('username');
                        $message .= 'Password: '.$new_password;
                        $message .= 'Thank You!';
                        $email = $this->Auth->user('email');
                        mail($email, $subject,$message);
                        $this->Session->setFlash(__('Password updated successfully!'));
                        $this->redirect(array('action'=>'dashboard'));
                    }else{
                        $this->Session->setFlash(__('Password update unsuccessful!'));
                    }
                }else{
                    $this->Session->setFlash(__('Password update not successful! Reason: Please make sure your current password is correct'));
                }
            }else{
                $this->Session->setFlash(__('Password update not successful! Reason: Your passwords do not match!'));
            }
        }

    }

    public function logout() {
		$this->redirect($this->Auth->logout());
	}

    public function all_users(){
        $allowed = array(1);
        $this->check_access($allowed);
        $users = $this->User->find('all', array('conditions'=>array('User.deleted'=>0)));
        $this->set('users', $users);
    }

    public function index() {
		$this->paginate = array(
			'limit' => 6,
			'order' => array('User.username' => 'asc' )
		);
		$users = $this->paginate('User');
		$this->set(compact('users'));
    }

    public function dashboard(){

        $current_session = $this->SchSession->find('first', array('conditions'=>array('current_session'=>1)));
        $enrolments = $this->StdEnrolment->find('all', array('conditions'=>array('session_id'=>$current_session['SchSession']['id'],'deleted'=>0)));
        $exam_enrolments = $this->ExamEnrolment->find('all', array('conditions'=>array('session_id'=>$current_session['SchSession']['id'],'deleted'=>0)));
        $schools = $this->School->find('all', array('conditions'=>array('deleted'=>0)));
        $sch_types = $this->SchoolType->find('all');
        $classes = $this->SchClass->find('all');
        $notices = $this->NoticeBoard->find('all', array('conditions'=>array('NoticeBoard.publish_end >' => date('Y-m-d'))));
        $this->set('current_session', $current_session['SchSession']['name']);
        $this->set('enrolments', count($enrolments));
        $this->set('exam_enrolments', count($exam_enrolments));
        $this->set('schools', count($schools));
        $this->set('sch_types', $sch_types);
        $this->set('classes', $classes);
        $this->set('notices', $notices);
    }

    public function notice_board(){

        $notices = $this->NoticeBoard->find('all', array('conditions'=>array('NoticeBoard.publish_end >' => date('Y-m-d'))));
        $this->set('notices', $notices);

    }

    public function add_notice(){

        $allowed = array(1);
        $this->check_access($allowed);
        if ($this->request->is('post')) {
            $this->NoticeBoard->create();
            if ($this->NoticeBoard->save($this->request->data)) {
                $this->Session->setFlash(__('The Notice has been created!'));
                $this->redirect(array('action' => 'notice_board'));
            } else {
                $this->Session->setFlash(__('The Notice could not be created. Please, try again.'));
            }
        }

    }

    public function update_notice($id){

        $allowed = array(1);
        $this->check_access($allowed);
        if (!$id) {
            $this->Session->setFlash('Please provide a Notice id');
            $this->redirect(array('action'=>'notice_board'));
        }

        $user = $this->NoticeBoard->findById($id);
        if (!$user) {
            $this->Session->setFlash('Invalid notice_board ID Provided');
            $this->redirect(array('action'=>'notice_board'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->NoticeBoard->id = $id;
            if ($this->NoticeBoard->save($this->request->data)) {
                $this->Session->setFlash(__('The notice has been updated'));
                $this->redirect(array('action' => 'notice_board'));
            }else{
                $this->Session->setFlash(__('Unable to update your notice_board.'));
            }
        }

        if (!$this->request->data) {
            $this->request->data = $user;
        }

    }

    public function delete_notice($id){
        $allowed = array(1);
        $this->check_access($allowed);
        if (!$id) {
            $this->Session->setFlash('Please provide a user id');
            $this->redirect(array('action'=>'notice_board'));
        }

        $this->NoticeBoard->id = $id;
        if (!$this->NoticeBoard->exists()) {
            $this->Session->setFlash('Invalid NoticeBoard id provided');
            $this->redirect(array('action'=>'notice_board'));
        }
        if ($this->NoticeBoard->saveField('deleted', 1)) {
            $this->Session->setFlash(__('NoticeBoard deleted'));
            $this->redirect(array('action' => 'notice_board'));
        }
        $this->Session->setFlash(__('NoticeBoard was not deleted'));
        $this->redirect(array('action' => 'notice_board'));
    }

    public function getRoleName($role_id){
        $name = $this->Role->find('first', array('fields'=>array('Role.name'),'conditions'=>array('Role.id'=>$role_id)));
        return $name['Role']['name'];
    }

    public function getSessionName($ses_id){
        $name = $this->SchSession->find('first', array('fields'=>array('SchSession.name'),'conditions'=>array('SchSession.id'=>$ses_id)));
        return $name['SchSession']['name'];
    }

    public function add_user() {
        $allowed = array(1);
        $this->check_access($allowed);
        if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
                $subject = 'New User Account on IFO ZEO Portal';
                $message = 'Dear Sir/Ma,';
                $message .= 'A user account has been created on the IFO ZEO Portal as follows:';
                $message .= 'Username: '.$this->request->data['User']['username'];
                $message .= 'Password: '.$this->request->data['User']['password'];
                $message .= 'Thank You!';
                $email = $this->request->data['User']['email'];
                mail($email, $subject,$message);
				$this->Session->setFlash(__('The user has been created!'));
				$this->redirect(array('action' => 'all_users'));
			} else {
				$this->Session->setFlash(__('The user could not be created. Please, try again.'));
			}
        }
    }

    public function update_user($id = null) {
        $allowed = array(1);
        $this->check_access($allowed);
		    if (!$id) {
				$this->Session->setFlash('Please provide a user id');
				$this->redirect(array('action'=>'all_users'));
			}

			$user = $this->User->findById($id);
			if (!$user) {
				$this->Session->setFlash('Invalid User ID Provided');
				$this->redirect(array('action'=>'all_users'));
			}

			if ($this->request->is('post') || $this->request->is('put')) {
				$this->User->id = $id;
				if ($this->User->save($this->request->data)) {
					$this->Session->setFlash(__('The user has been updated'));
					$this->redirect(array('action' => 'all_users'));
				}else{
					$this->Session->setFlash(__('Unable to update your user.'));
				}
			}

			if (!$this->request->data) {
				$this->request->data = $user;
			}
    }

    public function delete($id = null) {
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
        if ($this->User->saveField('deleted', 1)) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'all_users'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'all_users'));
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

    public function sch_sessions(){
        $allowed = array(1);
        $this->check_access($allowed);
        $sch_sessions = $this->SchSession->find('all');
        $this->set('sch_sess', $sch_sessions);
    }

    public function add_session() {
        $allowed = array(1);
        $this->check_access($allowed);
        if ($this->request->is('post')) {
            $this->SchSession->create();
            if ($this->SchSession->save($this->request->data)) {
                $this->Session->setFlash(__('The Session has been created!'));
                $this->redirect(array('action' => 'sch_sessions'));
            } else {
                $this->Session->setFlash(__('The SchSession could not be created. Please, try again.'));
            }
        }
    }

    public function update_session($id = null) {
        $allowed = array(1);
        $this->check_access($allowed);
        if (!$id) {
            $this->Session->setFlash('Please provide a Session id');
            $this->redirect(array('action'=>'sch_sessions'));
        }

        $user = $this->SchSession->findById($id);
        if (!$user) {
            $this->Session->setFlash('Invalid User ID Provided');
            $this->redirect(array('action'=>'sch_sessions'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->SchSession->id = $id;
            if ($this->SchSession->save($this->request->data)) {
                $this->Session->setFlash(__('The session has been updated'));
                $this->redirect(array('action' => 'sch_sessions'));
            }else{
                $this->Session->setFlash(__('Unable to update your session.'));
            }
        }

        if (!$this->request->data) {
            $this->request->data = $user;
        }
    }

    public function delete_session($id = null) {
        $allowed = array(1);
        $this->check_access($allowed);
        if (!$id) {
            $this->Session->setFlash('Please provide a session id');
            $this->redirect(array('action'=>'sch_sessions'));
        }

        $this->SchSession->id = $id;
        if (!$this->SchSession->exists()) {
            $this->Session->setFlash('Invalid SchSession id provided');
            $this->redirect(array('action'=>'sch_sessions'));
        }
        if ($this->SchSession->saveField('deleted', 1)) {
            $this->Session->setFlash(__('SchSession deleted'));
            $this->redirect(array('action' => 'sch_sessions'));
        }
        $this->Session->setFlash(__('SchSession was not deleted'));
        $this->redirect(array('action' => 'sch_sessions'));
    }

    public function subjects(){
        $allowed = array(1);
        $this->check_access($allowed);
        $subjects = $this->Subject->find('all', array('conditions'=>array('Subject.deleted'=>0)));
        $this->set('subjects', $subjects);
    }

    public function add_subject() {
        $allowed = array(1);
        $this->check_access($allowed);
        if ($this->request->is('post')) {
            $this->Subject->create();
            if ($this->Subject->save($this->request->data)) {
                $this->Session->setFlash(__('The Subject has been created!'));
                $this->redirect(array('action' => 'subjects'));
            } else {
                $this->Session->setFlash(__('The Subject could not be created. Please, try again.'));
            }
        }
    }

    public function update_subject($id = null) {
        $allowed = array(1);
        $this->check_access($allowed);
        if (!$id) {
            $this->Session->setFlash('Please provide a subject id');
            $this->redirect(array('action'=>'subjects'));
        }

        $user = $this->Subject->findById($id);
        if (!$user) {
            $this->Session->setFlash('Invalid Subject ID Provided');
            $this->redirect(array('action'=>'subjects'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->Subject->id = $id;
            if ($this->Subject->save($this->request->data)) {
                $this->Session->setFlash(__('The subject has been updated'));
                $this->redirect(array('action' => 'subjects'));
            }else{
                $this->Session->setFlash(__('Unable to update your subject.'));
            }
        }

        if (!$this->request->data) {
            $this->request->data = $user;
        }
    }

    public function delete_subject($id = null) {
        $allowed = array(1);
        $this->check_access($allowed);
        if (!$id) {
            $this->Session->setFlash('Please provide a subject id');
            $this->redirect(array('action'=>'index'));
        }

        $this->Subject->id = $id;
        if (!$this->Subject->exists()) {
            $this->Session->setFlash('Invalid subject id provided');
            $this->redirect(array('action'=>'index'));
        }
        if ($this->Subject->saveField('deleted', 1)) {
            $this->Session->setFlash(__('Subject deleted'));
            $this->redirect(array('action' => 'subjects'));
        }
        $this->Session->setFlash(__('Subject was not deleted'));
        $this->redirect(array('action' => 'subjects'));
    }

    public function classes(){
        $allowed = array(1);
        $this->check_access($allowed);
        $classes = $this->SchClass->find('all',array('conditions'=>array('SchClass.deleted'=>0)));
        $this->set('classes', $classes);
    }

    public function add_class() {
        $allowed = array(1);
        $this->check_access($allowed);
        if ($this->request->is('post')) {
            $this->SchClass->create();
            if ($this->SchClass->save($this->request->data)) {
                $this->Session->setFlash(__('The Class has been created!'));
                $this->redirect(array('action' => 'classes'));
            } else {
                $this->Session->setFlash(__('The Class could not be created. Please, try again.'));
            }
        }
    }

    public function update_class($id = null) {
        $allowed = array(1);
        $this->check_access($allowed);
        if (!$id) {
            $this->Session->setFlash('Please provide a class id');
            $this->redirect(array('action'=>'classes'));
        }

        $user = $this->SchClass->findById($id);
        if (!$user) {
            $this->Session->setFlash('Invalid Class ID Provided');
            $this->redirect(array('action'=>'classes'));
        }

        if ($this->request->is('post') || $this->request->is('put')) {
            $this->SchClass->id = $id;
            if ($this->SchClass->save($this->request->data)) {
                $this->Session->setFlash(__('The class has been updated'));
                $this->redirect(array('action' => 'classes'));
            }else{
                $this->Session->setFlash(__('Unable to update your class.'));
            }
        }

        if (!$this->request->data) {
            $this->request->data = $user;
        }
    }

    public function delete_class($id = null) {
        $allowed = array(1);
        $this->check_access($allowed);
        if (!$id) {
            $this->Session->setFlash('Please provide a class id');
            $this->redirect(array('action'=>'index'));
        }

        $this->SchClass->id = $id;
        if (!$this->SchClass->exists()) {
            $this->Session->setFlash('Invalid class id provided');
            $this->redirect(array('action'=>'index'));
        }
        if ($this->SchClass->saveField('deleted', 1)) {
            $this->Session->setFlash(__('Class deleted'));
            $this->redirect(array('action' => 'classes'));
        }
        $this->Session->setFlash(__('Class was not deleted'));
        $this->redirect(array('action' => 'classes'));
    }

}

?>