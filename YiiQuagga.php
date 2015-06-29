<?php
/**
* YiiQuagga.php File
* @package  yii2-quaggaJS
* @author   Jakob Reiter
* @version     
*/

namespace jakobreiter\quaggajs;

class YiiQuagga {
    /**
     * @inherit doc
     * @throw InvalidConfigException
     */
    public function init()
    {
        parent::init();
        $this->registerAssets();
        echo $this->widget();
    }

    /**
     * Registers the needed assets
     */
    public function registerAssets()
    {
        $view = $this->getView();
        YiiQuaggaAsset::register($view);
        $this->registerPlugin('yiiquagga');
    }

    public function widget()
    {
        return "ABC";
    }
}