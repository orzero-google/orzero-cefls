<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'My Web Application',
    'language'=>'zh_cn',

	// preloading 'log' component
	'preload'=>array(
        'log',
//        'bootstrap'
    ),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'application.modules.user.models.*',
        'application.modules.user.components.*',
        'application.modules.rights.*',
        'application.modules.rights.components.*',
        'application.extensions.debugtoolbar.*',
	),
    'defaultController'=>'cefls',
	'modules'=>array(
		// uncomment the following to enable the Gii tool

		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'api',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
            'generatorPaths'=>array(
                'bootstrap.gii',
            ),
		),
        'user' => array(
            'tableUsers' => 'tbl_users',
            'tableProfiles' => 'tbl_profiles',
            'tableProfileFields' => 'tbl_profiles_fields',
        ),
        'rights'=>array(
//            'install'=>false, // Enables the installer.
            'superuserName'=>'Admin', // Name of the role with super user privileges.
            'authenticatedName'=>'Authenticated', // Name of the authenticated user role.
            'userIdColumn'=>'id', // Name of the user id column in the database.
            'userNameColumn'=>'username', // Name of the user name column in the database.
            'enableBizRule'=>true, // Whether to enable authorization item business rules.
            'enableBizRuleData'=>false, // Whether to enable data for business rules.
            'displayDescription'=>true, // Whether to use item description instead of name.
            'flashSuccessKey'=>'RightsSuccess', // Key to use for setting success flash messages.
            'flashErrorKey'=>'RightsError', // Key to use for setting error flash messages.
            'install'=>true, // Whether to install rights.
            'baseUrl'=>'/rights', // Base URL for Rights. Change if module is nested.
            'layout'=>'rights.views.layouts.main', // Layout to use for displaying Rights.
            'appLayout'=>'application.views.layouts.main', // Application layout.
//            'cssFile'=>'rights.css', // Style sheet file to use for Rights.
            'install'=>false, // Whether to enable installer.
            'debug'=>true, // Whether to enable debug mode.
        ),

	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
            'class'=>'RWebUser',
//            'class'=>'RightsWebUser',
            'allowAutoLogin'=>true,
            'loginUrl' => array('/user/login'),
		),
        'authManager'=>array(
            'class'=>'RDbAuthManager',
//            'class'=>'RightsAuthManager',
        ),
        'bootstrap'=>array(
            'class'=>'ext.bootstrap.components.Bootstrap', // assuming you extracted bootstrap under extensions
        ),
        'urlManager'=>array(
            'urlFormat'=>'path',
            'rules'=>array(
                'post/<id:\d+>/<title:.*?>'=>'post/view',
                'posts/<tag:.*?>'=>'post/index',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ),
        ),

		'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=api_2',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'tablePrefix' => 'blog_',
		),
        'authManager'=>array(
            'class'=>'RDbAuthManager',
            'connectionID'=>'db',
            'itemTable'=>'blog_authitem',
            'itemChildTable'=>'blog_authitemchild',
            'assignmentTable'=>'blog_authassignment',
            'rightsTable'=>'blog_rights',
        ),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),

        'request'=>array(
            'enableCsrfValidation'=>true,
        ),

        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning',
                ),
                // debug toolbar configuration
                array(
                    'class'=>'XWebDebugRouter',
                    'config'=>'alignLeft, opaque, runInDebug, fixedPos, collapsed, yamlStyle',
                    'levels'=>'error, warning, trace, profile, info',
                    'allowedIPs'=>array('127.0.0.1'),
                ),
                // uncomment the following to show log messages on web pages
                /*
                array(
                    'class'=>'CWebLogRoute',
                ),
                */
            ),
        ),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
    'params'=>require(dirname(__FILE__).'/params.php'),
);