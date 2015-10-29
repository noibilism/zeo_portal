<?php

class Subject extends AppModel {

    public $avatarUploadDir = 'img/avatars';

    public $useTable = "subjects";

    public $validate = array(
        'name' => array(
            'nonEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'A subject Name is required',
                'allowEmpty' => false
            ),
            'unique' => array(
                'rule'    => array('isUniqueUsername'),
                'message' => 'This subject name is already in use',
                'on'=>'create'
            )
        ),/*
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
        )*/

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
                    'subject.id',
                    'subject.name'
                ),
                'conditions' => array(
                    'subject.name' => $check['name'],
                    'subject.deleted' => 0
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
                    'subject.id'
                ),
                'conditions' => array(
                    'subject.email' => $check['email']
                )
            )
        );
        if(empty($email)){
            return true;
        }else{
            return false;
        }
    }



}

?>