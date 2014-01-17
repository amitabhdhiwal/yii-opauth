<?php

class AuthModule extends CWebModule
{
    public $config = array(
        /**
         * Path where Opauth is accessed.
         *  - Begins and ends with /
         *  - eg. if Opauth is reached via http://example.org/auth/, path is '/auth/'
         *  - if Opauth is reached via http://auth.example.org/, path is '/'
         */
        'path' => '/ultimatecustom/index.php/auth/login/',

        /**
         * Callback URL: redirected to after authentication, successful or otherwise
         */
        'callback_url' => '{path}callback',

        /**
         * A random string used for signing of $auth response.
         *
         * NOTE: PLEASE CHANGE THIS INTO SOME OTHER RANDOM STRING
         */
        'security_salt' => '9xCda%k]+}y8Vyp=U`u=1%8P)v_Inmk6X>vSS[,_~i5ZS?gg%UvkN`T6!j~5O.?^',

        /**
         * Strategy
         * Refer to individual strategy's documentation on configuration requirements.
         *
         * eg.
         * 'Strategy' => array(
         *
         *   'Facebook' => array(
         *      'app_id' => 'APP ID',
         *      'app_secret' => 'APP_SECRET'
         *    ),
         *
         * )
         *
         */
        'Strategy' => array(
            // Define strategies and their respective configs here

            'Facebook' => array(
                'app_id' => '486474624776010',
                'app_secret' => 'd9cd44de6e228c5674f686291ecd672f'
            ),

            'Google' => array(
                'client_id' => '319992525504.apps.googleusercontent.com',
                'client_secret' => 'LM5iC2-GmVXgGy6IwsMTY_Qi'
            ),

            'Twitter' => array(
                'key' => 'h3iYDYr82bIQpRNIZ023qg',
                'secret' => 'UFL0QRp93sqk6Vi6nSdNWXjhn2vK2pnCCg8T5gYFt7Q'
            ),

        ),
    );

	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components

        $import = array(
            'auth.models.*',
            'auth.components.*',
            "auth.auth.lib.Opauth.Opauth",
            "auth.auth.lib.Opauth.OpauthStrategy"

        );

        $strategiesFolderPath = "auth.auth.lib.Opauth.Strategy"; /* in Yii Folder Format*/

        foreach($this->config['Strategy'] as $strategy=>$params){
            $strategy = ucfirst($strategy);
            $import[] = implode(".",array($strategiesFolderPath,$strategy, $strategy . "Strategy"));
        }

		$this->setImport($import);

	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
