<?php

/*
 * ACME Controller
 */
// Get the database connection file
require_once 'library/connections.php';
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

// Get the array of categories
$categories = getCategories();

// Build a navigation bar using the $categories array
$navList = "<ul id='navul'>";
if ($action == NULL) {
    $active = "class='active'"; 
}
$navList .= "<li $active><a href='$basepath/index.php' title='View the Acme home page'>Home</a></li>";
foreach ($categories as $category) {
    echo $category[categoryName]."<br>";
    if ($action == $category[categoryName]) {
        $active = "class='active'"; } else {$active = NULL;}
$navList .= "<li $active><a href='$basepath/index.php?action=$category[categoryName]' title='View our $category[categoryName] product line'>$category[categoryName]</a></li>";
}
$navList .= '</ul>';

 

 switch ($action){
    
    case 'anything':
    break;
    
    default:
        include './view/home.php';
    }