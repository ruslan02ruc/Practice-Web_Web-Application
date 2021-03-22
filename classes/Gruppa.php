<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Gruppa
 *
 * @author ruslan
 */
class Gruppa extends Table {
    //put your code here
    public function validate() {
        return false;
    }
    public $gruppa_id = 0;
    public $name = '';
    public $special_id = 0;
    public $date_begin = '';
    public $date_end = '';
}
