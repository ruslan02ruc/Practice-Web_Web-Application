<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Special
 *
 * @author ruslan
 */
class Special extends Table {
    //put your code here
    public function validate() {
        if (!empty($this->name) && !empty($this->otdel_id)&& !empty($this->active)) {
            return true;
        }
        return false;
    }
    public $special_id = 0;
    public $name = '';
    public $otdel_id = 0;
    public $active = 1;
}
