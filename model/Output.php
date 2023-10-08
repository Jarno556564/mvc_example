<?php

class Output
{
    public function createTable($result, $act, $create_name, $id_name)
    {
        $tableheader = false;
        $html = "<button class='button'><a href='index.php?act=$act&op=create'>Create new $create_name</a></button>";
        $html .= '<table>';
        foreach ($result as $row) {
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
                        <button class='button'><a href='index.php?act=$act&op=read&id=" . $row[$id_name] . "'><i class='fa-brands fa-readme'></i> Read</a></button>
                        <button class='button'><a href='index.php?act=$act&op=update&id=" . $row[$id_name] . "'><i class='fa-solid fa-pen'></i> Update</a></button>
                        <button class='button'><a href='index.php?act=$act&op=delete&id=" . $row[$id_name] . "'><i class='fa-solid fa-circle-minus'></i> Delete</a></button>
                    </td>";
            $html .= "</tr>";
        }
        $html .= "</table>";
        return $html;
    }

    public function createViewControls($result, $act) {
        $html = "<form>";
        $html .= "<label for='name'>Choose a contact: </label>";
        $html .= "<select name='name' id='name'>";
        $html .= "<option disabled selected value>select a contact</option>";
        foreach ($result as $row) {
            $splitName = explode(' ', $row['name']);
            $firstname = $splitName[0];
            $html .= "<option value='" . $row['id'] . "'>" . $firstname . "</option>";
        }
        $html .= "</select>";
        $html .= "</form>";

        $html .= "<form action=\"index.php?act=$act&op=readSearchBar\">";
        $html .= "<label for='search'>Search: </label>";
        $html .= "<input type='text' name='search' id='search'>";
        $html .= "</input>";
        $html .= "</form>";
        print $html;
    }

}

?>