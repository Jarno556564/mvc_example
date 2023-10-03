
<?php
require 'header.php';
if (isset($_REQUEST['message'])) {
    echo "<p>" . $_REQUEST['message'] . "</p>";
}
echo $html;
require 'footer.php';