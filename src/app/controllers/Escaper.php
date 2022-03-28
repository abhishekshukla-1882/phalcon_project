<?php
// session_start();

use Phalcon\Http\Request;
use Phalcon\Escaper;
use Phalcon\Mvc\Controller;
use Phalcon\Logger;
use Phalcon\Logger\Adapter\Stream;


class EscaperController extends Controller

{
    public function sanitizeAction(){
        $request = new Request();
        $user = new Users();
        if (true === $request->isPost('submit')) {
        $username = $request->get('username');
        $password = $request->get('password');
        $check = $request->get('check');
        $escaper = new Escaper();
        $inputdata = array(
            "username" => $escaper->escapeHtml($this->request->getPost('username'),),
            "password" => $escaper->escapeHtml($this->request->getPost('password'),)

        );
        $user->assign(
            $inputdata,
            [
            'username',
            'password'
            ]
        );
        $user->save();
    }
}




}