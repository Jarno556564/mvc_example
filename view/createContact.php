<?php
require 'header.php';
$html = "";
$html .= "<form action=\"index.php?op=create\" method=\"post\">";
$html .= "<label for=\"name\">Name:</label><br>";
$html .= "<input type=\"text\" id=\"name\" name=\"name\" value=\"\"><br>";

$html .= "<label for=\"phone\">Phone:</label><br>";
$html .= "<input type=\"text\" id=\"phone\" name=\"phone\" value=\"\"><br>";

$html .= "<label for=\"email\">Email:</label><br>";
$html .= "<input type=\"text\" id=\"email\" name=\"email\" value=\"\"><br>";

$html .= "<label for=\"address\">Address:</label><br>";
$html .= "<input type=\"text\" id=\"address\" name=\"address\" value=\"\"><br><br>";

$html .= "<input type=\"submit\" name=\"create\" value=\"create\">";
$html .= "</form>";
echo $html;
if(isset($contacts)) {
    echo "New contact added with id " . $contacts;
}
require 'footer.php';