<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= (isset($titulo)) ? $titulo: 'Ivy' ?></title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=East+Sea+Dokdo&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous"
    />
    <?php 
        if(isset($swagger))
        { ?>
            <link rel="stylesheet" type="text/css" href="./swagger/swagger-ui.css" />
            <link rel="icon" type="image/png" href="./Ivy.png" sizes="32x32" />
            <style>
                html
                {
                    box-sizing: border-box;
                    overflow: -moz-scrollbars-vertical;
                    overflow-y: scroll;
                }

                *,
                *:before,
                *:after
                {
                    box-sizing: inherit;
                }

                body
                {
                    margin:0;
                    background: #fafafa;
                }
            </style>
        <?php
        }
    ?>
    <script src="https://kit.fontawesome.com/3ce9d3fe88.js" crossorigin="anonymous"></script>
    <?php 
        if(isset($view))
        { ?>
            <link rel="stylesheet" href="/app/<?= $view?>/app.css">
        <?php
        }
    ?>
</head>
<body>
    <?= $this->section('content') ?>
    <?php 
        if(isset($view))
        { ?>
            <script src="/app/<?= $view;?>/app.js"></script>
        <?php
        }
    ?>
    <?php 
        if(isset($swagger))
        { ?>
            <script src="./swagger/swagger-ui-bundle.js" charset="UTF-8"> </script>
            <script src="./swagger/swagger-ui-standalone-preset.js" charset="UTF-8"> </script>
            <script>
            window.onload = function() {
            // Begin Swagger UI call region
            const ui = SwaggerUIBundle({
                url: "https://localhost:8000/docs",
                dom_id: '#swagger-ui',
                deepLinking: true,
                presets: [
                SwaggerUIBundle.presets.apis,
                SwaggerUIStandalonePreset
                ],
                plugins: [
                SwaggerUIBundle.plugins.DownloadUrl
                ],
                layout: "StandaloneLayout"
            });
            // End Swagger UI call region

            window.ui = ui;
            };
        </script>
        <?php
        }
    ?>

</body>
</html>