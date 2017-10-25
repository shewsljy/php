<!--
<html>
 <head>
  <title>PHP 测试</title>
 </head>
 <body>
    <?php
    echo 'Hello World';
    /*echo '<hr />';
    var_dump($_SERVER);*/
    echo '<hr />';
    foreach ($_SERVER as $item => $value){
        echo 'key = ' . $item . ', value = ' . $value ;
        echo '<br />';
    }
    echo '<hr />';
    echo 'End';
    ?>
</body>
</html>
-->
<?php
echo 'Hello World';
//echo '<hr />';
//var_dump($_SERVER);
//dd($_SERVER);
echo '<hr />';
echo '<pre>';
print_r($_SERVER);
echo '</pre>';
echo '<hr />';
echo $_SERVER['PHP_SELF'];
echo '<hr />';
echo '<pre>';
print_r($GLOBALS);
echo '</pre>';
echo '<hr />';
function test() {
    $foo = "local variable";

    echo '$foo in global scope: ' . $GLOBALS['foo'] . "<br />";
    echo '$foo in current scope: ' . $foo . "<br />";
}
$foo = "Example content";
test();
echo '<hr />';
// echo 'Hello ' . $_GET["name"] . '!<br />';
// echo 'Hello ' . htmlspecialchars($_GET["name"]) . '!<br />';
// echo 'Hello ' . htmlentities($_GET["name"]) . '!<br />';
// echo '<hr />';
@strpos();
echo $php_errormsg;
echo '<hr />';
if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') !== FALSE) {
    echo '正在使用 Firefox Explorer。<br />';
}else {
    echo 'Not Firefox Explorer。<br />';
}
echo '<hr />';
$expression = true;
if ($expression == true):
    echo 'This will show if the expression is true.';
else:
    echo 'Otherwise this will show.';
endif;
echo '<hr />';
function makecoffee($types = array("cappuccino"), $coffeeMaker = NULL)
{
    $device = is_null($coffeeMaker) ? "hands" : $coffeeMaker;
    return "Making a cup of ".join(", ", $types)." with $device.\n";
}
echo makecoffee();
echo '<br />';
echo makecoffee(array("cappuccino", "lavazza"), "teapot");
echo '<hr />';
