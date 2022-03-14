<?php


use Classes\Invoice;

require_once 'classes/Classes/Invoice.php';
require_once 'helper.php';

$invoice     = ( new Invoice() )->data();
$reseller    = $invoice['reseller'];
$subscribers = $invoice['subscribers'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= __( 'INVOICE TITLE' ) ?></title>
    <link rel="stylesheet" href="pdf/bootstrap.min.css">
    <link rel="stylesheet" href="pdf/pdf.css">

</head>

<body>
<div id="wrap">
    <div class="row">
        <div class="col-lg-12">
            <div class="text-center">
                <span><img alt="Pixelaar Logo"
                           src="data:image/png;base64,<?php echo base64_encode( file_get_contents( 'https://pixelaar.com/wp-content/uploads/2020/07/main_logo.png' ) ); ?>"></span>

                <h2 style="margin: 0;"><?= __( 'Pixelaar FZC LLC' ) ?></h2>
				<?= __( 'UAE, 27/A ....' ) ?>
                <br>
				<?= __( 'Registration No: 12345678790' ) ?><br>
				<?= __( 'Tel: ' . '+990 12313123213' . ' Email: ' . 'admin@pixelaar.com' ) ?>
                <hr>
            </div>
            <div class="clearfix"></div>

            <div class="padding10">

                <div class="col-xs-5">
					<?= __( 'to' ) ?>:<br/>
                    <h2><?= __( $reseller['name'] ) ?></h2>

					<?= $reseller['address']['street'] ?? '' ?><br>
					<?= $reseller['address']['city'] ?? ''  ?>
					<?= $reseller['address']['state'] ? ( ', ' . $reseller['address']['state'] ) : '' ?>
                    <?= $reseller['address']['zip'] ? ( '-' . $reseller['address']['zip'] ) : '' ?><br>
                    <?= $reseller['address']['country']??''?><br>
					<?= $reseller['address']['phone'] ?>
                </div>

                <div class="col-xs-5 pull-right">
                    <div class="well well-sm">
                        <h1 class="text-center title" style="margin: 0;"><?= 'Invoice'; ?></h1>
                        <table style="margin-bottom: 10px;">
                            <tr>
                                <td><?= __( 'Ref' ); ?> </td>
                                <td> : <strong><?= 1234; ?></strong></td>
                            </tr>
                            <tr>
                                <td><?= __( 'Date' ) ?></td>
                                <td> : <strong><?= $invoice['date'] ?></strong></td>
                            </tr>
                            <tr>
                                <td><?= __( 'Sales Status' ) ?></td>
                                <td> : <strong><?= __( $invoice['sales_status'] ) ?></strong></td>
                            </tr>
                            <tr>
                                <td><?= __( 'Payment Status' ) ?></td>
                                <td> : <strong><?= __( $invoice['payment_status'] ) ?></strong></td>
                            </tr>
                        </table>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>

            </div>
            <div class="clearfix" style="margin-bottom:5px;"></div>

            <div class="col-xs-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th><?= __( '#' ); ?></th>
                            <th><?= __( 'Subscriber' ) ?></th>
                            <th><?= __( 'Tariff Plan' ) ?></th>
                            <th><?= __( 'Price' ) ?></th>
                        </tr>
                        </thead>
                        <tbody>
						<?php foreach ( $subscribers as $key => $subscriber ) {
							?>
                            <tr>
                                <td style="text-align:center; width:10%; vertical-align:middle;"><?= ++ $key ?></td>
                                <td style="width: 30%; text-align:center; vertical-align:middle;"><?= __( $subscriber['name'] ) ?></td>
                                <td style="width: 30%; text-align:center; vertical-align:middle;"><?= __( $subscriber['plan'] ) ?></td>
                                <td style="text-align:right; width:30%;"><?= '$' . __( $subscriber['price'] ) ?></td>
                            </tr>
							<?php
						} ?>
                        <tr>
                            <td colspan="2"></td>
                            <td style="text-align:right; font-weight:bold;">
								<?= __( 'Total Amount' ) ?>
                            </td>
                            <td colspan="2"
                                style="text-align:right; font-weight:bold;"><?= '$ ' . $invoice['total'] ?></td>
                        </tr>
                        </tbody>

                    </table>
                </div>
            </div>
            <div class="clearfix"></div>

            <?php if (!empty($invoice['note'])){ ?>
                <div class="col-xs-12">
                    <div class="well well-sm">
                        <p class="bold"><?= __( 'note' ) ?>:</p>

                        <div><?= $invoice['note'] ?? '' ?></div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
</body>
</html>
