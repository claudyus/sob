<?

session_start();

$page = $_GET['page'];

if (! isset($page)) {
	$page = 'default';
}

require ("./inc/$page.php");
require ("./inc/status.php");

#load template, if it doesn't exist load default one
$tpl = file ('tpl.htm');
if ($tpl === FALSE) {
	$tpl = file ('tpl.htm.default');
}

$tpl = str_replace ( "%body" , loader(), $tpl);
$tpl = str_replace ( "%status" , status(), $tpl);

foreach( $tpl as $a){
	echo $a;
}

?>
