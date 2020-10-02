<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Registro</title>
</head>
<body>
    <h1>Registro</h1>
    <ul>
		<?php foreach ($menu as $item): ?>
			<li><a href="<?= $item['url']; ?>"><?= $item['title']; ?></a></li>
		<?php endforeach; ?>
	</ul>

	<?php echo validation_errors(); ?>

    <?php 
        echo form_open('register/create',array('method'=>'POST'));

        echo form_label('Nombre:');
        echo form_input('firstname');

        echo "<br>";
        echo form_label('Apellido:');
        echo form_input('lastname');

        echo "<br>";
        echo form_label('DNI:');
        echo form_input(array('type'=>'number', 'name'=>'dni'));

        echo "<br>";
        echo form_label('Email:');
        echo form_input(array('type' => 'email', 'name'=>'email'));

        echo "<br>";
        echo form_label('Teléfono:');
		echo form_input(array('type' => 'tel', 'name'=>'tel'));
		
		echo "<br>";
        echo form_label('Contraseña:');
		echo form_input(array('type' => 'password', 'name'=>'password'));
		
		echo "<br>";
        echo form_label('Confirmar contraseña:');
        echo form_input(array('type' => 'password', 'name'=>'password_c'));

        echo "<br>";
        echo form_submit('submit', 'Enviar');

        echo form_close();
    ?>

	<?= isset($msg) ? $msg : ''; ?>

</body>
</html>
