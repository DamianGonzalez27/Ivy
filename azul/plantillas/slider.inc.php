<div class="box-slider">
<div class="slider">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="<?php echo RUTA_IMAGENES;?>/slider/slider1.jpg" alt="Los Angeles" style="width:100%;">
        <div class="carousel-caption">
          <h2>Descarga el catalogo de equipos</h2>
          <a class="btn btn-primary" href="<?php echo RUTA_IMAGENES;?>/documentos/catalogo-de-equipos-para-laboratorio-2016.pdf" target="_blank">Descargar</a>
        </div>
      </div>

      <div class="item">
        <img src="<?php echo RUTA_IMAGENES;?>/slider/slider2.jpg" alt="Chicago" style="width:100%;">
        <div class="carousel-caption">
          <h2>Descarga el catalogo de productos</h2>
          <a class="btn btn-primary" href="<?php echo RUTA_IMAGENES;?>/documentos/CATALOGO_AZUL_DIAGNOSTIC_LP201718_V02.pdf" target="_blank">Descargar</a>
        </div>
      </div>

      <div class="item">
        <img src="<?php echo RUTA_IMAGENES;?>/slider/slider3.jpg" alt="New York" style="width:100%;">
        <div class="carousel-caption">
          <h2>Revisa nuestras promociones</h2>
          <a class="btn btn-primary" href="<?php echo RUTA_PROMOCIONES;?>">Descargar</a>
        </div>
      </div>

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>
