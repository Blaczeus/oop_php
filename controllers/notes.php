<?php
$heading = "My Notes";

$config = require 'config.php';
$db = new Database($config['database']);

$query = "SELECT * FROM notes WHERE user_id = :user_id";
$notes = $db->query($query, ['user_id' => 1])->find();

echo '<pre>';
var_dump($notes);
echo $notes['user_id'];

require "views/notes.view.php";
