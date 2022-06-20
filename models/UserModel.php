<?php

namespace app\models;

use app\core\Application;

use function app\controllers\printContent;

class UserModel extends RootModel{

    public function __construct(Application &$app)
    {
        parent::__construct($app);
    }

    public function insert($vals)
    {   
        $sql = "INSERT INTO user (ID, Username, Email, Password, picture) VALUES (?,?,?,?,?)";
        $stmt= $this->db->pdo->prepare($sql);
        $stmt->execute([$vals['id'], $vals['name'], $vals['email'], $vals['password'], $vals['name']]);
    }

    public function delete($id)
    {
        
    }

    public function update($id, $vals)
    {
        
    }

    public function getAll()
    {
        $query = "SELECT * FROM user;";
        $stmt = $this->db->pdo->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getById($id){
        try{
            $query = "SELECT * FROM user where id=$id;";
            $stmt = $this->db->pdo->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch(\PDOException $e){
            return null;
        }
    }

    public function getPasswordByEmail($email){
        try{
            $query = 'SELECT Password FROM user where Email=(?);';
            $stmt = $this->db->pdo->prepare($query);
            $stmt->execute([$email]);
            $result = $stmt->fetch();
            return $result;
        } catch(\PDOException $e){
            return null;
        }
    }
    
    public function getIDByEmail($email){
        try{
            $query = 'SELECT id FROM user where Email=(?);';
            $stmt = $this->db->pdo->prepare($query);
            $stmt->execute([$email]);
            $result = $stmt->fetch();
            return $result;
        } catch(\PDOException $e){
            return null;
        }
    }
}