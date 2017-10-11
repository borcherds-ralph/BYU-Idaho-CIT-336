</php
if ($action2 == "addcat") {
    $categoryName = filter_input(INPUT_POST, 'categoryName');

    if (empty($categoryName)){
        $message = '<p>Please provide information for all empty fields.</p>';
        include '../view/addcat.php';
        exit; 
    }

        // Send the data to the model
    $catOutcome = addCategory($categoryName);

    // Check and report the result
    if($catOutcome === 1){
        $message = "<p>Thanks for adding the category $categoryName.</p>";
        include '../view/addcat.php';
        exit;
    } else {
        $message = "<p>Sorry adding $categoryName failed. Please try again.</p>";
        include '../view/addcat.php';
        exit;
    }
}