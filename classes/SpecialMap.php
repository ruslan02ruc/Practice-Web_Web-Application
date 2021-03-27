<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SpecialMap
 *
 * @author ruslan
 */
class SpecialMap extends BaseMap{
    function arrSpecials(){
        $res = $this->db->query("SELECT special_id AS id, name AS value FROM special");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
}
