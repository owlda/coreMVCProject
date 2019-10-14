<?php

/*
 * APP Core
 * URL
 * Parse
 */

class Core{

    protected $currentController = 'default';
    protected $currentMethod = '';
    protected $params = [];

    /**
     * Core constructor.
     */
    public function __construct()
    {

        $url = $this -> getURL();

        $url[0] = ltrim($url[0], '=');
        //print_r($url);
        // verify if controller exist
        if(file_exists('../app/controllers/'.$url[0].'.php')){

            $this ->currentController = $url[0];
            // unset 0 index
            unset($url[0]);
        }

        // call the controller
        require_once '../app/controllers/'.$this ->currentController.'.php';

        // create the instance of the controller here..
        $this -> currentController = new $this ->currentController;

        // verify if method exist
        if(isset($url[1])){

            if(method_exists($this ->currentController, $url[1])){

                $this ->currentMethod = $url[1];
                unset($url[1]);

            }
        }
        // get parameters from url
        $this ->params = $url ? array_values($url) : [];
        // call the callback from array with the parameters
        call_user_func_array([$this ->currentController, $this->currentMethod], $this ->params);

    }
    /**
     * @return array
     */
    public function getURL()
    {
       if(isset($_GET['url'])){

           $url = filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL);
           $url = explode('/', $url);
           return $url;
       }

    }

}
