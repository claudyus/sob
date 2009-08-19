<?

session_start();

$page = $_GET['page'];

if (! isset($page)) {
	$page = 'default';
}

require ("./inc/$page.php");
require ("./inc/status.php");

$tpl = file ('tpl.htm');

$tpl = str_replace ( "%body" , loader(), $tpl);
$tpl = str_replace ( "%status" , status(), $tpl);

foreach( $tpl as $a){
	echo $a;
}

?>
