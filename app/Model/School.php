<?php

class School extends AppModel {
	
	public $avatarUploadDir = 'img/avatars';
    
	public $validate = array(
        'name' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'A School Name is required',
				'allowEmpty' => false
            ),
			 'unique' => array(
				'rule'    => array('isUniqueUsername'),
				'message' => 'This school name is already in use',
                 'on'=>'create'
			),
			'alphaNumericDashUnderscore' => array(
				'rule'    => array('alphaNumericDashUnderscore'),
				'message' => 'School Name can only be letters, numbers and underscores'
			),
        ),
        'phone' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A Phone no is required'
            ),
            'alphaNumericDashUnderscore' => array(
                'rule'    => array('alphaNumericDashUnderscore'),
                'message' => 'Registration no can only be letters, numbers and underscores'
            ),
        ),
        'reg_no' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A registration no is required'
            ),
            'alphaNumericDashUnderscore' => array(
                'rule'    => array('alphaNumericDashUnderscore'),
                'message' => 'Registration no can only be letters, numbers and underscores'
            ),
        ),
		'email' => array(
			'required' => array(
				'rule' => array('email', true),    
				'message' => 'Please provide a valid email address.'    
			),
			 'unique' => array(
				'rule'    => array('isUniqueEmail'),
				'message' => 'This email is already in use',
                 'on'=>'create'
			),
			'between' => array( 
				'rule' => array('between', 6, 60), 
				'message' => 'Email must be between 6 to 60 characters'
			)
		)/*,
        'y_o_e' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please enter the year of establishment'
            )
        )*/,
        'school_type_id' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Please select a school type.'
            ),
        ),
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
					'School.id',
					'School.name'
				),
				'conditions' => array(
					'School.name' => $check['name']
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
                    'School.id'
                ),
                'conditions' => array(
                    'School.email' => $check['email']
                )
            )
        );
        if(empty($email)){
            return true;
        }else{
            return false;
        }
    }

    function getSchoolsByType($type_id){

        $result = $this->find('all', array('conditions'=>array('School.school_type_id'=>$type_id)));
        return $result;

    }



}

?>