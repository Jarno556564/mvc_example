<?php

require './view/header.php';
$html = "<form action=\"index.php?act=contacts&op=update\" method=\"post\">";
$html .= "<label for=\"name\">Name:</label><br>";
$html .= "<input type=\"text\" id=\"name\" name=\"name\" value=\"" . $result[0]['name'] . "\" required><br>";
$html .= "<label for=\"phone\">Phone:</label><br>";
$html .= "<input type=\"text\" id=\"phone\" name=\"phone\" value=\"" . $result[0]['phone'] . "\" required><br>";
$html .= "<label for=\"email\">Email:</label><br>";
$html .= "<input type=\"text\" id=\"email\" name=\"email\" value=\"" . $result[0]['email'] . "\" required><br>";
$html .= "<label for=\"address\">Address:</label><br>";
$html .= "<input type=\"text\" id=\"address\" name=\"address\" value=\"" . $result[0]['address'] . "\" required><br><br>";
$html .= "<input type=\"hidden\" name=\"id\" value=\"" . $result[0]['id'] . "\">";
$html .= "<input type=\"submit\" name=\"update\" value=\"Update\">";
$html .= "</form>";
print $html;
require './view/footer.php';

?>