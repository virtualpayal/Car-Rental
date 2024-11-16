<?php
session_start();
error_reporting(0);
include('includes/config.php');

// Check if a rating has been submitted
if (isset($_POST['submitRating'])) {
    $carId = $_POST['carId'];
    $rating = $_POST['rating'];
    $userId = $_SESSION['user_id']; // Assumes user ID is stored in the session

    // Insert the rating into the ratings table
    $sql = "INSERT INTO ratings (car_id, user_id, rating) VALUES (:carId, :userId, :rating)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':carId', $carId, PDO::PARAM_INT);
    $query->bindParam(':userId', $userId, PDO::PARAM_INT);
    $query->bindParam(':rating', $rating, PDO::PARAM_INT);
    $query->execute();

    // Check if the rating was successfully inserted
    if ($query->rowCount() > 0) {
        $msg = "Thank you for your rating!";
    } else {
        $error = "Something went wrong. Please try again.";
    }
}

// Fetch car details and average rating
$carId = intval($_GET['vhid']);
$sql = "SELECT tblvehicles.*, tblbrands.BrandName, AVG(ratings.rating) as avgRating
        FROM tblvehicles 
        JOIN tblbrands ON tblbrands.id = tblvehicles.VehiclesBrand
        LEFT JOIN ratings ON ratings.car_id = tblvehicles.id
        WHERE tblvehicles.id = :carId
        GROUP BY tblvehicles.id";
$query = $dbh->prepare($sql);
$query->bindParam(':carId', $carId, PDO::PARAM_INT);
$query->execute();
$result = $query->fetch(PDO::FETCH_OBJ);

if ($result) {
    $averageRating = $result->avgRating ? round($result->avgRating, 1) : 'No ratings yet';
} else {
    $error = "Car not found";
}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Details and Ratings</title>
    <!-- Include your CSS and other header files -->
</head>
<body>
    <!-- Car Details Section -->
    <h1><?php echo htmlentities($result->BrandName); ?>, <?php echo htmlentities($result->VehiclesTitle); ?></h1>
    <p>Price per Day: NRP <?php echo htmlentities($result->PricePerDay); ?></p>
    <p>Fuel Type: <?php echo htmlentities($result->FuelType); ?></p>
    <p>Model Year: <?php echo htmlentities($result->ModelYear); ?></p>
    <p>Average Rating: <?php echo $averageRating; ?></p>

    <!-- Rating Form -->
    <h2>Submit Your Rating</h2>
    <?php if ($_SESSION['user_id']) { ?>
        <form method="post">
            <input type="hidden" name="carId" value="<?php echo $carId; ?>">
            <label for="rating">Rate this car (1-5):</label>
            <select name="rating" id="rating" required>
                <option value="">Select</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <button type="submit" name="submitRating">Submit</button>
        </form>
    <?php } else { ?>
        <p>Please <a href="login.php">log in</a> to submit a rating.</p>
    <?php } ?>

    <!-- Display messages -->
    <?php if ($msg) { echo "<div class='succWrap'>$msg</div>"; } ?>
    <?php if ($error) { echo "<div class='errorWrap'>$error</div>"; } ?>
</body>
</html>
