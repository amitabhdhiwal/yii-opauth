<?php
/**
 * Opauth basic configuration file to quickly get you started
 * ==========================================================
 * To use: rename to opauth.conf.php and tweak as you like
 * If you require advanced configuration options, refer to opauth.conf.php.advanced
 */

$config = array(
/**
 * Path where Opauth is accessed.
 *  - Begins and ends with /
 *  - eg. if Opauth is reached via http://example.org/auth/, path is '/auth/'
 *  - if Opauth is reached via http://auth.example.org/, path is '/'
 */
	'path' => '/auth/',

/**
 * Callback URL: redirected to after authentication, successful or otherwise
 */
	'callback_url' => '{path}callback.php',
	
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