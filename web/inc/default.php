<?

function loader(){

//FIXME$r = "Explore the <a href=\"?page=explor\">build_dir</a> <br>";
$r = "Check bot stage log <a href=\"?page=bot_log\">here</a> <br>";
$r .= "Here follow the specific logs: <br>";

include ("errors.php");

$r .= errors();

return $r;
}

?>
