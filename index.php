<?php
require "functions.php";
require "Database.php";
require "Response.php";
require "router.php";

/*Connecting to database using php procedural
$conn = mysqli_connect("localhost", "root", "", "test");
if (!$conn) {
   die("Unable to connect to Database: ". mysqli_connect_error());
}
echo ("Connection Successful");

$sql = "SELECT * FROM posts";
$posts = mysqli_query($conn , $sql);
if (mysqli_num_rows($posts) >! 0){
    echo "No data found";
}else{
    foreach ($posts as $post) {
        echo "<li>{$post['title']} by {$post['fname']} {$post['lname']}</li>";
    }
}*/

/*Connecting to database using mysqli

conn = new mysqli("localhost","root", "", "test");
if ($conn->connect_error) {
    die("!Error: ". $conn->connect_error );
}
echo "Connected Successfully";

$statement = "SELECT * FROM posts";
$posts = $conn->query($statement);
if ($posts->num_rows > 0) {
    foreach ($posts as $post) {
        echo "<li>{$post['title']} by {$post['fname']} {$post['lname']}</li>";
    }
}*/
