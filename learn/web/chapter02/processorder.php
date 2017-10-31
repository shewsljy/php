<!DOCTYPE html>
<html>
    <head>
        <title>Bob's Auto Parts - Order Results</title>
    </head>
    <body>
        <h1>Bob's Auto Parts</h1>
        <h2>Order Results</h2>
        <?php
            $date = date('H:i:s, Y/m/d');
            echo "<p>Order processed at ".$date."</p>";
            $tireqty = $_POST['tireqty'];
            $oilqty = $_POST['oilqty'];
            $sparkqty = $_POST['sparkqty'];
            $address = preg_replace('/\t|\R/',' ',$_POST['address']);
            echo '<p>Your order is as follows: </p>';
            $totalqty = 0;
            $totalqty = $tireqty + $oilqty + $sparkqty;
            $discount = 0;
            if ($totalqty == 0) {
                echo "You did not order anything on the previous page!<br />";
            } else {
                if ($tireqty < 10) {
                    $discount = 0;
                } elseif (($tireqty >= 10) && ($tireqty <= 49)) {
                    $discount = 5;
                } elseif (($tireqty >= 50) && ($tireqty <= 99)) {
                    $discount = 10;
                } elseif ($tireqty >= 100) {
                    $discount = 15;
                }
                if ($tireqty > 0)
                    echo htmlspecialchars($tireqty).' tires<br />';
                if ($oilqty > 0)
                    echo htmlspecialchars($oilqty).' bottles of oil<br />';
                if ($sparkqty > 0)
                    echo htmlspecialchars($sparkqty).' spark plugs<br />';
            }
            echo "<p>Items ordered: ".$totalqty."<br />";
            $totalamount = 0.00;
            define('TIREPRICE', 100);
            define('OILPRICE', 10);
            define('SPARKPRICE', 4);
            $totalamount = $tireqty * (TIREPRICE - $discount) + $oilqty * OILPRICE + $sparkqty * SPARKPRICE;
            echo "Subtotal: $".number_format($totalamount, 2)."<br />";
            $taxrate = 0.10; // local sales tax is 10%
            $totalamount = $totalamount * (1 + $taxrate);
            echo "Total including tax: $".number_format($totalamount, 2)."</p>";
            echo "<p>Address to ship to is ".$address."</p>";

            $outputstring = $date. "\t" .$tireqty. " tires \t" .$oilqty. " oil\t" .$sparkqty. " spark plugs \t\$" .$totalamount. "\t" .$address. "\n";
            $document_root = dirname($_SERVER['DOCUMENT_ROOT']);
            $order_dir = "$document_root/learn/web/orders";
            @$fp = fopen("$order_dir/orders.txt", 'ab');
            if (!$fp) {
                echo "<p><strong> Your order could not be processed at this time. Please try again later.</strong></p></body></html>";
                exit;
            }
            flock($fp, LOCK_EX);
            fwrite($fp, $outputstring, strlen($outputstring));
            flock($fp, LOCK_UN);
            fclose($fp);
            echo "<p>Order written.</p>";

            echo "<h2>Customer Orders</h2>";
            @$fp = fopen("$order_dir/orders.txt", 'rb');
            flock($fp, LOCK_SH); // lock file for reading
            if (!$fp) {
                echo "<p><strong>No orders pending.<br />Please try again later.</strong></p>";
                exit;
            }
            while (!feof($fp)) {
                $order = fgets($fp);
                echo htmlspecialchars($order)."<br />";
            }
            flock($fp, LOCK_UN); // release read lock
            fclose($fp);
        ?>
    </body>
</html>
