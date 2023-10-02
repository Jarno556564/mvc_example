<?php

class Output
{
    public function createTable($entries)
    {
        $tableheader = false;
        $html = "";
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
                <button class='button' onclick=\"createAjaxRequest('index.php?op=read&id=" . $row['id'] . "', 'main')\"><i class='fa-brands fa-readme'></i> Read</button>
                <button class='button' onclick=\"createAjaxRequest('index.php?op=update&id=" . $row['id'] . "', 'main')\"><i class='fa-solid fa-pen'></i> Update</button>
                <button class='button' onclick=\"createAjaxRequest('index.php?op=delete&id=" . $row['id'] . "', 'main')\"><i class='fa-solid fa-circle-minus'></i> Delete</button>
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
}

?>