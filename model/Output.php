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
        $html = "<div class='view-controls'>";
        $html .= $this->createSearchBar($act);
        $html .= $this->createCreateButton($act);
        $html .= $this->createCSVButton($act);
        $html .= "</div>";
        return $html;
    }

    public function createSearchBar($act)
    {
        $html = "<form method='post' action=\"index.php?act=$act&op=readSearchBar\">";
        $html .= "<label for='search'>Search: </label>";
        $html .= "<input type='text' name='search' id='search'>";
        $html .= "</input>";
        $html .= "<button type='submit'>Search</button>";
        $html .= "</form>";
        return $html;
    }

    public function createCreateButton($act)
    {
        $create_name = substr($act, 0, -1);
        $html = "<button class='button'><a href='index.php?act=$act&op=create'>Create new $create_name</a></button>";
        return $html;
    }

    public function createPagination($totalPages, $act)
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        if($page > 1) {
            $html = "<button class='button'><a href='index.php?act=$act&op=viewPage&page=" . ($page - 1) . "' class='button'><i class='fa-solid fa-angles-left'></i></a></button>";
        } else {
            $html = "<button class='button' disabled><a href='javascript:void(0)' class='button'><i class='fa-solid fa-angles-left'></i></a></button>";
        }
        for ($i = 1; $i <= $totalPages; $i++) {
            $html .= "<a class='pagination' href='index.php?act=$act&op=viewPage&page=$i'> $i </a>";
        }
        if($page <= $totalPages - 1) {
            $html .= "<button class='button'><a href='index.php?act=$act&op=viewPage&page=" . ($page + 1) . "' class='button'><i class='fa-solid fa-angles-right'></i></a></button>";
        } else {
            $html .= "<button class='button' disabled><a href='javascript:void(0)' class='button'><i class='fa-solid fa-angles-right'></i></a></button>";
        }
        return $html;
    }

    public function createCSVButton($act)
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $html = "<button class='button'><a href='index.php?act=$act&op=export&page=$page'>Export to CSV</a></button>";
        return $html;
    }
}

?>