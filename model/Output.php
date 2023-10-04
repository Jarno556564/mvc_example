<?php

class Output
{
    public function createTable($entries, $act, $op1, $op2, $op3, $op4, $id_name)
    {
        $tableheader = false;
        $html = "";
        $html .= "<button class='button'><a onclick=\"createAjaxRequest('index.php?act=$act&op=create', 'main')\">Create new $op1</a></button>";
        $html .= '<table>';
        foreach ($entries as $row) {
            if ($tableheader == false) {
                $html .= "<tr>";
                foreach ($row as $key => $value) {
                    $html .= "<th>" . $key . "</th>";
                }
                $html .= "<th>actions</th>";
                $html .= "</tr>";
                $tableheader = true;
            }
            $html .= "<tr>";
            foreach ($row as $key => $value) {
                $html .= "<td name='" . $key . "'>" . $value . "</td>";
            }
            $html .= "<td>
                <button class='button' onclick=\"createAjaxRequest('index.php?act=$act&op=$op2&id=" . $row[$id_name] . "', 'main')\"><i class='fa-brands fa-readme'></i> Read</button>
                <button class='button' onclick=\"createAjaxRequest('index.php?act=$act&op=$op3&id=" . $row[$id_name] . "', 'main')\"><i class='fa-solid fa-pen'></i> Update</button>
                <button class='button' onclick=\"createAjaxRequest('index.php?act=$act&op=$op4&id=" . $row[$id_name] . "', 'main')\"><i class='fa-solid fa-circle-minus'></i> Delete</button>
                    </td>";
            $html .= "</tr>";
        }
        $html .= "</table>";
        return $html;
    }

    public function createList($entries)
    {
        $html = '<ul>';
        foreach ($entries as $entery) {
            foreach ($entery as $key => $value) {
                $html .= "<li name='" . $key . "'>" . $value . "</li>";
            }
        }
        $html .= '</ul>';
        return $html;
    }

    public function createUpdateContactForm($res)
    {
        $html = "";
        $html .= "<form action=\"index.php?act=contacts&op=update\" method=\"post\" onsubmit=\"createAjaxRequest('index.php?act=contacts&op=update&id=' + this.value, 'main')\">";
        $html .= "<label for=\"name\">Name:</label><br>";
        $html .= "<input type=\"text\" id=\"name\" name=\"name\" value=\"" . $res[0]['name'] . "\" required><br>";
        $html .= "<label for=\"phone\">Phone:</label><br>";
        $html .= "<input type=\"text\" id=\"phone\" name=\"phone\" value=\"" . $res[0]['phone'] . "\" required><br>";
        $html .= "<label for=\"email\">Email:</label><br>";
        $html .= "<input type=\"text\" id=\"email\" name=\"email\" value=\"" . $res[0]['email'] . "\" required><br>";
        $html .= "<label for=\"address\">Address:</label><br>";
        $html .= "<input type=\"text\" id=\"address\" name=\"address\" value=\"" . $res[0]['address'] . "\" required><br><br>";
        $html .= "<input type=\"hidden\" name=\"id\" value=\"" . $res[0]['id'] . "\">";
        $html .= "<input type=\"submit\" name=\"update\" value=\"Update\">";
        $html .= "</form>";
        print $html;
    }

    public function createNewContactForm()
    {
        $html = "";
        $html .= "<form action=\"index.php?act=contacts&op=create\" method=\"post\" onsubmit=\"createAjaxRequest('index.php?act=contacts&op=create', 'main')\">";
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
    }

    public function createDropdown($entries)
    {
        $html = "<form>";
        $html .= "<label for='name'>Choose a contact: </label>";
        $html .= "<select name='name' id='name' onchange=\"createAjaxRequest('index.php?op=readDropdown&id=' + this.value, 'main')\">";
        $html .= "<option disabled selected value>select a contact</option>";
        foreach ($entries as $entry) {
            $splitName = explode(' ', $entry['name']);
            $firstname = $splitName[0];
            $html .= "<option value='" . $entry['id'] . "'>" . $firstname . "</option>";
        }
        $html .= "</select>";
        $html .= "</form>";
        return $html;
    }

    public function createSearchBar()
    {
        $html = "<form action=\"index.php?op=readSearchBar\" method=\"post\" onsubmit=\"createAjaxRequest('index.php?op=readSearchBar' + this.value, 'main')\">";
        $html .= "<label for='search'>Search: </label>";
        $html .= "<input type='text' name='search' id='search'>";
        $html .= "</input>";
        $html .= "</form>";
        return $html;
    }

    public function createNewProductForm()
    {
        $html = "";
        $html .= "<form action=\"index.php?act=products&op=create\" method=\"post\" onsubmit=\"createAjaxRequest('index.php?act=products&op=create', 'main')\">";
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
    }

    public function createUpdateProductForm($res)
    {
        $html = "";
        $html .= "<form action=\"index.php?act=products&op=update\" method=\"post\" onsubmit=\"createAjaxRequest('index.php?act=products&op=update&product_id=' + this.value, 'main')\">";
        $html .= "<label for=\"product_type_code\">Product Type Code:</label><br>";
        $html .= "<input type=\"text\" id=\"product_type_code\" name=\"product_type_code\" value=\"" . $res[0]['product_type_code'] . "\" required><br>";
        $html .= "<label for=\"supplier_id\">Supplier ID:</label><br>";
        $html .= "<input type=\"text\" id=\"supplier_id\" name=\"supplier_id\" value=\"" . $res[0]['supplier_id'] . "\" required><br>";
        $html .= "<label for=\"product_name\">Product Name:</label><br>";
        $html .= "<input type=\"text\" id=\"product_name\" name=\"product_name\" value=\"" . $res[0]['product_name'] . "\" required><br>";
        $html .= "<label for=\"product_price\">Product Price:</label><br>";
        $html .= "<input type=\"text\" id=\"product_price\" name=\"product_price\" value=\"" . $res[0]['product_price'] . "\" required><br>";
        $html .= "<label for=\"other_product_details\">Other Product Details:</label><br>";
        $html .= "<input type=\"text\" id=\"other_product_details\" name=\"other_product_details\" value=\"" . $res[0]['other_product_details'] . "\" required><br><br>";
        $html .= "<input type=\"hidden\" name=\"product_id\" value=\"" . $res[0]['product_id'] . "\">";
        $html .= "<input type=\"submit\" name=\"update\" value=\"Update\">";
        $html .= "</form>";
        print $html;
    }

}

?>