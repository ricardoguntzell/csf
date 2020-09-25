<?php

if ($_SERVER['SERVER_NAME'] == "localhost") {

// CONFIGRAÇÕES DO BANCO ####################

    define('HOST', 'localhost');
    define('USER', 'postgres');
    define('PORT', '5432');
    define('PASS', 'root');
    define('DBSA', 'postgres');

// DEFINE IDENTIDADE DO SITE ################
    define('SITENAME', 'CSF');
    define('SITEDESC', '');

// DEFINE A BASE DO SITE ####################
    define('BASE', 'https://localhost/heroku/csf/');
    define('HOME', 'https://localhost/heroku/csf/');
} else {

// CONFIGRAÇÕES DO BANCO ####################
    define('HOST', 'ec2-54-160-120-28.compute-1.amazonaws.com');
    define('USER', 'ednzouutikxyov');
    define('PORT', '5432');
    define('PASS', 'ae8be8324f02f0f56357f11c0f4281911d80af1d05ceadaa2d5a964a4d19d5fb');
    define('DBSA', 'd28oo12gc3ausv');

// DEFINE IDENTIDADE DO SITE ################
    define('SITENAME', 'CSF');
    define('SITEDESC', '');

// DEFINE A BASE DO SITE ####################
    define('BASE', 'https://gtcrm.herokuapp.com/');
    define('HOME', 'https://gtcrm.herokuapp.com/');
}

var_dump("Ricardo Guntzell");