<?php
class Pages extends Controller {

    public function __construct() { }

    public function home($id){
        print 'Home page get with '.$id;
    }


    public function index(){

        $this->view('index');
    }
}
