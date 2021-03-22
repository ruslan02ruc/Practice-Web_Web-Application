<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Otdel
 *
 * @author ruslan
 */
class Otdel extends Table{
    //put your code here
    
    public function validate() {
        return false;
    }
    public $otdel_id = 0;
    public $name = '';
    public $active = 1;
}
