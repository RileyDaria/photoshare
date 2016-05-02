<?php
    require_once('CAS Php/includes/CAS/config.php');
    require_once('CAS Php/includes/CAS.php');
    error_reporting(E_ALL);
    ini_set('display_errors', '1');


    phpCAS::setDebug();
    phpCAS::client(CAS_VERSION_2_0, $cas_host, $cas_port, $cas_context);
<<<<<<< HEAD
    // #TODO MAKE SURE TO DO SERVER VALIDATION WITH CERT
    phpCAS::setNoCasServerValidation();
    //phpCAS::setCasServerCACert($cas_server_ca_cert_path);
=======

    phpCAS::setNoCasServerValidation();
    //phpCAS::setCasServerCACert($cas_server_ca_cert_path); // #TODO MAKE SURE TO DO SERVER VALIDATION WITH CERT

    if(isset($_GET['signin'])&& !phpCAS::isAuthenticated()){
        phpCAS::forceAuthentication();
    }
    elseif(isset($_GET['signout'])) {
        phpCAS::logout();
    }
>>>>>>> 07a448505e0a0a2c4f4247a5a9dc90977c524b92
?>