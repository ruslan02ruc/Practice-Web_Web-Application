<?php
class Classroom extends Table {
    public function validate() {
        if (!empty($this->name) && !empty($this->active)) {
            return true;
        }
        return false;
    }
    public $classroom_id = 0;
    public $name = '';
    public $active = 1;
}
