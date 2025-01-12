<?php

use frontend\assets\SwaggerAsset;

/** @var yii\web\View $this */

SwaggerAsset::register($this);

?>

<div id="swagger-ui"></div>
<script>
    window.onload = function () {
        const ui = SwaggerUIBundle({
            url: 'docs.json',
            dom_id: '#swagger-ui',
            deepLinking: true,
            jsonEditor: true,
            displayRequestDuration: true,
            filter: true,
            validatorUrl: null,
            presets: [
                SwaggerUIBundle.presets.apis,
                SwaggerUIStandalonePreset
            ],
            plugins: [
                SwaggerUIBundle.plugins.DownloadUrl
            ],
            layout: "StandaloneLayout"
        });;
        window.ui = ui
    }
</script>