<?php
require 'header.php';
$html = "";
$html .= "<form action=\"index.php?op=update\" method=\"post\">";
$html .= "<label for=\"name\">Name:</label><br>";
$html .= "<input type=\"text\" id=\"name\" name=\"name\" value=\"" . $res[0]['name'] . "\"><br>";

$html .= "<label for=\"phone\">Phone:</label><br>";
$html .= "<input type=\"text\" id=\"phone\" name=\"phone\" value=\"" . $res[0]['phone'] . "\"><br>";

$html .= "<label for=\"email\">Email:</label><br>";
$html .= "<input type=\"text\" id=\"email\" name=\"email\" value=\"" . $res[0]['email'] . "\"><br>";

$html .= "<label for=\"address\">Address:</label><br>";
$html .= "<input type=\"text\" id=\"address\" name=\"address\" value=\"" . $res[0]['address'] . "\"><br><br>";

$html .= "<input type=\"hidden\" name=\"id\" value=\"" . $res[0]['id'] . "\">";
$html .= "<input type=\"submit\" name=\"update\" value=\"Update\">";
$html .= "</form>";
echo $html;
if(isset($msg)) {
    echo $msg;
}
require 'footer.php';
