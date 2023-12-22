<?php 
require_once('classes/config/initDBConnection.php');
require_once('classes/file upload/fileupload.class.php');
require_once('classes/errors/errors.class.php');
require_once('classes/sanitize/sanitize.class.php');
require_once('classes/products/productPush.class.php');
require_once('classes/products/productPull.class.php');
require_once('classes/products/productUpdate.class.php');
require_once('classes/products/productDelete.class.php');
require_once('classes/utils/utils.class.php');
require_once('classes/universal.class.php');

use DBTemplates\DBConnectionTemplate;
use ErrorManager\AdvertiserErros;
use SanitizeManager\NameSanitizer;
use SanitizeManager\PasswordSanitize;
use SanitizeManager\RecognizeNumberEmailSanitize;
use SanitizeManager\DescriptionSanitize;
use SanitizeManager\MonieSanitize;
use SanitizeManager\GeocoordSanitize;
use UserSessionManager\UserSessionPush;
use AdminiSessionManager\AdminiSessionPush;
use ProductManager\ProductPush;
use ProductManager\ProductPull;
use ProductManager\ProductUpdate;
use ProductManager\ProductSearch;
use ProductManager\ProductDelete;
use UtilityManager\UtilityPull;
use ProjectManager\ProjectOperations;

$DBConnectionTemplates = new DBConnectionTemplate();
$UserErrorsPool = new AdvertiserErros();
$NameSanitizer = new NameSanitizer();
$PasswordSanitize = new PasswordSanitize();
$RecognizeNumberEmailSanitize = new RecognizeNumberEmailSanitize();
$DescriptionSanitize = new DescriptionSanitize();
$MonieSanitize = new MonieSanitize();
$GeocoordSanitize = new GeocoordSanitize();
$FileUploadHandler = new FileUploadHandler();
$ProductPush = new ProductPush();
$ProductPull = new ProductPull();
$ProductUpdate = new ProductUpdate();
$ProductDelete = new ProductDelete();
$Utility = new UtilityPull();
$ProjectOperations = new ProjectOperations();
?>