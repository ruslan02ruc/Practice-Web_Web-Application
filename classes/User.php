<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author ruslan
 */
class User extends Table {
    //put your code here
    public function validate() {
        if (!empty($this->lastname) &&
            !empty($this->firstname) &&
            !empty($this->login) &&
            !empty($this->pass) &&
            !empty($this->role_id) &&
            !empty($this->gender_id)) {
                return true;
            }
            return false;
    }
    public $user_id = 0;
    public $lastname = '';
    public $firstname = '';
    public $patronymic = '';
    public $login = '';
    public $gender_id = 0;
    public $birthday = '';
    public $role_id = 0;
    public $active = 1;
}
