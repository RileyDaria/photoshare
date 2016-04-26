<?php
    require_once('CAS Php/includes/CAS/config.php');
    require_once('CAS Php/includes/CAS.php');
    error_reporting(E_ALL);
    ini_set('display_errors', '1');


    phpCAS::setDebug();
    phpCAS::client(CAS_VERSION_2_0, $cas_host, $cas_port, $cas_context);
    // #TODO MAKE SURE TO DO SERVER VALIDATION WITH CERT
    phpCAS::setNoCasServerValidation();
    //phpCAS::setCasServerCACert($cas_server_ca_cert_path);
?>