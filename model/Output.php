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
                      <button class='button'><a href='index.php?op=read&id=" . $row['id'] . "'><i class='fa-brands fa-readme'></i> Read</a></button>
                      <button class='button'><a href='index.php?op=update&id=" . $row['id'] . "'><i class='fa-solid fa-pen'></i> Update</a></button>
                      <button class='button'><a href='index.php?op=delete&id=" . $row['id'] . "'\"><i class='fa-solid fa-circle-minus'></i> Delete</a></button>
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
        $html = "<form action='index.php?op=readDropdown' method='post'>";
        $html .= "<label for='name'>Choose a contact: </label>";
        $html .= "<select name='name' id='name' onchange='readDropdown(this)'>";
        $html .= "<option disabled selected value>select a contact</option>";
        foreach ($entries as $entry) {
            $splitName = explode(' ', $entry['name']);
            $firstname = $splitName[0];
            $html .= "<option value='" . $firstname . "'>" . $firstname . "</option>";
        }
        $html .= "</select>";
        $html .= "</form>";
        return $html;
    }
}

?>