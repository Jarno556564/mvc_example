<?php

class Output
{
    public function createTable($result, $act, $id_name)
    {
        $tableheader = false;
        $html = '<table>';
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

    public function createViewControls($act)
    {
        $create_name = substr($act, 0, -1);
        $html = "<div class='view-controls'>";
        $html .= "<button class='button'><a href='index.php?act=$act&op=create'>Create new $create_name</a></button>";
        $html .= "<form method='post' action=\"index.php?act=$act&op=readSearchBar\">";
        $html .= "<label for='search'>Search: </label>";
        $html .= "<input type='text' name='search' id='search'>";
        $html .= "</input>";
        $html .= "<button type='submit'>Search</button>";
        $html .= "</form>";
        $html .= "</div>";
        return $html;
    }

    public function createPagination($totalPages, $act)
    {
        $html = "";
        for ($i = 1; $i <= $totalPages; $i++) {
            $html .= "<a class='pagination' href='index.php?act=$act&op=viewPage&page=$i'> $i </a>";
        }
        return $html;
    }
}

?>