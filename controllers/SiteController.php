<?php

namespace app\controllers;
use app\core\Application;
use app\models\AdminModel;
use app\models\FavoriteModel;
use app\models\UserModel;
use app\models\MovieModel;
use app\models\WatchlistModel;

function printContent($var){
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}

class SiteController extends RootController{

    public function __construct(Application &$app)
    {
        parent::__construct($app);
    }


    private function getTest(){
        $this->get('/test', function () {
            $name = '%'."bad".'%';
            $model = new MovieModel($this->app);
            printContent($model->search($name)[0]);
            return 'ok';
        });
    }
    
    private function GET_landing(){
        $this->get('/', function(){
            $model = new MovieModel($this->app);
            $result = $model->getAll();
            $params = [
                'result'=>$result
            ];
            return $this->render('Landing.php', $params);
        });
    }

    private function GET_login(){
        $this->get('/login', function(){
            if(!$this->checkIfLoggedIn()){
                return $this->render('login.php');
            }

            return $this->redirect('/home');
        });
    }

    private function GET_register(){
        $this->get('/register', function(){
            return $this->render('signup.php');
        });
    }


    private function POST_login(){
        $this->post('/login', function(){
            $params = $this->getRequestBody();
            $email = $params['email'];
            $password = $params['password'];

            // db query
            $usermodel = new UserModel($this->app);
            $result_user = strval($usermodel->getPasswordByEmail($email)['Password']);
            
            // compare with the values in the database
            if($result_user === $password){
                $this->setLoginStatusInSession($email,20);
                return $this->redirect('/home');
                // return 'ok';
            }
            
            $adminmodel = new AdminModel($this->app);
            $result_admin = strval($adminmodel->getPasswordByEmail($email)['Password']);
            
            if($result_admin === $password){
                $this->setLoginStatusInSession($email,20);
                return $this->redirect('/home');
            }
            
            return $this->redirect('/login');
        });
    }

    private function POST_register(){
        $this->post('/register', function(){
            $model = new UserModel($this->app);

            $params = $this->getRequestBody();
            $id = $model->generateRandomID();
            $name = $params['name'];
            $email = $params['email'];
            $password = $params['password'];

            $vals = [
                'id'=>$id,
                'name'=>$name,
                'email'=>$email,
                'password'=>$password
            ];
            
            $model->insert($vals);

            return $this->render('login.php');
        });
    }

    private function GET_logout(){
        $this->get('/logout', function(){
            if($this->checkIfLoggedIn()){
                $this->logout();
                return $this->redirect('/');
            }

            return $this->redirect('/login');
        });
    }

    private function GET_home(){
        $this->get('/home', function(){
            if($this->checkIfLoggedIn()){
                $adminmodel = new AdminModel($this->app);
                $userModel = new UserModel($this->app);
                $email = $this->app->cookie->getCookie('login');
                $userid = $userModel->getIDByEmail($email)[0];
                $adminid = $adminmodel->getIDByEmail($email)[0];


                // favorites
                $favModel = new FavoriteModel($this->app);
                $favs = $favModel->getAllByUserId($userid);

                // watchlist
                $watchlistModel = new WatchlistModel($this->app);
                $watchlist = $watchlistModel->getAllByUserId($userid);

                // movies (most popular)
                $model = new MovieModel($this->app);
                $mostpop = $model->getAll();

                $admin_flag = false;

                if($userid===null) $admin_flag=true;

                $id=$adminid;

                if($adminid===null) $id=$userid;
                // params
                $param = [
                    'favs'=>$favs,
                    'watchlist'=>$watchlist,
                    'mostpop'=>$mostpop,
                    'id'=>$id,
                    'admin_flag'=>$admin_flag
                ];
                
                return $this->render('Home.php', $param);
            }

            return $this->redirect('/login');
        });
    }

    private function GET_memberDetails(){
        $this->get('/member', function(){
            
            if ($this->checkIfLoggedIn()){
                // get query parameters
                $id = intval($this->getRequestQuery()['id']);

                // get member from the database by id
                $usermodel = new UserModel($this->app);
                $adminmodel = new AdminModel($this->app);

                $user_res = $usermodel->getById($id);
                $admin_res = $adminmodel->getById($id);
                
                $result=null;
                $admin_flag = false;

                if($user_res==null){
                    $result=$admin_res;
                    $admin_flag=true;
                } else{
                    $result = $user_res;
                }

                $username = $result['Username'];
                $email = $result['Email'];
                
                // favorites and watchlist

                // favorites
                $favModel = new FavoriteModel($this->app);
                $favs = $favModel->getAllByUserId($id);

                // watchlist
                $watchlistModel = new WatchlistModel($this->app);
                $watchlist = $watchlistModel->getAllByUserId($id);

                // build the params array
                $param = [
                    'result'=>[
                        'username'=>$username,
                        'email'=>$email,
                    ],
                    'id'=>$id,
                    'favs'=>$favs,
                    'watchlist'=>$watchlist,
                    'admin_flag'=>$admin_flag
                ];

                // printContent($param);
                // return 'ok';
                return $this->render('MemberDetails.php', $param);
            }

            return $this->redirect('/login');
        });
    }

    public function GET_searchResults(){
        $this->get('/search-results', function(){
            if($this->checkIfLoggedIn()){

                //////////////
                $adminmodel = new AdminModel($this->app);
                $userModel = new UserModel($this->app);
                $email = $this->app->cookie->getCookie('login');
                $userid = $userModel->getIDByEmail($email)[0];
                $adminid = $adminmodel->getIDByEmail($email)[0];
                $movieModel = new MovieModel($this->app);
                $movies = $movieModel->getAll();

                function getRandomMovies($movies){
                    $res_arr = array();
                    for($i=0;$i<3;$i++)
                    {
                        $res_arr[$i] = $movies[rand(0, count($movies))];
                    }

                    return $res_arr;
                }

                $recommendations = getRandomMovies($movies); 
                $mostwatched = getRandomMovies($movies); 

                // return 'ok';
                // /////////////
                $query = $this->getRequestQuery()['query'];

                $results = $movieModel->search($query);

                $admin_flag = false;

                if($userid==null) $admin_flag=true;
                


                $param = [
                    'results'=>$results,
                    'recommendations'=>$recommendations,
                    'mostwatched'=>$mostwatched,
                    'admin_flag'=>$admin_flag

                ];

                return $this->render('SearchResults.php', $param);
            }
            return $this->redirect('/login');
        });
    }

    public function POST_search(){
        $this->post('/search', function(){
            if($this->checkIfLoggedIn()){
                $query = $this->getRequestBody()['search'];
                return $this->redirect("/search-results?query=$query");
            }
            return $this->redirect('/login');
        });
    }

    private function GET_MovieDetails(){
        $this->get("/movie", function(){
            if ($this->checkIfLoggedIn()){

                $id = intval($this->getRequestQuery()['id']);

                // get member from the database by id
                $model = new MovieModel($this->app);
                $result = $model->getById($id);

                $param = [
                    'result'=>$result
                ];

                return $this->render('MovieDetails.php', $param);
            }

            return $this->redirect('/login');
        });
    }

    private function GET_AllMembers(){
        $this->get("/member/all", function(){
            if ($this->checkIfLoggedIn())
            {
                $model = new UserModel($this->app);
                $result = $model->getAll();
                $params = [
                    'result'=>$result
                ];
                return $this->render('AllMembers.php', $params);
            }

            return $this->redirect('/login');
        });
    }

   

    public function publishRoutes(){
        $this->GET_landing();
        $this->GET_register();
        $this->GET_login();
        $this->POST_login();
        $this->POST_register();
        $this->GET_home();
        $this->GET_AllMembers();
        $this->GET_MovieDetails();
        $this->GET_memberDetails();
        $this->GET_logout();
        $this->POST_search();
        $this->GET_searchResults();
        $this->getTest();
    }

}