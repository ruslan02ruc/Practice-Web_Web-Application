<?php
class SubjectMap extends BaseMap{
   function arrSubjects(){
        $res = $this->db->query("SELECT subject_id AS id, name AS value FROM subject");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    function findById($id =NULL){
        if ($id) {
            $res = $this->db->query("SELECT subject_id, name, otdel_id, hours, active " . "FROM subject WHERE subject_id = $id");
            return $res->fetchObject("Subject");
        }
        return new Subject();
    }
    function save(Subject $subject){
        if ($subject->validate()) {
            if ($subject->subject_id == 0) {
                return $this->insert($subject);
            } else {
                return $this->update($subject);
            }
        }
            return false;
    }
    function insert(Subject $subject){
        $name = $this->db->quote($subject->name);
        $otdel_id = $this->db->quote($subject->otdel_id);
        $hours = $this->db->quote($subject->hours);
        $active = $this->db->quote($subject->active);
        if ($this->db->exec("INSERT INTO subject(name, otdel_id, hours, active)" . " VALUES($name, $subject->otdel_id, $hours, $active)") == 1) {
            $subject->subject_id = $this->db->lastInsertId();
            return true;
        }
        return false;
    }
    function  update(Subject $subject){
        $name = $this->db->quote($subject->name);
        $otdel_id = $this->db->quote($subject->otdel_id);
        $hours = $this->db->quote($subject->hours);
        $active = $this->db->quote($subject->active);
        if ( $this->db->exec("UPDATE subject SET name = $name, otdel_id = $subject->otdel_id," . " hours = $hours, active = $active WHERE subject_id = ".$subject->subject_id) == 1) {
            return true;
        }
        return false;
    }
    function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM subject");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }
    function findViewById($id = NULL){
        if ($id) {
            $res = $this->db->query("SELECT subject.subject_id, subject.name, otdel.name AS otdel, subject.hours, subject.active" . " FROM subject INNER JOIN otdel ON otdel.otdel_id= subject.otdel_id WHERE subject_id = $id");
            return $res->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }
    function findAll($ofset = 0, $limit=30){
        $res = $this->db->query("SELECT subject.subject_id, subject.name, otdel.name AS otdel, subject.hours, subject.active" . " FROM subject INNER JOIN otdel ON otdel.otdel_id= subject.otdel_id LIMIT $ofset,$limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
}
