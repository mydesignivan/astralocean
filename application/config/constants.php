<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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

define('FOPEN_READ', 				'rb');
define('FOPEN_READ_WRITE',			'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 	'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 			'ab');
define('FOPEN_READ_WRITE_CREATE', 		'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 		'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',	'x+b');


/*
|--------------------------------------------------------------------------
| NOMBRE DE LAS TABLAS (BASE DE DATO)
|--------------------------------------------------------------------------
*/
define('TBL_USERS', 'users');
define('TBL_PRODUCTS', 'products');
define('TBL_PAGES', 'pages');


/*
|--------------------------------------------------------------------------
| MENSAJES DE ERROR
|--------------------------------------------------------------------------
*/
define('ERR_UPLOAD_NOTUPLOAD', 'El archivo de im&aacute; no ha podido llegar al servidor.');
define('ERR_UPLOAD_MAXSIZE', 'El tamaño del archivo debe ser menor a %s MB.');
define('ERR_UPLOAD_FILETYPE', 'El tipo de archivo es incompatible.');

define('ERR_DB_UPDATE', 'Ha ocurrido un error al tratar de actualizar los datos.');
define('ERR_DB_INSERT', 'Ha ocurrido un error al tratar de insertar los datos.');
define('ERR_DB_DELETE', 'Ha ocurrido un error al tratar de eliminar los datos.');

/*
|--------------------------------------------------------------------------
| EMAIL FORMULARIO CONSULTA DE LA PROP
|--------------------------------------------------------------------------
*/
$msg = '<b>Name:</b> %s<br /><br />';
$msg.= '<b>E-mail:</b> %s<br /><br />';
$msg.= '<b>Message:</b><hr color="#000000" />%s';
define('EMAIL_CONTACT_SUBJECT', 'Contact Form');
define('EMAIL_CONTACT_MESSAGE', $msg);

/*
|--------------------------------------------------------------------------
| UPLOAD FILE
|--------------------------------------------------------------------------
*/
define('UPLOAD_DIR', './uploads/');
define('UPLOAD_DIR_TMP', './uploads/tmp/');
define('UPLOAD_DIR_WATERMARK', './images/logo_watermark1.png');
define('UPLOAD_FILETYPE', 'gif|jpg|png');
define('UPLOAD_MAXSIZE', 2048); //Expresado en Kylobytes

define('IMAGE_THUMB_WIDTH', 270);
define('IMAGE_THUMB_HEIGHT', 146);
define('IMAGE_ORIGINAL_WIDTH', 800);
define('IMAGE_ORIGINAL_HEIGHT', 600);


/*
|--------------------------------------------------------------------------
| TITULOS DE LA WEB
|--------------------------------------------------------------------------
*/
define('TITLE_GLOBAL', 'Astral Ocean - ');
define('TITLE_INDEX', 'Home');
define('TITLE_PRODUCTS', 'Products');
define('TITLE_OURCOMPANY', 'Our Company');
define('TITLE_FACILITIES', 'Facilities');
define('TITLE_CONTACT', 'Contact');

/*
|--------------------------------------------------------------------------
| METATAG - PALABRAS CLAVES
|--------------------------------------------------------------------------
*/
define('META_KEYWORDS_GLOBALS', '');
define('META_KEYWORDS_INDEX', '');
define('META_KEYWORDS_OURCOMPANY', '');
define('META_KEYWORDS_FACILITIES', '');
define('META_KEYWORDS_PRODUCTS', '');
define('META_KEYWORDS_CONTACT', '');

/*
|--------------------------------------------------------------------------
| METATAG - DESCRIPCION
|--------------------------------------------------------------------------
*/
define('META_DESCRIPTION_GLOBALS', '');
define('META_DESCRIPTION_INDEX', '');
define('META_DESCRIPTION_OURCOMPANY', '');
define('META_DESCRIPTION_FACILITIES', '');
define('META_DESCRIPTION_PRODUCTS', '');
define('META_DESCRIPTION_CONTACT', '');


/* End of file constants.php */
/* Location: ./system/application/config/constants.php */