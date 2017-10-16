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
    ?>
</body>
</html>