<?php
class LoginController extends Controller
{
    public function actionIndex()
    {
        $auth = Yii::app()->getModule('auth');
        $config = $auth->config;

        /*check if it's a callback */
        if(array_key_exists('callback',$_GET))
        {
            $opauth = new Opauth($config,false);
            /* to use it in your app */
            $response = $_SESSION['opauth']; /* use $_SESSION OR $_POST OR $_GET, whichever method you've used in the config. Default is session.*/
            unset($_SESSION['opauth']);
            echo "<pre>";
            print_r($response);
            echo "</pre>";
        }
        else
        {
            $opauth = new Opauth($config,true);
        }
    }

}