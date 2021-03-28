<?php
class SpecialMap extends BaseMap{
    function arrSpecials(){
        $res = $this->db->query("SELECT special_id AS id, name AS value FROM special");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
    function findById($id =NULL){
        if ($id) {
            $res = $this->db->query("SELECT special_id, name, otdel_id, active " . "FROM special WHERE special_id = $id");
            return $res->fetchObject("Special");
        }
        return new Special();
    }
    function save(Special $special){
        if ($special->validate()) {
            if ($special->special_id == 0) {
                return $this->insert($special);
            } else {
                return $this->update($special);
            }
        }
            return false;
    }
    function insert(Special $special){
        $name = $this->db->quote($special->name);
        $active = $this->db->quote($special->active);
        if ($this->db->exec("INSERT INTO special(name, otdel_id, active)" . " VALUES($name, $special->otdel_id, $active)") == 1) {
            $special->special_id = $this->db->lastInsertId();
            return true;
        }
        return false;
    }
    function  update(Special $special){
        $name = $this->db->quote($special->name);
        $active = $this->db->quote($special->active);
        if ( $this->db->exec("UPDATE special SET name = $name, otdel_id = $special->otdel_id," . " active = $active WHERE special_id = ".$special->special_id) == 1) {
            return true;
        }
        return false;
    }
    function count(){
        $res = $this->db->query("SELECT COUNT(*) AS cnt FROM special");
        return $res->fetch(PDO::FETCH_OBJ)->cnt;
    }
    function findViewById($id = NULL){
        if ($id) {
            $res = $this->db->query("SELECT special.special_id, special.name, otdel.name as otdel, special.active " . " FROM special INNER JOIN otdel ON special.special_id=otdel.otdel_id WHERE special_id = $id");
            return $res->fetch(PDO::FETCH_OBJ);
        }
        return false;
    }
    function findAll($ofset = 0, $limit=30){
        $res = $this->db->query("SELECT special.special_id, special.name, otdel.name as otdel, special.active " . " FROM special INNER JOIN otdel ON special.special_id=otdel.otdel_id LIMIT $ofset,$limit");
        return $res->fetchAll(PDO::FETCH_OBJ);
    }
}
