<?=
    $this->layout('layouts/app', [
        'titulo' => 'Home',
        'view' => 'home',
        'swagger' => true
    ]);
?>
<div id="home" apiData='<?= json_encode($apiData, true)?>'></div>
<div id="swagger-ui"></div>