<?php

namespace frontend\assets;

use Yii;
use yii\web\AssetBundle;

class MailAsset extends AssetBundle
{
    public $css = [
        'css/site.css'
    ];

    public function init()
    {
        $cssFiles = [];
        $request = Yii::$app->request;
        foreach ($this->css as $cssFile) {
            $cssFiles[] = "http://" .
                $request->serverName . "/".
                $cssFile;
        }
        $this->css = $cssFiles;
        parent::init();
    }
}
