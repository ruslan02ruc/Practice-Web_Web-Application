<?php
class Subject extends Table {
    //put your code here
    public function validate() {
        if (!empty($this->name) && !empty($this->otdel_id)&& !empty($this->hours)&& !empty($this->active)) {
            return true;
        }
        return false;
    }
    public $subject_id = 0;
    public $name = '';
    public $otdel_id = 0;
    public $hours = '';
    public $active = 1;
}
