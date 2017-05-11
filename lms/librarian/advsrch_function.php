<?php
require_once('database.php');

function getLanguage(){
    global $database;
    global $conndb;

    $sql = "SELECT * FROM languages ORDER BY name ASC";
    mysql_select_db($database, $conndb);
    $rs = mysql_query($sql, $conndb) or die(mysql_error());
    $rows = mysql_fetch_assoc($rs);
    $tot_rows = mysql_num_rows($rs);

    if($tot_rows > 0){
        echo "<select name=\"srch_language\" id=\"srch_language\">\n";
        echo "<option value=\"\">Any language&hellip;</option>\n";

        do{
            echo "<option value=\"".$rows['languageID']."\"";
            getSticky(2, 'srch_language', $rows['languageID']);
            echo ">".$rows['name']."<\option>";
        }
        while($rows = mysql_fetch_assoc($rs));
        echo "</select>";
    }
    mysql_free_result($rs);
}

function getAuthors(){
    global $database;
    global $conndb;

    $sql = "SELECT * FROM authors ORDER BY name ASC";
    mysql_select_db($database, $conndb);
    $rs = mysql_query($sql, $conndb) or die(mysql_error());
    $rows = mysql_fetch_assoc($rs);
    $tot_rows = mysql_num_rows($rs);

    if($tot_rows > 0){
        echo "<select name=\"srch_author\" id=\"srch_author\">\n";
        echo "<option value=\"\">Any authors&hellip;</option>\n";

        do{
            echo "<option value=\"".$rows['authorID']."\"";
            getSticky(2, 'srch_author', $rows['authorID']);
            echo">".$rows['name']."<\option>";
        }
        while($rows = mysql_fetch_assoc($rs));
        echo "</select>";
    }
    mysql_free_result($rs);
}

function getGenres(){
    global $database;
    global $conndb;

    $sql = "SELECT * FROM genres ORDER BY name ASC";
    mysql_select_db($database, $conndb);
    $rs = mysql_query($sql, $conndb) or die(mysql_error());
    $rows = mysql_fetch_assoc($rs);
    $tot_rows = mysql_num_rows($rs);

    if($tot_rows > 0){
        echo "<select name=\"srch_category\" id=\"srch_category\">\n";
        echo "<option value=\"\">Any category&hellip;</option>\n";

        do{
            echo "<option value=\"".$rows['genreID']."\"";
            getSticky(2, 'srch_cateegory', $rows['genreID']);
            echo">".$rows['name']."<\option>";
        }
        while($rows = mysql_fetch_assoc($rs));
        echo "</select>";
    }
    mysql_free_result($rs);
}

function getYears(){
    global $database;
    global $conndb;

    $sql = "SELECT DISTINCT YEAR(date_released) AS year FROM books ORDER BY date_released ASC";
    mysql_select_db($database, $conndb);
    $rs = mysql_query($sql, $conndb) or die(mysql_error());
    $rows = mysql_fetch_assoc($rs);
    $tot_rows = mysql_num_rows($rs);

    if($tot_rows > 0){
        echo "<select name=\"srch_year\" id=\"srch_year\">\n";
        echo "<option value=\"\">Any year&hellip;</option>\n";

        do{
            echo "<option value=\"".$rows['year']."\"";
            getSticky(2, 'srch_year', $rows['year']);
            echo">".$rows['year']."<\option>";
        }
        while($rows = mysql_fetch_assoc($rs));
        echo "</select>";
    }
    mysql_free_result($rs);
}

function getStatus(){
    global $database;
    global $conndb;

    $sql = "SELECT * FROM status ORDER BY name ASC";
    mysql_select_db($database, $conndb);
    $rs = mysql_query($sql, $conndb) or die(mysql_error());
    $rows = mysql_fetch_assoc($rs);
    $tot_rows = mysql_num_rows($rs);

    if($tot_rows > 0){
        echo "<label for=\"srch_status-0\">";
        echo "<input type=\"radio\" name=\"srch_status\" id=\"srch_status-0\" value=\"0\"";
        getSticky(4, 'srch_status', 0, 1);
        echo "/>\nAny</label>";

        do{
            echo "<label for=\"srch_status=".$rows['statusID']."\">";
            echo "<input type=\"radio\" name=\"srch_status\" id=\"srch_status\" id=\"srch_status-".$rows['statusID']."\" value=\"".$rows['statusID']."\"";
            getSticky(4, 'srch_status', $rows['statusID']);
            echo "/>\n".$rows['name']."</label>";
        }
        while($rows = mysql_fetch_assoc($rs));
    }
    mysql_free_result($rs);
}

function getLocation(){
    global $database;
    global $conndb;

    $sql = "SELECT * FROM locations ORDER BY name ASC";
    mysql_select_db($database, $conndb);
    $rs = mysql_query($sql, $conndb) or die(mysql_error());
    $rows = mysql_fetch_assoc($rs);
    $tot_rows = mysql_num_rows($rs);

    if($tot_rows > 0){
        echo "<ul class=\"chkbx\">";

        do{
            echo "<li>";
            echo "<input type=\"checkbox\" name=\"srch_locations-".$rows['locationID']."\" id=\"srch_locations-".$rows['locationID']."\" value=\"".$rows['locationID']."\"";
            getSticky(3, 'srch_location', $rows['locationID']);
            echo "/><label for=\"srch_locations-".$rows['locationID']."\">".$rows['name']."</label>";
            echo "</li>";
        }
        while($rows = mysql_fetch_assoc($rs));
        echo "</ul>";
    }
    mysql_free_result($rs);
}

function getSticky($case, $par, $value="", $initial=""){
    switch($case){
        case 1: //text field
        if(isset($_GET[$par]) && $_GET[$par] != ""){
            echo stripslashes($_GET[$par]);
        }
        break;
        case 2: //select
        if(isset($_GET[$par]) && $_GET[$par] == $value){
            echo " selected=\"selected\"";
        }
        break;
        case 3: //checkbox group
        if(isset($_GET[$par]) && $_GET[$par] != ""){
            echo " checked=\"checked\"";
        }
        break;
        case 4:
        if(isset($_GET[$par]) && $_GET[$par] == $value){
            echo " checked=\"checked\"";
        }else{
            if($initial !=""){
                echo " checked=\"checked\"";
            }
        }
    }
}
?>