<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of OtdelMap
 *
 * @author ruslan
 */
class OtdelMap extends BaseMap{
    function arrOtdels(){
        $res = $this->db->query("SELECT otdel_id AS id, name AS value FROM otdel");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }
}
