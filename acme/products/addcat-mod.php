<?php

    $categoryName = filter_input(INPUT_POST, 'categoryName');

    if (empty($categoryName)){
        $message = '<p>Please provide information for all empty fields.</p>';
        include '../view/addcat.php';
        exit; 
    }

    // Send the data to the model -->
    $catOutcome = addCategory($categoryName);

    // Check and report the result
    if($catOutcome === 0){
        $message = "<p>Sorry adding $categoryName failed. Please try again.</p>";
        include '../view/addcat.php';
        exit;
    }
