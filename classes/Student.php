<?php
class Student extends Table {
    public function validate() {
        if (!empty($this->gruppa_id)) {
            return true;
        }
        if (!empty($this->num_zach)) {
            return true;
        }
        return false;
    }
    public $user_id = 0;
    public $gruppa_id = 0;
    public $num_zach = '';
}
