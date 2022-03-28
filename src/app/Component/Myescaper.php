<?php
namespace App\Components;
use Phalcon\Escaper;


class Myescaper
{
    public $escaper;
    public function __construct(){
        $this->escaper = new Escaper();
    }
    public function sanitize($request){
        // echo "<pre>";
        // print_r($request);
        // echo "</pre>";
        // die();
        $username = $this->escaper->escapeHtml($request['username']);
        $password =$this->escaper->escapeHtml($request['password']);
        // echo $username;
        // die();
        $postdata = array(
            'username' => $username,
            'password' => $password
        );
        return $postdata;
    }
}