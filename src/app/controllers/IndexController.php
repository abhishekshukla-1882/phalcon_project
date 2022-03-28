<?php
// session_start();
use Phalcon\Mvc\Controller;
use Phalcon\Logger;
use Phalcon\Escaper;


class IndexController extends Controller
{
    public function indexAction()
    {
        // print_r($this->date);
        // die();
        $datehelper = new \App\Components\DateHelper();
        // $this->view->tum=Posts::find();
        echo $datehelper->getdate();
        die();
        // return '<h1>Hello World!</h1>';
    }
    // public function logoutAction(){
        
    // }

}