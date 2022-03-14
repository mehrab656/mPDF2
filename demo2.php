<?php
/**
 * This is demo 2 <br>
 *
 * Don't use this table , because this is not complete yet. some problem with rendering issue
 */
use Files\Invoice\Invoice;

require_once 'classes/Invoice.php';

$invoice = (new Invoice())->data();
$reseller = $invoice['reseller'];
$subscribers = $invoice['subscribers'];


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style><?php echo file_get_contents( 'style.css' ); ?></style>
</head>
<html>
<body>
<header>
    <h1>Invoice</h1>
    <address>
        <p>Pixelaar FZC LLC</p>
        <p>UAE ..... <br> ......</p>
        <p>+990 120000000</p>
    </address>
    <span><img alt="Pixelaar Logo" src="data:image/png;base64,<?php echo base64_encode( file_get_contents( 'https://pixelaar.com/wp-content/uploads/2020/07/main_logo.png' ) ); ?>"></span>
</header>
<article>
    <h1 style="color:#000066">Recipient</h1>
    <address>
        <p><?= ucfirst($reseller['name']) ?><br><?= $reseller['address'] ?></p>
    </address>
    <table class="invoice-info">
        <tr>
            <th>Invoice #</th>
            <td><?= $invoice['invoice_no'] ?></td>
        </tr>
        <tr>
            <th>Date</th>
            <td><?= $invoice['date'] ?></td>
        </tr>
    </table>
    <div class="clearfix"></div>
    <table class="items striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Subscriber</th>
            <th>Tariff Plan</th>
            <th>Price</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($subscribers as $subscriber){
            ?>
        <tr>
            <td>1</td>
            <td><?= $subscriber['subscriber'] ?></td>
            <td><?= $subscriber['plan'] ?></td>
            <td><span data-prefix><?= '$'.$subscriber['price']?></td>
        </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
    <table class="total">
        <tr>
            <th>Total</th>
            <td><?= '$'.$invoice['total']?></td>
        </tr>
    </table>
</article>
<aside>
    <h1><span>Notice*</span></h1>
    <div>
        <p> Show Any Message if needed</p>
    </div>
</aside>
</body>
</html>
</html>