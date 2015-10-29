<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	// added the debug toolkit
	// sessions support
	// authorization for login and logut redirect
	public $components = array(
		'DebugKit.Toolbar',
		'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'users', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
			'authError' => 'You must be logged in to view this page.',
			'loginError' => 'Invalid Username or Password entered, please try again.'
 
        ));
	public $uses = array('Role', 'School','Student','StdClass','SchSession');
	// only allow the login controllers only
	public function beforeFilter() {
        $this->Auth->allow('login');
        $user_role = $this->Auth->user('role_id');
        if($user_role == 2){
            $name = $this->School->findByUserId($this->Auth->user('id'));
            $username = $name['School']['name'];
        }else{
            $username = $this->Auth->user('username');
        }
        $current_page = $this->action;

        $role_options = $this->Role->find('list');
        $this->set('role_options', $role_options);
        $this->set('role', $user_role);
        $this->set('username', $username);
        $this->set('curr', $current_page);
    }
	
	public function isAuthorized($user) {
		// Here is where we should verify the role and give access based on role
		
		return true;
	}

    public function randomString($length) {
        $str = "";
        $characters = array_merge(range('A','Z'), range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
        $rand = mt_rand(0, $max);
        $str .= $characters[$rand];
        }
        return $str;
    }

    function portalNo($length) {
        $result = '';
        for ($i = 0; $i < $length; $i++)
        {
            // the use of 97 and 122 below will be explained
            $result .= rand(1, 9);
        }
        return $result;
    }

    public function check_access(array $access_roles){
        $role = $this->Auth->user('role_id');
        if(!in_array($role,$access_roles)){
            $this->Session->setFlash(__('Sorry, You are not allowed to use that resource!'));
            $this->redirect($this->referer());
        }
    }

    public function generate_numbers($start, $stop){
        foreach (range($start, $stop) as $number) {
            $no[] = $number;
        }
        return $no;
    }

    public function getSchoolName(){
        $name = null;
        $orderBy = array('School.name');
        $name = $this->School->find('list', array('order'=>$orderBy, 'fields' => array('School.name')));
        if (!$name) $name=array();
        return $name;
    }

    public function getClassName(){
        $name = null;
        $orderBy = array('SchClass.name');
        $name = $this->SchClass->find('list', array('order'=>$orderBy, 'fields' => array('SchClass.name')));
        if (!$name) $name=array();
        return $name;
    }

    public function getStudentName(){
        $name = null;
        $orderBy = array('Student.name');
        $name = $this->Student->find('list', array('order'=>$orderBy, 'fields' => array('Student.name')));
        if (!$name) $name=array();
        return $name;
    }

	
}
