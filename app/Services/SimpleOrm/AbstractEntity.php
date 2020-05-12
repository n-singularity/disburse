<?php


namespace App\Services\SimpleOrm;


abstract class AbstractEntity
{
    protected $tableName;
    
    public function save(){
        $vars = get_object_vars($this);
        
        if(is_null($vars['id'])){
            
        }
    }
    
    public function get(){
    
    }
}