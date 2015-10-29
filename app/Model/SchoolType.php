<?php

class SchoolType extends AppModel {
	
	public $avatarUploadDir = 'img/avatars';
    
/*	public $validate = array(
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
        )*/


    function getName($type_id){
        $name = $this->find('first', array('fields'=>array('SchoolType.name'),'conditions'=>array('SchoolType.id'=>$type_id)));
        return $name;
    }



}

?>