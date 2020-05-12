<?php


namespace App\Services\SimpleOrm;


use Exception;
use mysqli;

abstract class AbstractEntity
{
    protected $tableName;
    protected $isNew = true;
    
    /**
     * @return $this
     * @throws Exception
     */
    public function save()
    {
        $conn = new mysqli(getenv('DB_HOST'), getenv('DB_USERNAME'), getenv('DB_PASSWORD'), getenv('DB_NAME'));
        
        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error);
        }
        
        $vars = get_object_vars($this);
        unset($vars['tableName']);
        unset($vars['isNew']);
        
        if ($this->isNew) {
            $sql = "INSERT INTO  " . $this->tableName . "(`" . implode("`,`", array_keys($vars)) . "`) VALUES (";
            foreach ($vars as $value) {
                $sql .= is_null($value) ? 'null,' : "'$value',";
            }
            $sql = substr($sql, 0, -1);
            
            $sql .= ")";
        } else {
            $sql = "UPDATE `testDb`.`disburses` SET";
            
            foreach ($vars as $key => $value) {
                $sql .= "`$key` = '$value',";
            }
            
            $sql = substr($sql, 0, -1);
            
            $sql .= " WHERE (`id` =" . $vars['id'] . ")";
        }

        if ($conn->query($sql) === TRUE) {
            return $this;
        } else {
            throw new Exception($conn->error);
        }
    }
    
    public function find($id)
    {
        $conn = new mysqli(getenv('DB_HOST'), getenv('DB_USERNAME'), getenv('DB_PASSWORD'), getenv('DB_NAME'));
        
        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "SELECT * FROM testDb.disburses where id=$id";
        
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            foreach ($row as $key => $value) {
                $this->$key = $value;
            }
            $this->isNew = false;
            return $this;
        } else {
            return null;
        }
    }
}