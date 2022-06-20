<?php
namespace app\models;

use app\core\Application;
use app\core\Database;

abstract class RootModel{
    protected Application $app;
    protected Database $db;
    public function __construct(Application &$app)
    {
        $this->app = $app;
        $this->db = $app->db;
    }
    abstract function insert($vals);
    abstract function delete($id);
    abstract function update($id, $vals);
    abstract function getAll();

    public function generateRandomID(){
        return rand();
    }

    public function loadData($data){
        foreach($data as $key => $value){
            if (property_exists($this, $key)){
                $this->{$key} = $value;  
            }
        }
    }
}