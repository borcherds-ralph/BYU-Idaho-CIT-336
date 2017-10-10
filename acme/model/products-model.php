<?php 

function addCategory($categoryName){
    $db = acmeConnect();
    // The SQL statement
    $sql = 'INSERT INTO categories (categoryName) VALUES (:categoryName)';
    // Create the prepared statement using the acme connection
    $stmt = $db->prepare($sql);
   
    // The next four lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':categoryName', $categoryName, PDO::PARAM_STR);
    
    // Insert the data
    $stmt->execute();

    // Ask how many rows changed as a result of our insert
    $rowsChanged = $stmt->rowCount();

    // Close the database interaction
    $stmt->closeCursor();
    // Return the indication of success (rows changed)
    return $rowsChanged;
}
function getProducts(){
    // Create a connection object from the acme connection function
    $db = acmeConnect();
    // The SQL statement to be used with the database
    $sql = 'SELECT invName, invDescription FROM inventory ORDER BY invName ASC';
    // The next line creates the prepared statement using the acme connection
    $stmt = $db->prepare($sql);
    // The next line runs the prepared statement
    $stmt->execute();
    // The next line gets the data from the database and
    // stores it as an array in the $products variable
    $products = $stmt->fetchAll();
    // The next line closes the interaction with the database
    $stmt->closeCursor();
    // The next line sends the array of data back to where the function
    // was called (this should be the controller)
    return $products;
}

function addProduct($invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $categoryId, $invVendor, $invStyle){
    // Create a connection object from the acme connection function
    $db = acmeConnect();
    // The SQL statement to be used with the database
    $sql = 'INSERT into inventory (invName, invDescription, invImage, invThumbnail, invPrice, invStock, invSize, invWeight, invLocation, categoryid, invVendor, invStyle) VALUES (:invName, :invDescription, :invImage, :invThumbnail, :invPrice, :invStock, :invSize, :invWeight, :invLocation, :categoryid, :invVendor, :invStyle)';

    // The next line creates the prepared statement using the acme connection
    $stmt = $db->prepare($sql);
    // The next few lines replace the placeholders in the SQL
    // statement with the actual values in the variables
    // and tells the database the type of data it is
    $stmt->bindValue(':invName', $invName, PDO::PARAM_STR);
    $stmt->bindValue(':invDescription', $invDescription, PDO::PARAM_STR);
    $stmt->bindValue(':invImage', $invImage, PDO::PARAM_STR);
    $stmt->bindValue(':invThumbnail', $invThumbnail, PDO::PARAM_STR);
    $stmt->bindValue(':invPrice', $invPrice, PDO::PARAM_INT );
    $stmt->bindValue(':invStock', $invStock, PDO::PARAM_INT );
    $stmt->bindValue(':invSize', $invSize, PDO::PARAM_INT );
    $stmt->bindValue(':invWeight', $invWeight, PDO::PARAM_INT );
    $stmt->bindValue(':invLocation', $invLocation, PDO::PARAM_STR);
    $stmt->bindValue(':categoryid', $categoryId, PDO::PARAM_INT );
    $stmt->bindValue(':invVendor', $invVendor, PDO::PARAM_STR);
    $stmt->bindValue(':invStyle', $invStyle, PDO::PARAM_STR);

    // The next line runs the prepared statement
    $stmt->execute();
    // The next line gets the data from the database and
    // stores it as an array in the $product variable
    $rowsChanged = $stmt->rowCount();
    // The next line closes the interaction with the database
    $stmt->closeCursor();
    // The next line sends the array of data back to where the function
    // was called (this should be the controller)
    return $rowsChanged;
}