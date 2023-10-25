<?php

require './view/header.php';
$html = "<form action=\"index.php?act=contacts&op=create\" method=\"post\">";
$html .= "<label for=\"name\">Name:</label><br>";
$html .= "<input type=\"text\" id=\"name\" name=\"name\" value=\"\" required><br>";
$html .= "<label for=\"phone\">Phone:</label><br>";
$html .= "<input type=\"text\" id=\"phone\" name=\"phone\" value=\"\" required><br>";
$html .= "<label for=\"email\">Email:</label><br>";
$html .= "<input type=\"text\" id=\"email\" name=\"email\" value=\"\" required><br>";
$html .= "<label for=\"address\">Address:</label><br>";
$html .= "<input type=\"text\" id=\"address\" name=\"address\" value=\"\" required><br><br>";
$html .= "<input type=\"submit\" name=\"create\" value=\"create\">";
$html .= "</form>";
print $html;
require './view/footer.php';

?>