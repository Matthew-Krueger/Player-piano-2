<?php
$root = (isset($_SERVER['DOCUMENT_ROOT']) && $_SERVER['DOCUMENT_ROOT'] != "") ? $_SERVER['DOCUMENT_ROOT'] : "/var/www/html";;
$GLOBALS['config'] = array(
	'root'		=> $root,
	'mysql'		=> array(
				'host'		=> 'localhost',
				'username'	=> 'root',
				'password'	=>  PASS,
        'db'        => array(
        	'pageData' => array(
        		'location'  => 'locationsMap',
        		'data'      => 'pageData',
        		'name'      => 'page_data'
        	),
			'userData'	=> array(
				'users'		=> 'users',
				'session'	=> 'users_session',
				'groups'	=> 'groups',
				'name'		=> 'users',
				'que'			=> 'que'
			),
        ),
			/* @Depreciated */
			'table'		=>  array(
				'users'		=> 'users',
				'session'	=> 'users_session',
				'groups'	=> 'groups',
				'logs'		=> array(
					'log'		=> 'rec'
				)
			),
			/* @Depreciated */
		'utable'	=> 'users'
		),
	'remember'	=> array(
				'cookie_name'	=> 'session_id_storage',
				'cookie_expiry'	=>  604800
			),

	# Session Information
	'session'	=> array(
				'session_name'	=> 'user',
				'CSRF_protect' 	=> 'token'
			),

	# Site Metadata
	'siteData'	=> array(
				'name' => 'Northeastern 4-H Neighbors',
				'version' => '0.0.1a'
	),

	# Page Types
	'pageType'	=> array(
				'genericPage' 			=> 1,
				'searchPage'			=> 2,
				'fileListPage'			=> 3,
				'homePage'				=> 4,
				'uploadPage'			=> 5,
				'errorPage'				=> 6,
	),

	'pageTemplateLocation' => array(
				'genericPage' 			=> "{$root}/templatesDefaultSite/generic.HTMLtemplate",
				'searchPage'			=> "{$root}/templatesDefaultSite/search.HTMLtemplate",
				'fileListPage'			=> "{$root}/templatesDefaultSite/fileList.HTMLtemplate",
				'homePage'				=> "{$root}/templatesDefaultSite/home.HTMLtemplate",
				'uploadPage'			=> "{$root}/templatesDefaultSite/upload.HTMLtemplate",
				'headPagePart'			=> "{$root}/templatesDefaultSite/head.HTMLtemplate",
				'footPagePart'			=> "{$root}/templatesDefaultSite/footer.HTMLtemplate"
	),

	# Input Types
	'inputType'	=> array(
				'userGenericInput'			=> 1,
				'userHTMLInput'				=> 2
	),
	'emailSettings' => array(
				'email'					=> "noreply@mkblogging.me",
				'db'					=> array(
											'name'		=> "email_que",
											'NewsQue'	=> "news"
				)
	)
);
