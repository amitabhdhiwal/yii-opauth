yii-opauth
==========

# Opauth module for Yii Framework

##Installation

1. Copy the auth folder to your app's protected/modules/ folder.
2. Open your app's config file (default: protected/config/main.php) and add the following to the 'modules' array,
```php
'auth'=>array(
'config'=> //the Opauth's config array can be pasted as it is, with your keys.
)
```

3. Your urlManager (in the config file) should have the following rule
```php
'auth/login/*'=>array('auth/login'),
```
the default urlManager would look like this:
```
'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
                'auth/login/*'=>array('auth/login'),
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
```

4. go to your /auth/login/twitter or /auth/login/facebook, and it should work! :D

PS make sure there's no session_start() anywhere (since Yii auto-starts sessions). If there is, simply do this:
```
if(!isset($_SESSION)){
 session_start();
}
```
## Issues
Tweet me, maybe? [@amitabhdhiwal](http://twitter.com/amitabhdhiwal)
