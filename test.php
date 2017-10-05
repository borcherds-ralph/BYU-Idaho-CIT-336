<?php 
// Get the database connection file
require_once 'acme/library/connections.php';
// Get the acme model for use as needed
require_once 'acme/model/acme-model.php';

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
 $action = filter_input(INPUT_GET, 'action');
}
$basepath = "/cit336";

// Get the array of categories
$categories = getCategories();

// Build a navigation bar using the $categories array
$navList = "<ul id='navul'>";
if ($action == NULL) {
    $active = "class='active'"; 
}
$navList .= "<li $active><a href='$basepath/test.php' title='View the Acme home page'>Home</a></li>";
foreach ($categories as $category) {
    echo $category[categoryName]."<br>";
    if ($action == $category[categoryName]) {
        $active = "class='active'"; } else {$active = NULL;}
$navList .= "<li $active><a href='$basepath/test.php?action=$category[categoryName]' title='View our $category[categoryName] product line'>$category[categoryName]</a></li>";
}
$navList .= '</ul>';

echo "Action: " . $action;
echo $navList;

?>