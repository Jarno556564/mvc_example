<?php

require './view/header.php';
$html = "<form action=\"index.php?act=products&op=create\" method=\"post\">";
$html .= "<label for=\"product_type_code\">Product Type Code:</label><br>";
$html .= "<input type=\"text\" id=\"product_type_code\" name=\"product_type_code\" value=\"\" required><br>";
$html .= "<label for=\"supplier_id\">Supplier ID:</label><br>";
$html .= "<input type=\"text\" id=\"supplier_id\" name=\"supplier_id\" value=\"\" required><br>";
$html .= "<label for=\"product_name\">Product Name:</label><br>";
$html .= "<input type=\"text\" id=\"product_name\" name=\"product_name\" value=\"\" required><br>";
$html .= "<label for=\"product_price\">Product Price:</label><br>";
$html .= "<input type=\"text\" id=\"product_price\" name=\"product_price\" value=\"\" required><br>";
$html .= "<label for=\"other_product_details\">Other Product Details:</label><br>";
$html .= "<input type=\"text\" id=\"other_product_details\" name=\"other_product_details\" value=\"\" required><br><br>";
$html .= "<input type=\"submit\" name=\"create\" value=\"Create\">";
$html .= "</form>";
print $html;
require './view/footer.php';

?>