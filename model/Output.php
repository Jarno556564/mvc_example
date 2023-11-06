<?php

class Output
{
    public function createTable($result, $act, $id_name)
    {
        $tableheader = false;
        $html = "<form action='index.php?act=$act&op=mutliDelete' method='post' id='multi-delete-form'>";
        $html .= '<table>';
        foreach ($result as $row) {
            if ($tableheader == false) {
                $html .= "<tr>";
                $html .= "<th><input type='checkbox' onClick='toggleCheckboxes(this)' /><br /></th>";
                foreach ($row as $key => $value) {
                    if ($key === $id_name) {
                        continue;
                    }
                    $html .= "<th>" . $key . "</th>";
                }
                $html .= "<th>actions</th>";
                $html .= "</tr>";
                $tableheader = true;
            }
            $html .= "<tr>";
            foreach ($row as $key => $value) {
                if ($key === $id_name) {
                    $html .= "<td><input type='checkbox' name='checkboxes[]' value='" . $value . "'></td>";
                } else {
                    $html .= "<td name='" . $key . "'>" . $value . "</td>";
                }
            }
            $html .= "<td>
                        <button class='button'><a href='index.php?act=$act&op=read&id=" . $row[$id_name] . "'><i class='fa-brands fa-readme'></i> Read</a></button>
                        <button class='button'><a href='index.php?act=$act&op=update&id=" . $row[$id_name] . "'><i class='fa-solid fa-pen'></i> Update</a></button>
                        <button class='button'><a href='index.php?act=$act&op=delete&id=" . $row[$id_name] . "'><i class='fa-solid fa-circle-minus'></i> Delete</a></button>
                    </td>";
            $html .= "</tr>";
        }
        $html .= "</table>";
        $html .= "</form>";
        return $html;
    }

    public function createTopViewControls($act)
    {
        $html = "<div class='view-controls'>";
        $html .= $this->createSearchBar($act);
        $html .= "<div class='view-controls-buttons'>";
        $html .= $this->createMultiDeleteButton($act);
        $html .= $this->createCreateButton($act);
        $html .= "</div>";
        $html .= "</div>";
        return $html;
    }

    public function createBottomViewControls($act, $totalpages)
    {
        // pagination,csv, date range picker
        $html = "<div class='view-controls'>";
        $html .= $this->createPagination($act, $totalpages);
        $html .= "<div class='view-controls-buttons'>";
        $html .= $this->createCSVButton($act);
        $html .= $this->createDateRangeForm($act);
        $html .= "</div>";
        $html .= "</div>";
        return $html;
    }

    public function createSearchBar($act)
    {
        $html = "<form method='post' action=\"index.php?act=$act&op=readSearchBar\">";
        $html .= "<label for='search'>Search: </label>";
        $html .= "<input type='text' class='searchbar' name='search' id='search'>";
        $html .= "</input>";
        $html .= "<button class='searchButton' type='submit'>Search</button>";
        $html .= "</form>";
        return $html;
    }

    public function createCreateButton($act)
    {
        $create_name = substr($act, 0, -1);
        $html = "<button class='button'><a href='index.php?act=$act&op=create'>Create new $create_name</a></button>";
        return $html;
    }

    public function createPagination($act, $totalPages)
    {
        $html = "<div class='paginationContainer'>";
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        if ($page > 1) {
            $html .= "<button class='paginationArrow'><a href='index.php?act=$act&op=viewPage&page=" . ($page - 1) . "' class='button'><i class='fa-solid fa-angles-left'></i></a></button>";
        } else {
            $html .= "<button class='paginationArrow' disabled><a href='javascript:void(0)' class='button'><i class='fa-solid fa-angles-left'></i></a></button>";
        }
        for ($i = 1; $i <= $totalPages; $i++) {
            $html .= "<a class='pagination' href='index.php?act=$act&op=viewPage&page=$i'> $i </a>";
        }
        if ($page <= $totalPages - 1) {
            $html .= "<button class='paginationArrow'><a href='index.php?act=$act&op=viewPage&page=" . ($page + 1) . "' class='button'><i class='fa-solid fa-angles-right'></i></a></button>";
        } else {
            $html .= "<button class='paginationArrow' disabled><a href='javascript:void(0)' class='button'><i class='fa-solid fa-angles-right'></i></a></button>";
        }
        $html .= "</div>";
        return $html;
    }

    public function createCSVButton($act)
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $html = "<button class='button'><a href='index.php?act=$act&op=export&page=$page'>Export to CSV</a></button>";
        return $html;
    }

    public function createMultiDeleteButton($act)
    {
        // $html = "<button class='button' onclick='showModal()'>Delete Selected</button>";
        $html = "<input class='button' type='submit' name='submit' value='Delete Selected' form='multi-delete-form'>";
        return $html;
    }

    public function createDateRangeForm($act)
    {
        if ($act == "contacts") {
            return null;
        }
        $html = "<form action='index.php?act=$act&op=selectDate' method='post' class='date_range_form'>";
        $html .= "<label for='start_date'>From:</label>";
        $html .= "<input type='date' id='start_date' name='start_date' class='date_input' required>";
        $html .= "<label for='end_date'>To:</label>";
        $html .= "<input type='date' id='end_date' name='end_date' class='date_input' required>";
        $html .= "<button type='submit' name='submit' class='dateButton'><i class='fas fa-magnifying-glass'></i></button>";
        $html .= "</form>";
        return $html;
    }
}

?>