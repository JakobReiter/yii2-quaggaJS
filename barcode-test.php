<html>
<head>
    <title>Test</title>
</head>
<body>
<?php
/**
 * barcode-test.php File
 * @package  yii2-quaggaJS
 * @author   jareiter
 * @version
 */

require("BarcodeFactory.php");

// header('Content-Type: image/png');
echo \jakobreiter\quaggajs\BarcodeFactory::generateIMG("TA-123456", "TA - Jakob Reiter");

echo \jakobreiter\quaggajs\BarcodeFactory::generateIMG("TA-789000", "TB - Noa Ben-Gur");
?>
