<?php


// Create Review
function reviewCreate($reviewText, $invId, $clientId) {
    $db = acmeConnect();
    $sql = 'INSERT INTO reviews(reviewText, invId, clientId) VALUES (:reviewText, :invId, :clientId)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

// Get All Review for a product
function reviewsGet($invId) {
    $db = acmeConnect();
    $sql = 'SELECT rv.*, cl.clientFirstName, cl.clientLastName FROM reviews AS rv JOIN clients AS cl ON rv.clientId = cl.clientId WHERE invId = :invId ORDER BY reviewDate DESC';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':invId', $invId, PDO::PARAM_INT);
    $stmt->execute();
    $reviewInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $reviewInfo;
}

// Get specific review for a loggedin client
function reviewGetClient($reviewId) {
    $db = acmeConnect();
    $sql = 'SELECT * FROM reviews WHERE reviewId = :reviewId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->execute();
    $reviewInfo = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $reviewInfo;
}


// Get all reviews for a client
function reviewGetAllClient($clientId) {
    $db = acmeConnect();
    $sql = 'SELECT * FROM reviews WHERE clientId = :clientId ORDER BY reviewDate DESC';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':clientId', $clientId, PDO::PARAM_INT);
    $stmt->execute();
    $reviewInfo = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $reviewInfo;
}

// Update a review. Text of review only
function reviewUpdate($reviewId, $reviewText) {
    $db = acmeConnect();
    $sql = 'UPDATE reviews SET reviewText = :reviewText WHERE reviewId = :reviewId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->bindValue(':reviewText', $reviewText, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

// Delete Review
function reviewDelete($reviewId) {
    $db = acmeConnect();
    $sql = 'DELETE FROM reviews WHERE reviewId = :reviewId';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':reviewId', $reviewId, PDO::PARAM_INT);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

