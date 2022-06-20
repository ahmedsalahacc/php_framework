<?php
/**
*    class Request
*/

namespace app\core;

use function app\controllers\printContent;

class Request{
    public function getPath(){
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        if ($position === false){
            return $path;
        }
        $path = substr($path, 0, $position);
        return $path;
    }

    public function getQuery(){
        $query = $_SERVER['QUERY_STRING'];
        $exploded = explode('&', $query);
        $values = array();
        
        if (strlen($query)<1) return false;

        for($i=0;$i<count($exploded);$i++){
            // break the delimeter =
            $pair = explode('=',$exploded[$i]);
            // take the key and value pairs
            $values[$pair[0]]=$pair[1];
        }

        return $values;
    }

    public function getMethod(){
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isPost(){
        return $this->getMethod() ==='post';
    }

    public function isGet(){
        return $this->getMethod() ==='get';
    }

    public function getBody(){
        /**
         * returns the request body
         * @return array requestBody
         */
        $body = [];
        $method = $this->getMethod()==='get'? $_GET:$_POST;
        $filterType = $this->getMethod()==='get'? INPUT_GET:INPUT_POST;

        foreach($method as $key=>$value){
            // sanitize the data
            $body[$key] = filter_input($filterType, $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }

        return $body;
    }
}