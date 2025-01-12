<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class SwaggerAsset extends AssetBundle
{
    public $sourcePath = '@bower/swagger-ui/dist';
    public $css = [
        'swagger-ui.css',
    ];
    public $js = [
        'swagger-ui-bundle.js',
        'swagger-ui-standalone-preset.js',
    ];
}
