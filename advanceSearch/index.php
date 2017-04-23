<?php
require_once('function.php');

$sql = "SELECT DISTINCT bk.title AS Title, YEAR(bk.date_released) AS Year, bk.price AS Price, cat.name AS Category, aut.name AS Author
        FROM books bk
        
        JOIN categories cat
            ON cat.id = bk.category
            
        JOIN books_covers bk_co
            ON bk_co.book_id = bk.id
        
        JOIN covers co
            ON co.id = bk_co.cover_id
        
        JOIN books_authors bk_aut
            ON bk_aut.book_id = bk.id
        
        JOIN authors aut
            On aut.id = bk_aut.author_id
        
        JOIN books_languages bk_lan
            On bk_lan.book_id = bk.id
        
        JOIN languages lan
            ON lan.id = bk_lan.lang_id
        
        JOIN books_locations bk_loc
            ON bk_loc.book_id = bk.id
        
        JOIN locations loc
            ON loc.id = bk_loc.location_id

";

if(isset($_GET['srch_for'])){

    $locations = array();
    $getters = array();
    $queries = array();

    foreach($_GET as $key => $value){
        $temp = is_array($value) ? $value : trim($value);
        if(!empty($temp)){
            list($key) = explode("-",$key);
            if($key == 'srch_locations'){
                array_push($locations, $value);
            }
            if(!in_array($key, $getters)){
                $getters[$key] = $value;
            }
        }
    }

    if(!empty($locations)){
        $loc_qry = implode(",", $locations);
    }

    if(!empty($getters)){
        foreach($getters as $key => $value){
            ${$key} = $value;
            switch($key){
                case 'srch_for':
                array_push($queries, "(bk.title LIKE '%$srch_for%' || bk.description LIKE '%$srch_for%' || bk.isbn LIKE '%$srch_for%')");
                break;
                case 'srch_category':
                array_push($queries, "bk.category = $srch_category");
                break;
                case 'srch_cover':
                array_push($queries, "bk_co.cover_id = $srch_cover");
                break;
                case 'srch_author':
                array_push($queries, "bk_aut.author_id = $srch_author");
                break;
                case 'srch_language':
                array_push($queries, "bk_lan.lang_id = $srch_language");
                break;
                case 'srch_year':
                array_push($queries, "YEAR(bk.date_released) = $srch_year");
                break;
                case 'srch_locations':
                array_push($queries, "bk_loc.location_id IN ($loc_qry)");
                break;
            }
        }
    }

        if(!empty($queries)){
            
            $sql .=" WHERE ";
            $i = 1;
            foreach($queries as $query){
                if($i < count($queries)){
                    $sql .= $query." AND ";
                }else{
                    $sql .= $query;
                }
                $i++;
            }
        }

        $sql .= " ORDER BY bk.title ASC";
    }

mysql_select_db($database, $conndb);
$rs = mysql_query($sql, $conndb) or die(mysql_error());
$rows = mysql_fetch_assoc($rs);
$tot_rows = mysql_num_rows($rs);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml/DTDT/xhtml-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset-UTF-8"/>
<title>Advance Search Form</title>
<link href="style/core.css" rel="stylesheet" type="text/css"/>
</head>
<body>
<div id="out">
    <div id="ph">
        <div id="phin">
            <h1>Advance Web Form</h1>
            <h3>Web Design Tutorial</h3>
        </div>
    </div>
    <div id="wr">
        <div id="hd"></div>
        <div id="cnt">
            <h2>Search for the book</h2>
            <form id="search_form" name="search_form" method="get" action="">
                <table border="0" collspacing="0" cellpadding="0" class="tbl_search">
                    <tr>
                        <th scope="row"><label for="srch_for">Search for:</label></th>
                        <td><input type="text" name="srch_for" id="srch_for" class"f_fld" value="<?php getSticky(1, 'srch_for');?>" /></td>
                        <th><label for="srch_category">category:</label></th>
                        <td><?php getCategories();?></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="srch_cover"> Cover Type:</label></th>
                        <td><?php getCover();?></td>
                        <th><label for="srch_author">Author:</label></th>
                        <td><?php getAuthors();?></td>
                    </tr>
                    <tr>
                        <th scope="row"><label for="srch_language"> Language:</label></th>
                        <td><?php getLanguage();?></td>
                        <th><label for="srch_year">Year:</label></th>
                        <td><?php getYears();?></td>
                    </tr>
                    <tr>
                        <th scope="row">Available in:</th>
                        <td colspan="3"><?php getLocation();?></td>
                    </tr>
                    <tr>
                        <td colspan="4"><label for="btn" class="sbm fl_r">
                            <input type="submit" id="btn" value="Search"/></label>
                        </td>
                    </tr>
                </table>
            </form>
            <?php if($tot_rows > 0){ ?>
            <table border="0" cellspacing="0" cellpadding="0" class="tbl_repeat">
                <tr>
                    <th scope="col">Book title</th>
                    <th scope="col" class="col_15">Category</th>
                    <th scope="col" class="col_15">Author
                    <th scope="col" class="col_10 al_r">Year</th>
                    <th scope="col" class="col_10 al_r">Price</th></th>
                </tr>
                <?php do{ ?>
                <tr>
                    <td><?php echo $rows['Title']; ?></td>
                    <td><?php echo $rows['Category']; ?></td>
                    <td><?php echo $rows['Author']; ?></td>
                    <td class="al_r"><?php echo $rows['Year']; ?></td>
                    <td class="al_r"><?php echo "&dollar;".$rows['Price']; ?></td>
                </tr>
                <?php } while($rows = mysql_fetch_assoc($rs)); ?>
            </table>
            <?php 
            }else{
                if(!empty($queries)){
                    echo "<p>There are no records matching your search criteria</p>";
                }else{
                    echo "<p>There are currently no records available</p>";
                }
            }
             ?>
        </div>
    </div>
</div>
</body>
</html>
