<?php  //if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/* End of file constants.php */
/* Location: ./application/config/constants.php */





//Custom Constant for website
define('DOC_ROOT',"http://localhost/iuqms/");
define('PUBLIC_ROOT',DOC_ROOT."public/");
define('IMAGES',DOC_ROOT."public/images/");
define('CSS',DOC_ROOT."public/css/");
define('JS',DOC_ROOT."public/js/");
define('FLASH',DOC_ROOT."public/flash/");
define('THUMBPHP',DOC_ROOT."public/thumb.php/?src=");
define('FONT',DOC_ROOT."public/font/");
define('ADMIN_PUBLIC_ROOT',DOC_ROOT."public/administrator/");
define('ADMIN_ASSETS',DOC_ROOT."public/administrator/assets/");
define('ADMIN_JS',DOC_ROOT."public/administrator/js/");
define('SITE_URL',DOC_ROOT."index.php/");
define('DIR_PATH',$_SERVER['DOCUMENT_ROOT']."/iuqms/");
