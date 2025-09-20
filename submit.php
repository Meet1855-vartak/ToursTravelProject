<?php
// ---------- Render PostgreSQL Connection ----------
// Replace these with your actual Render DB values
$host = "1. dpg-d377ss7fte5s73b19vt0-a"; // your host
$port = "5432";                                    // default PostgreSQL port
$dbname = "toursdb_5tku";                         // your database name
$user = "toursuser";                            // your DB username
$password = "qLFj0bUpptb7oCLtuVhk7p7m66ictlFs";                        // your DB password

$connectionString = "host=$host port=$port dbname=$dbname user=$user password=$password sslmode=require";

$conn = pg_connect($connectionString);

if (!$conn) {
    die("Error in connection: " . pg_last_error());
}

// ---------- Insert Data from Form ----------
$login = $_POST['login'] ?? '';
$email = $_POST['email'] ?? '';
$destination = $_POST['destination'] ?? '';
$budget = $_POST['budget'] ?? '';
$date = $_POST['date'] ?? '';

$query = "INSERT INTO user_travel_info (login, email, destination, budget, travel_date)
          VALUES ('$login', '$email', '$destination', '$budget', '$date')";

$result = pg_query($conn, $query);

if (!$result) {
    die("Error in SQL query: " . pg_last_error());
} else {
    echo "Data inserted successfully!";
}

pg_close($conn);
?>
