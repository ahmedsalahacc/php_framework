<?php
namespace app\core;

use ErrorException;

/**Author: AhmedSalah */
/**
 * Class Router
 */

class Router
/**
 * Router class is used to handle the requests, response, 
 * and the navigation between the methods
 */
{
    protected array $routes =  [];
    protected Request $request;
    protected Response $response;

    public function __construct(Request $request, Response $response)
    {
        /**
         * @param Request $request
         * @param Response $response
         */
        $this->response = $response;
        $this->request = $request; 
    }

    public function get($path, $callback){
        /**
         * Supports the handling of the GET request
         * 
         * @param string $path - uri to navigate to
         * @param mixed $callback - callback function to execute, string with path to the template, or an
         * Array of [class, method] to call
         */
        $this->routes['get'][$path] = $callback;
    }
    
    public function post($path, $callback){
        /**
         * Supports the handling of the POST request
         * 
         * @param string $path  - uri to navigate into
         * @param mixed $callback  - callback function to execute, string with path to the template, or an
         * Array of [class, method] to call
         */
        $this->routes['post'][$path] = $callback;
    }

    public function resolve(){
        /**
         * Resolves the URI requests of the application when the
         * application starts
         */
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false){
            Application::$app->response->setStatusCode(404);
            return $this->renderView("404.html");
        }

        // API (function callback)
        if (is_string($callback)){
            return $this->renderView($callback);
        }
        
        if (is_array($callback)){
            $callback[0] = new $callback[0]();

        }
        // String - Array callback
        return call_user_func($callback);
    }

    public function renderView($view, $params = []){
        /**
         * Renders the view of the given file in the parameters
         * 
         * @param string $view - path to the view to render
         * @param array $params - key-value pairs for the keys 
         *  Parameters to be used 
         */
        $layoutContent = $this->getLayoutContent();
        $viewContent = $this->renderOnlyView($view, $params);

        return str_replace('{{content}}', $viewContent, $layoutContent);
        
    }

    protected function renderContent(string $viewContent){
        /**
         * Renders string content
         * 
         * @param string $viewContent - string to render
         */
        $layoutContent = $this->getLayoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function getLayoutContent(){
        /**
         * @TODO
         */
        ob_start();
        include_once Application::$ROOT_DIR."/views/templates/base.php";
        return ob_get_clean();
    }

    protected function renderOnlyView($view, $params=[]){
        /**
         * includes the code in the view file and retuns its content
         * @TODO research ob_start and ob_get_clean
         */
        
        //changing keys to variable names
        foreach($params as $key=>$value){
            $$key = $value;
        }
        
        ob_start();
        session_start(); 
        include_once Application::$ROOT_DIR."/views/pages/$view";
        return ob_get_clean();
    }

}
