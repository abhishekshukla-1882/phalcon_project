<?php
// session_start();

use Phalcon\Http\Request;
// use Phalcon\Escaper;
use Phalcon\Mvc\Controller;
use Phalcon\Logger;
use Phalcon\Logger\Adapter\Stream;

// use App\Component\Escaper;


class SignupController extends Controller
{
    public function indexAction()
    {
       

    $adapter = new Stream('../app/logs/log.log');
    $logger  = new Logger(
        'messages',
        [
            'main' => $adapter,
        ]
    );

    $logger->error('Something went wrong');
    }
    public function subAction(){
        $adapter = new Stream('../app/logs/signup.log');
        $logger  = new Logger(
            'messages',
            [
                'main' => $adapter,
            ]
        );
        // $logger->error('Successfully Regitered');

        $user = new Users();

        $request = new Request();
        $escape = new \App\Components\Myescaper();
        $data = $request->get();
        if (true === $request->isPost('submit')) {
            $username = $request->get('username');
            $password = $request->get('password');
            $check = $request->get('check');
            $data = array();
            $data = [
                'username'=>$username,
                'password'=>$password
            ];
            $postdata = $escape->sanitize($data);
            // echo "<pre>";
            // print_r($postdata);
            // echo "</pre>";
            // die();
            $this->view->request = $postdata;
            $username = $postdata['username'];
            $password = $postdata['password'];
            // $remember = $postdata['Remember'];

            $user->assign(
                $postdata,
                [
                    'username',
                    'password'
                ]
            );
            $success = $user->save();

            header('Location:http://localhost:8080/login');


            
        }
        
        // $postdata = $escape->sanitize($data);
        // $this->view->request = $postdata;
        
        // $username = $postdata['username'];
        // // $password = $postdata['password'];
        // // $remember = $postdata['Remember'];

        // $user->assign(
        //     $postdata,
        //     [
        //         'username',
        //         'password'
        //     ]
        // );

        // $success = $user->save();

        // $this->view->success = $success;

        // if($success){
        //     $logger->info(" Signup by $username. Register succesfully");
        //     $this->view->message = "Register succesfully";
        // }else{
        //     $logger->info(" Signup by $username. ".implode(" . ", $user->getMessages())."");
        //     $this->view->message = "Not Register succesfully due to following reason: <br>".implode("<br>", $user->getMessages());
        // }

    }
}