<?php

/**
 * Created by PhpStorm.
 * User: Corentin
 * Date: 11/03/2016
 * Time: 09:53
 */
use Phalcon\Mvc\Controller;
class AuthController extends Controller
{
    public function initialize(){
        $this->view->setVar("jquery",$this->jquery->genCDNs());
    }

    public function indexAction()
    {
        $jquery = $this->jquery;
        $jquery->click("#btnConn","$.post('.auth/index',function(data){
        $('div#res').html(data);
        });");

        echo'identite';
        $jquery->compile($this->view);
    }

}