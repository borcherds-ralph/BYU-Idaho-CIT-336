<?php

/*
 * ACME Controller
 */
// Get the database connection file
require_once 'library/connections.php';
require_once 'library/functions.php';

// Get the acme model for use as needed
require_once 'model/acme-model.php';

if ($_SERVER['HTTP_HOST'] == 'localhost') // or any other host
{
     $basepath = '/cit336/acme';
}

else
{
    $basepath = '/acme';
}

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
 $action = filter_input(INPUT_GET, 'action');
}



// Build the navigation
$categories = getCategories();
$navList = navList($categories);

 switch ($action){
    
    case 'anything':
    break;
    
    default:
        include './view/home.php';
    }