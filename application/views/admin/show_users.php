<h1>Tabla de lista de usuarios</h1>

<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">DNI</th>
	  <th scope="col">Teléfono</th>
	  <th scope="col">Puntos</th>
	  <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
  	<?php foreach($data as $item):?>
    <tr>
      <th scope="row"><?= $item->id ?></th>
      <td><?= $item->nombre ?></td>
			<td><?= $item->apellido?></td>
			<td><?= $item->dni ?></td>
			<td><?= $item->telefono ?></td>
			<td><?= $item->puntos ?></td>
			<td>acciones</td>
    </tr>   
	<?php endforeach; ?>
  </tbody>
</table>
