<?php

require './view/header.php';
$stripped_price = str_replace('€', '', $result[0]['product_price']);
$stripped_price = str_replace(' ', '', $stripped_price);
$stripped_price = str_replace(',', '.', $stripped_price);
$html = '<form action="index.php?act=products&op=update" method="post">';
$html .= '<label for="product_type_code">Product Type Code:</label><br>';
$html .= '<input type="number" id="product_type_code" name="product_type_code" value="' . $result[0]['product_type_code'] . '" required><br>';
$html .= '<label for="supplier_id">Supplier ID:</label><br>';
$html .= '<input type="number" id="supplier_id" name="supplier_id" value="' . $result[0]['supplier_id'] . '" required><br>';
$html .= '<label for="product_name">Product Name:</label><br>';
$html .= '<input type="text" id="product_name" name="product_name" value="' . $result[0]['product_name'] . '" required><br>';
$html .= '<label for="product_price">Product Price:</label><br>';
$html .= '<input type="number" id="product_price" name="product_price" step="0.01" value="' . $stripped_price . '" required><br>';
$html .= '<label for="other_product_details">Other Product Details:</label><br>';
$html .= '<input type="text" id="other_product_details" name="other_product_details" value="' . $result[0]['other_product_details'] . '" required><br>';
$html .= '<label for="exp_date">Experation date:</label><br>';
$html .= '<input type="date" id="exp_date" name="exp_date" value="' . $result[0]['exp_date'] . '" required><br><br>';
$html .= '<input type="hidden" name="id" value="' . $result[0]['product_id'] . '">';
$html .= '<input type="submit" name="update" value="Update">';
$html .= '</form>';
print $html;
require './view/footer.php';

?>