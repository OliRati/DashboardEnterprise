<?php
// This is a sample file for project configuration
// You must set the required values for your Host
// and save it as .env.php

/*
 * Enable more debug outputs
 */
const ENABLE_DEBUG = 'on';

/*
 * Path to the application from Web server root
 */
const WEB_ROOT = '/devweb-php/AgenceTaxis';

/*
 * Absolute path to PHP server files
 */
define( 'PHP_ROOT', $_SERVER['DOCUMENT_ROOT'] . WEB_ROOT );

/*
 * Database Connexion infos
 */

// Host name for mysql server
const DB_HOSTNAME = 'localhost';

// Database name 
const DB_NAME = 'entreprise';

// Database user
const DB_USER = 'root';

// Database password
const DB_PASSWORD = '';

// Database charset to be used
const DB_CHARSET = 'utf8mb4';
