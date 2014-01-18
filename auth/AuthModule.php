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
        'path' => '/auth/login/',

        /**
         * Callback URL: redirected to after authentication, successful or otherwise
         */
        'callback_url' => '{path}callback',

        /**
         * A random string used for signing of $auth response.
         *
         * NOTE: PLEASE CHANGE THIS INTO SOME OTHER RANDOM STRING
         */
        'security_salt' => 'add something here',

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
                'app_id' => '',
                'app_secret' => ''
            ),

            'Google' => array(
                'client_id' => '',
                'client_secret' => ''
            ),

            'Twitter' => array(
                'key' => '',
                'secret' => ''
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
