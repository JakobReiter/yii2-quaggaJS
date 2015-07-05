<?php
/**
 * Asset bundle for Quagga Widget
 *
 * @package  yii2-quaggaJS
 * @author   Jakob Reiter <jakob.reiter.io@gmail.com>
 * @version  1.0
 */

namespace jakobreiter\quaggajs;

use Yii;

class YiiQuaggaAsset extends \yii\web\AssetBundle
{
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public function init()
    {
        $this->sourcePath = '@vendor/jakobreiter/yii2-quaggajs';
        $this->setupAssets('css', ['assets/quaggajs']);
        $this->setupAssets('js', ['assets/quagga', 'assets/quagga_app']);
        parent::init();
    }

    /**
     * Set up CSS and JS asset arrays based on the base-file names
     *
     * @param string $type whether 'css' or 'js'
     * @param array $files the list of 'css' or 'js' basefile names
     */
    protected function setupAssets($type, $files = [])
    {
        foreach ($files as $file) {
            $srcFiles[] = "{$file}.{$type}";
            $minFiles[] = "{$file}.min.{$type}";
        }
        //$this->$type = YII_DEBUG ? $srcFiles : $minFiles;
        $this->$type = $srcFiles;
    }
}