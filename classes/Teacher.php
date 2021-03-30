<?php
class Teacher extends Table {
    //put your code here
    public function validate() {
        if (!empty($this->otdel_id)) {
            return true;
        }
        return false;
    }
    public $user_id = 0;
    public $otdel_id = 0;
}
