<?php

if ($_SERVER['SERVER_NAME'] == "localhost") {

// CONFIGRAÇÕES DO BANCO ####################

    define('HOST', 'localhost');
    define('USER', 'postgres');
    define('PASS', 'root');
    define('DBSA', 'csf');

// DEFINE IDENTIDADE DO SITE ################
    define('SITENAME', 'CSF');
    define('SITEDESC', '');

// DEFINE A BASE DO SITE ####################
    define('BASE', 'https://localhost/heroku/csf/');
    define('HOME', 'https://localhost/heroku/csf/');
} else {

// CONFIGRAÇÕES DO BANCO ####################
    define('HOST', 'localhost');
    define('USER', 'postgres');
    define('PASS', 'root');
    define('DBSA', 'csf');

// DEFINE IDENTIDADE DO SITE ################
    define('SITENAME', 'CSF');
    define('SITEDESC', '');

// DEFINE A BASE DO SITE ####################
    define('BASE', 'https://localhost/heroku/csf/');
    define('HOME', 'https://localhost/heroku/csf/');
}

var_dump("Ricardo Guntzell");