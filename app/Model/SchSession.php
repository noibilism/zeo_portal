<?php

class SchSession extends AppModel {
	
	public $avatarUploadDir = 'img/avatars';

    public $useTable = "sessions";

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

    public function getCurrentSession(){

        $result = $this->find('first', array('conditions'=>array('SchSession.current_session'=>1)));
        return $result;

    }



}

?>