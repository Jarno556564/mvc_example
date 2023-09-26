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
                $html .= "<td data title='" . $key . "'>" . $value . "</td>";
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

    public function createList($enteries)
    {
        $html = '<ul>';
        foreach ($enteries as $entery) {

            foreach ($entery as $value) {
                $html .= "<li>" . $value . "</li>";
            }
        }
        $html .= '</ul>';
        return $html;
    }
}

?>