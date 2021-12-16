<?php
$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];
$date = date('Y-m-d');

if (!$title) {
$errors[] = "The title is empty you should fill it";
}

if (!$price) {
$errors[] = "The price is empty you should fill it";
}


