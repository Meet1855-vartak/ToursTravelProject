<?php
// ---------------------------
// Render PostgreSQL connection
// ---------------------------

// Replace these values with your Internal Database URL details
$host = "1. dpg-d377ss7fte5s73b19vt0-a";       // e.g., tours-travel-db
$port = "5432";            // default PostgreSQL port
$dbname = "toursdb_5tku";   // e.g., toursdb
$user = "toursuser";   // e.g., toursuser
$password = "qLFj0bUpptb7oCLtuVhk7p7m66ictlFs"; // Render-generated password

// Connect to PostgreSQL
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    die("❌ Connection failed: " . pg_last_error());
}

// ---------------------------
// Get form data
// ---------------------------
$name = $_POST['name'];
$email = $_POST['email'];
$password_input = $_POST['password']; // You can hash this for security
$destination = $_POST['destination'];
$budget = $_POST['budget'];
$travel_date = $_POST['travel_date'];

// Optional: hash password for security
$hashed_password = password_hash($password_input, PASSWORD_DEFAULT);

// ---------------------------
// Insert data into database
// ---------------------------
$query = "INSERT INTO user_travel_info (name, email, password, destination, budget, travel_date)
          VALUES ($1, $2, $3, $4, $5, $6)";

$result = pg_query_params($conn, $query, [$name, $email, $hashed_password, $destination, $budget, $travel_date]);

if ($result) {
    echo "<h2 style='text-align:center; margin-top:50px;'>✅ Your details have been submitted successfully!</h2>";
} else {
    echo "<h2 style='text-align:center; margin-top:50px; color:red;'>❌ Error submitting data: " . pg_last_error($conn) . "</h2>";
}

// Close connection
pg_close($conn);
?>
