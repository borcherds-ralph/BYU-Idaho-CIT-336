<?php

/*
 * ACME reviews Controller
 */


// Create or access a Session
session_start();

// Get the database connection file
require_once '../library/connections.php';
require_once '../library/functions.php';
// Get the acme model for use as needed
require_once '../model/acme-model.php';
// Get the accounts model
require_once '../model/accounts-model.php';
// Get the products model
require_once '../model/products-model.php';
// Get the Reviews
require_once '../model/reviews-model.php';



// Set base path depending on localhost vs server
$basepath = setBasePath();
$imgpath = setImagePath();


// Check if the firstname cookie exists, get its value
if (isset($_SESSION['loggedin'])) {
    if(isset($_COOKIE['firstname'])){
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
    }
} 

$doc = $_SERVER['REQUEST_URI'];
if (strpos($doc, '500.php') == true || strpos($doc, 'accounts') == true) {
    $path = "../";
}

// This section of code checks to see if the input is a POST or GET.
// If it is a GET then it reads the input for the page to load else
// it reads the add inventory item or category item and adds it to the database.
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
    $action = filter_input(INPUT_GET, 'action');
}

$type = filter_input(INPUT_GET, 'invId', FILTER_SANITIZE_STRING);
$prodcat = urldecode(filter_input(INPUT_GET, 'prodcat', FILTER_SANITIZE_STRING));

// Build the navigation
$categories = getCategories();
$navList = navList($categories, $type, $prodcat);

$clientId = $_SESSION['clientData']['clientId'];

switch ($action) {
    case 'reviewadd':
        $referer = $_SERVER['HTTP_REFERER'];
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
        $clientId = filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT);
        $reviewText = filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING);
        
       
        $product = getProductInfo($invId);
        
        

        if(empty($reviewText)) {
            $reviewMessage = "<h2>You must fill all the fields.</h2>";
            // Reviews display code
            $reviewDisplay = reviewsGet($invId);
            if(count($reviewDisplay) > 0){
                $reviewList = buildProductReviews($reviewDisplay);
            } else {
                $message = "<p>There are no reviews for this product.</p>";
            }
            include '../view/productdetails.php';
            break;
        }

        $result = reviewCreate($reviewText, $invId, $clientId);

        if ($result > 0) {
            $reviewMessage = "<h3 class='success'>Thank you for submitting a review.</h3>";
        } else {
            $reviewMessage = "<h3 class='failure'>There was an issue submitting your review.  Please try again</h3>";
        }
        // Reviews display code
        $reviewDisplay = reviewsGet($invId);
        if(count($reviewDisplay) > 0){
            $reviewList = buildProductReviews($reviewDisplay);
        } else {
            $message = "<p>There are no reviews for this product.</p>";
        }
       
        // call the product detail display when done.
        // header("Location: $referer&result=$result");
        include '../view/productdetails.php';
        break;


    case 'mod':
        $reviewId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $review = reviewGetClient($reviewId);
        if(count($review)<1){
            $message = 'Sorry, review could not be found.';
        }
        include '../view/review-edit.php';
        break;

    case 'reviewupdate':
        $reviewText = filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING);
        $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_NUMBER_INT);
        
        if(empty($reviewText)) {
            $reviewMessage = "<h2>You must fill all the fields.</h2>";

            $reviews = reviewGetAllClient($clientId);
            $reviewList = buildClientReviews($reviews);
            include '../view/admin.php';
            break;
        }
        
        $result = reviewUpdate($reviewId, $reviewText);

        if ($result > 0 ) {
            $message = "<h3>Thank you for updating the review. It was succesfully updated<?h3>";
        } else {
            $message = "<h3>There was an error updating the review. Please try again later</h3>";
        }

        $reviews = reviewGetAllClient($clientId);
        $reviewList = buildClientReviews($reviews);
        include '../view/admin.php';

        break;

    case 'reviewdeleteconfirm':
        $reviewId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $review = reviewGetClient($reviewId);
        if(count($review)<1){
            $message = 'Sorry, review could not be found.';
        }
        include '../view/review-delete.php';
        break;

    case 'reviewdelete':
        
        $reviewId = filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_NUMBER_INT);

        $deleteResult = reviewDelete($reviewId);
        if ($deleteResult) {
            $message = "<p class='notice'>Congratulations, the review was successfully deleted.</p>";
         } else {
            $message = "<p class='notice'>Error: $reviewId was not deleted.</p>";
        }
        
        $_SESSION['message'] = $message;
        $reviews = reviewGetAllClient($clientId);
        $reviewList = buildClientReviews($reviews);
        include '../view/admin.php';
        break;

    default:
        if (isset($_SESSION['loggedin'])) {
            $reviews = reviewGetAllClient($clientId);
            $reviewList = buildClientReviews($reviews);
            include '../view/admin.php';
        } else {
            header("location: ../");
        }
        break;



}
