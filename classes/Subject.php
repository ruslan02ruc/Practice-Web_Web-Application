<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Subject
 *
 * @author ruslan
 */
class Subject extends Table {
    //put your code here
    public function validate() {
        return false;
    }
    public $subject_id = 0;
    public $name = '';
    public $otdel_id = 0;
    public $hours = '';
    public $active = 1;
}
