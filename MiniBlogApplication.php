<?php

class MiniblogApplication extends Application
{
    protected $login_action = array('account', 'signin');

    public function getRootDir()
    {
        return dirname(__FILE__);
    }

    protected function registerRoutes()
    {
        return array(
            // StatusController  'action' => 'メソッド名'
            '/'
                => array('controller' => 'status', 'action' => 'index'),
            '/status/post'
                => array('controller' => 'status', 'action' => 'post'),
            '/user/:user_name'
                => array('controller' => 'status', 'action' => 'user'),
            '/user/:user_name/status/:id'
                => array('controller' => 'status', 'action' => 'show'),

            // AccountController  'action' => 'メソッド名'
            '/account'
                => array('controller' => 'account', 'action' => 'index'),
            '/account/:action'
                => array('controller' => 'account'),
            '/follow'
                => array('controller' => 'account', 'action' => 'follow'),
        );
    }

    protected function configure()
    {
        $this->db_manager->connect('master', array(
            'dsn' => 'mysql:dbname=mini_blog;host=localhost;port=3307;unix_socket=/Applications/MAMP/tmp/mysql/mysql.sock',
            'user' => 'root',
            'password' => 'root'
        ));
    }
}