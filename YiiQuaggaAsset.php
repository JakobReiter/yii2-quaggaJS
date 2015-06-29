<?php
/**
* YiiQuaggaAssetBundle.php File
* @package  yii2-quaggaJS
* @author   jareiter
* @version     
*/

namespace jakobreiter\quaggajs;

use Yii;

/**
 * Asset bundle for StarRating Widget
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class YiiQuaggaAsset extends yii\web\AssetBundle
{
    public function init()
    {
        $this->setSourcePath('@vendor/jakobreiter/yii2-quaggajs');
        $this->setupAssets('css', ['assets/quaggajs.css']);
        $this->setupAssets('js', ['vendor/quaggaJS/dist/quagga.min.js']);
        parent::init();
    }
}