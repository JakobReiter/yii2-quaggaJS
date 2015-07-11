# yii2-quaggaJS
Yii2 extension for quaggaJS (https://github.com/serratus/quaggaJS)

Installation
------------
```code
{
	"require": 
	{
  		"jakobreiter/yii2-quagga-js": "*"
	}
}
```

Usage Barcode Generation
------------
```php
echo BarcodeFactory::generateIMG($id, $label, $height, $classString);
```

Usage Yii2-Quagga 
------------
```php
echo YiiQuagga::widget([
	"id" => 'codereader',
	'name' => 'BarcodeForm[number]',
	'target' => '#barcodeform-number',
	'messages' => '#messages',
]);
```
