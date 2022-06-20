<?php

namespace app\models;

use app\core\Application;

use function app\controllers\printContent;

class MovieModel extends RootModel{

    public function __construct(Application &$app)
    {
        parent::__construct($app);
    }

    public function insert($vals)
    {
        
    }

    public function delete($id)
    {
        
    }

    public function update($id, $vals)
    {
        
    }

    public function getAll()
    {
        $query = "SELECT * FROM movie;";
        $stmt = $this->db->pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getById($id){
        try{
            $query = "SELECT * FROM movie where id=$id;";
            $stmt = $this->db->pdo->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch(\PDOException $e){
            return null;
        }
    }

    public function getByIds(array $ids){
        try{
            $resultArray = array();
            foreach($ids as $_=>$id){
                $query = "SELECT ID, name  FROM movie where id=$id;";
                $stmt = $this->db->pdo->prepare($query);
                $stmt->execute();
                $result = $stmt->fetch();
                $resultArray[$id] = $result;
            }
            return $resultArray;
        } catch(\PDOException $e){
            return null;
        }
    }

    public function search(string $name){
        $name = '%'.$name.'%';
        $query = "SELECT id, name  FROM movie where name like (?);";
        $stmt = $this->db->pdo->prepare($query);
        $stmt->execute([$name]);
        $results_arr = $stmt->fetchAll();
        return $results_arr;
    }
}