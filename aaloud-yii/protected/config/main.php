<?php

// uncomment the following to define a path alias
Yii::setPathOfAlias('local', 'path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
define('STORE_FRONT_ID', 5);


define('STORE_WEB_URL', 'http://europa.hungamatech.com');

define('USER_REMOTE_IP', 'REMOTE_ADDR');



return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Aaloud',
    'theme' => 'aaloud',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.helpers.*',
        'application.helpers.*',
    ),
    'modules' => array(
        'backend',
        'siteadmin',
				'mzone',
				'awards2011',
        // uncomment the following to enable the Gii tool

        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '9869',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
    ),
    // application components
    'components' => array(
	

	
        'image' => array(
            'class' => 'application.extensions.image.CImageComponent',
            // GD or ImageMagick
            'driver' => 'GD',
            // ImageMagick setup path
            'params' => array('directory' => '/opt/local/bin'),
        ),
        'image' => array(
            'class' => 'application.extensions.image.CImageComponent',
            // GD or ImageMagick
            'driver' => 'GD',
            // ImageMagick setup path
            'params' => array('directory' => '/opt/local/bin'),
        ),
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
        ),
        // uncomment the following to enable URLs in path-format

        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => true,
            'rules' => array(
                
								'' => 'site/index',
                'artist/directory/<char>' => 'artist/directory',
              //  'artist/<id:\d+>/<name:\d+>' => 'artist/artistdetail',
								'artists/<name>/<id>' => 'artist/artistdetail',				
								'artists/genre/<name>/<id>'=>'artist/genresdir',
								'artist/languages/<name>-singer/<id>'=>'artist/languagedir',
								'videos/directory/<char>/' => 'videos/directory',
								'videos/genre/<name>/<id>' => 'videos/genredirectory',
								'videos/languages/<name>/<id>' => 'videos/langdirectory',
								'news/details/id/<id:\d+>' => 'news/details',
								
								/*Artist Section*/
								'artists/' => 'artist/index',
								'artists/popular-artists/' => 'artist/popularartist',
								'artists/languages/' => 'artist/language',
								'artists/genres/' => 'artist/genres',
								/*Artist Ends*/
								
								/*Videos Section*/
								'videos/<name>/<id>' => 'videos/index',
								'videos' => 'videos/index',
								'videos/popular-videos/<name>/<id>' => 'videos/popularvideos',
								'videos/popular-videos' => 'videos/popularvideos',
								'videos/languages/' => 'videos/langlist',
								'videos/genre/' => 'videos/genrelist',
								'genre/search/<char>' => 'genre/search',
								'languages/search/<char>' => 'languages/search',
								/*Videos Ends*/
								
								/*Footer Section*/
								'about-artist-aloud/' => 'site/aboutus',
								'feedback/' => 'site/feedback',
								'disclaimer/' => 'site/disclaimer',
								'payment-partners/' => 'site/partners',
								'privacy-policy/' => 'site/privacy',
								'conditions-of-use/' => 'site/conditions',
								/*FS ends*/
            ),
        ),
        /*'db' => array(
            'connectionString' => 'sqlite:' . dirname(__FILE__) . '/../data/hungamaone.db',
        ),*/
        // uncomment the following to use a MySQL database

        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=artistaloud',
            //'connectionString' => 'mysql:host=localhost;dbname=hungamaone',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ),
        'db2' => array(
            'class' => 'CDbConnection',
            'connectionString' => 'mysql:host=localhost;dbname=db_artistaloud',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ),

        /*'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=aaloud_artistaloud',
            'emulatePrepare' => true,
            'username' => 'aaloud_cms',
            'password' => 'ZQ}ZUa5e;SAe',
            'charset' => 'utf8',
        ),
        'db2' => array(
            'class' => 'CDbConnection',
            'connectionString' => 'mysql:host=localhost;dbname=aaloud_aa_metasea',
            'emulatePrepare' => true,
            'username' => 'aaloud_metasea',
            'password' => 'metasea12345',
            'charset' => 'utf8',
        ),*/
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ), */
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // // this is used in contact page
        // 'adminEmail' => 'webmaster@example.com',
        // 'STORE_FRONT_ID' => 5,
        // 'STORE_WEB_URL' => 'http://localhost/aaloud-yii',
        // 'USER_REMOTE_IP' => $_SERVER['REMOTE_ADDR'],
		// 'top10fullpath'=>'http://delivery.hungama.com/SecureStreaming/stream-request',
		// 'Artist_search'=>"http://204.236.200.195:9000/action=Query&maxresults=50&combine=simple&minscore=60&print=fields&printfields=drereference,dretitle,artistid,category&databasematch=artistaloud&Text=Artist:CATEGORY+AND+win",
		// 'Video_search'=>"http://204.236.200.195:9000/action=Query&maxresults=50&combine=simple&minscore=60&print=fields&printfields=drereference,dretitle,artist_id,category&databasematch=artistaloud&Text=Video:CATEGORY+AND+win",
	
	// 'appId'  => '260523717361594',
		// 'secret' => '86137af7194fa26a79eb86ed8ba664f3',
		// 'cookie' => true,
		// 'appName' => 'Aloud Awards 2011',
		   // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
		'STORE_FRONT_ID' => 5,
        'STORE_WEB_URL' => 'http://localhost/aaloud-yii/',
        'STORE_WEB_URL_BANNER' => 'http://localhost/aaloud-yii/',
        'USER_REMOTE_IP' => $_SERVER['REMOTE_ADDR'],
		'STORE_WEBSITE_SECURE_URL'=>'http://login.hungamatech.com',
		'WOWZA_URL'=>'http://istream.bollywoodhungama.com/vods3/_definst_/mp4:amazons3/CONTENT_URL/playlist.m3u8',
		'FROM' => "lavket.rai@fortune4.in",
		// 'Artist_search'=>"http://122.248.211.102:9000/action=Query&maxresults=50&combine=simple&minscore=60&print=fields&printfields=drereference,dretitle,artistid,category&databasematch=artistaloud&Text=Artist:CATEGORY+AND+win",
		// 'Video_search'=>"http://122.248.211.102:9000/action=Query&maxresults=50&combine=simple&minscore=60&print=fields&printfields=drereference,dretitle,artist_id,category&databasematch=artistaloud&Text=Video:CATEGORY+AND+win",
		
		'Artist_search'=>"http://204.236.200.195:9000/action=Query&maxresults=50&combine=simple&minscore=60&print=fields&printfields=drereference,dretitle,artistid,category&databasematch=artistaloud&fieldText=MATCH%7BArtist%7D:CATEGORY&text=win",
		'Video_search'=>"http://204.236.200.195:9000/action=Query&maxresults=50&combine=simple&minscore=60&print=fields&printfields=drereference,dretitle,artist_id,category&databasematch=artistaloud&FieldText=MATCH{Video}:CATEGORY&text=win",
		
		
		'appId'  => '260523717361594',
		'secret' => '86137af7194fa26a79eb86ed8ba664f3',
		'cookie' => true,
		'appName' => 'Aloud Awards 2011',
		'artist_old_url'=>'http://localhost/aaloud-yii/index.php/artists/artistname/id',
		'artist_new_url'=>'http://localhost/aaloud-yii/index.php/artistname',
		
		
		
    ),
);