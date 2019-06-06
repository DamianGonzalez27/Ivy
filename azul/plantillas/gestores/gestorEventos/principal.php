<div class="panel panel-default separador">
  <div class="panel-heading">
    <h3 class="panel-title text-center">Eventos actuales</h3>
  </div>
  <div class="panel-body">
    <table class="table table-responsive">
      <thead>
        <tr>
          <th>Evento</th>
          <th>Fecha</th>
          <th>Domicilio</th>
          <th>Participantes</th>
        </tr>
        </thead>
        <tbody>
<?php Helper::escribirEventos($eventom);?>
        </tbody>
    </table>
  </div>
</div>
