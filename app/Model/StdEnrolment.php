<?php

class StdEnrolment extends AppModel {
	
	public $avatarUploadDir = 'img/avatars';

    public $validate = array(
        'name' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'A Session Name is required',
				'allowEmpty' => false
            ),
			 'unique' => array(
				'rule'    => array('isUniqueUsername'),
				'message' => 'This Session name is already in use',
                 'on'=>'create'
			)
        ),
        'enrolment_start' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please select an Enrolment Start date'
            )
        ),
        'enrolment_stop' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please select an Enrolment End date'
            )
        )

    );
	
		/**
	 * Before isUniqueUsername
	 * @param array $options
	 * @return boolean
	 */
	function isUniqueUsername($check) {

		$name = $this->find(
			'first',
			array(
				'fields' => array(
					'SchSession.id',
					'SchSession.name'
				),
				'conditions' => array(
					'SchSession.name' => $check['name']
				)
			)
		);
        if(empty($name)){
            return true;
        }else{
            return false;
        }
    }

    public function alphaNumericDashUnderscore($check) {
        // $data array is passed using the form field name as the key
        // have to extract the value to make the function generic
        $value = array_values($check);
        $value = $value[0];

        return preg_match('/^[a-zA-Z0-9_ \-]*$/', $value);
    }


    function isUniqueEmail($check) {

        $email = $this->find(
            'first',
            array(
                'fields' => array(
                    'SchSession.id'
                ),
                'conditions' => array(
                    'SchSession.email' => $check['email']
                )
            )
        );
        if(empty($email)){
            return true;
        }else{
            return false;
        }
    }

    function getSchoolEnrolmentsByType($school_type_id, $session_id){

        $result = $this->find('all', array('conditions'=>array('StdEnrolment.school_type_id'=>$school_type_id, 'StdEnrolment.session_id'=>$session_id)));
        return $result;

    }

    function getSchoolEnrolmentsByTypeGender($school_type_id, $session_id, $sex){

        $result = $this->find('all', array('conditions'=>array('StdEnrolment.school_type_id'=>$school_type_id, 'StdEnrolment.session_id'=>$session_id, 'StdEnrolment.sex'=>$sex)));
        return $result;

    }

    function getEnrolmentByClass($class_id, $session_id){

        $result = $this->find('all', array('conditions'=>array('StdEnrolment.class_id'=>$class_id, 'StdEnrolment.session_id'=>$session_id)));
        return $result;

    }

    function getEnrolmentByClassGender($class_id, $session_id, $gender){

        $result = $this->find('all', array('conditions'=>array('StdEnrolment.class_id'=>$class_id, 'StdEnrolment.session_id'=>$session_id, 'StdEnrolment.sex'=>$gender)));
        return $result;

    }

    function getSchoolEnrolmentsBySession($school_id, $session_id){

        $result = $this->find('all', array('conditions'=>array('StdEnrolment.school_id'=>$school_id, 'StdEnrolment.session_id'=>$session_id)));
        return $result;

    }



}

?>