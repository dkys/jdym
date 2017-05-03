<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Index\Model;
use Think\Model;

class AdvModel extends Model{
    //put your code 
    public function advInfo() {
        return $this->select();
    }
}
