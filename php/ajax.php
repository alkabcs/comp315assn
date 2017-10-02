<?php
include_once('../functions/functions.php');
// get the  parameter from URL
$pagename = $_REQUEST["pagename"];
$admin = $_REQUEST["admin"];

if(isset($pagename)){
    if(isset($admin)){
        echo show_all_items(get_all_items($pagename));
    }
    else{
        echo json_encode(show_all_items_non_admin(get_all_items($pagename), $pagename)); 
    }    
}
?>