<?php

namespace app\models;

use app\core\Application;
use app\models\MovieModel;

use function app\controllers\printContent;

class WatchlistModel extends RootModel{

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

    public function update($id, $param)
    {
        
    }

    public function getAll()
    {
        
    }

    public function getAllByUserId($userId)
    {
        // select movieid by userid from favorites
        // select movierow by movieid
        $query = "SELECT movieID FROM watchlist where UserID=(?)";
        $stmt = $this->db->pdo->prepare($query);
        $stmt->execute([$userId]);
        $movieIDsArray = $stmt->fetchAll();
        foreach($movieIDsArray as $key=>$value){
            $movieIDsArray[$key] = $value["movieID"];
        }
        $movieModel = new MovieModel($this->app);
        $result = $movieModel->getByIds($movieIDsArray);
        return $result;
    }

}