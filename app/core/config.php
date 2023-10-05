<?php

// Display errors on(1) /off(0)
ini_set('display_errors', 1);


/**
 * Session config
 */
define("SESSION_LIFETIME", 60 * 60 * 24);   // 24 hours
// define("SESSION_LIFETIME", 10);  // 10 seconds

if ($_SERVER['SERVER_NAME'] == 'localhost') {

   /**
    * Server config
    */

   //  Root for any server
   // define("ROOT", "http://" . $_SERVER['SERVER_NAME'] . "/nerdtech/public");



   /**
    * Config for Local Server
    */

   // Root paths
   define("SERVER_ROOT", $_SERVER["DOCUMENT_ROOT"] . "/LifeLink");
   define("ROOT", "http://localhost/lifelink");
   define("PUBLIC_ROOT", ROOT . "/public");


   // Database config
   define("DB_HOST", "localhost");
   define("DB_NAME", "lifeline_db");
   define("DB_USER", "root");
   define("DB_PASSWORD", "");
   define("DB_DRIVER", "mysql");
} else {

   /**
    * Config for Live Server
    */

   // Root path
   define("SERVER_ROOT", $_SERVER["DOCUMENT_ROOT"]);
   define("ROOT", "https://lifelink.com");
   define("PUBLIC_ROOT", ROOT . "/public");

   // Database config
   define("DB_HOST", "localhost");
   define("DB_NAME", "");
   define("DB_USER", "");
   define("DB_PASSWORD", "");
   define("DB_DRIVER", "mysql");
}


/**
 * App info
 */
define("APP_NAME", "LifeLink");
define("APP_LOGO", PUBLIC_ROOT . "/assets/images/logo.png");
define("APP_LOGO2", PUBLIC_ROOT . "/assets/images/logon.png");
define("APP_ICON", PUBLIC_ROOT . "/assets/images/favicon.ico");
define("APP_DESC", "Description");
define("APP_EMAIL", "lifelink@gmail.com");
define("APP_TEL", "+94 77 1234 567");
define("APP_ADDRESS", " LifeLink, Sri Lanka");
define("EMAIL_PASSWORD", "");
