<?php
/**Author: AhmedSalah */

namespace app\core;

/**
* Class Application
*/

class Application
{
    public static string $ROOT_DIR;
    public static Application $app;
    public Router $router;
    public Request $request;
    public Response $response;
    public Session $session;
    public Cookie $cookie;
    public Database $db;
    public int $port;
    public function __construct(string $rootpath, array $config=[]){
        self::$ROOT_DIR = $rootpath;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->session = new Session();
        $this->cookie = new Cookie();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database($config);
        $this->port = $config['port'];
        // $this->db = new Database(array());
        
    }
    
    public function run(){
        //
        echo $this->router->resolve();
    }

}