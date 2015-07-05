<?php
/**
 * YiiQuagga.php File
 * @package  yii2-quaggaJS
 * @author   Jakob Reiter <jakob.reiter.io@gmail.com>
 * @version  1.0
 */

namespace jakobreiter\quaggajs;

use \yii\helpers\Html;

class YiiQuagga extends \yii\base\Widget
{

    public $id;

    public $target = "#code";

    public $name;

    public $messages = '#messages';

    /**
     * @inherit doc
     * @throw InvalidConfigException
     */
    public function init()
    {
        $view = $this->getView();
        YiiQuaggaAsset::register($view);
    }

    public function run()
    {
        $wrapper = Html::tag('div', '', [
            'class' => 'viewport',
            'data-target' => $this->target,
            'data-name' => $this->name,
            'data-messages' => $this->messages,
        ]);


        return Html::tag('div', $wrapper, [
            "class" => "quaggajs_wrapper",
            'id' => $this->id,
        ])
        .Html::tag('div','',['class'=>'clear']);
    }
}