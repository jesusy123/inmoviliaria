<?php include '../extend/header.php'; ?>

<div class="row">
	<div class="col s12">
		<div class="card">
			<div class="card-content">
				<span class="card-title">Alta de Usuarios</span>
				<form class="form" action="ins_usuarios.php" method="post" enctype="multipart/form-data">
					<div class="input-field">
					<input type="text" name="nick" required autofocus title="Debe contener entre 8 y 15 caracteres" pattern="[A-Za-z]{8,15}" id="nick" onblur="may(this.value, this.id)">
					<label for="nick">Nick</label>
				</div>
				<div class="validar"></div>

				<div class="input-field">
					<input type="password" name="pass1" title="Introduce una contrasena segura" id="pass1" required>
						<label for="pass1">Contrasena</label>
				</div>

				<div class="input-field">
					<input type="password" title="Introduce una contrasena segura"" id="pass2" require>
						<label for="pass2">Repetir Contrasena</label>

				</div>

				<select name="nivel" required>
					<option value="" disabled selected>Elige un nivel de usuario</option>
					<option value="ADMINISTRADOR">Administrador</option>
					<option value="ASESOR">Asesor</option>
				</select>

				<div class="input-field">
					<input type="text" name="nombre" title="Nombre del usuario" id="nombre" pattern="[A-Z/s ]+" require onblur="may(this.value, this.id)">
						<label for="nombre">Nombre</label>
				</div>

				<div class="input-field">
					<input type="email" name="correo" title="Introduce tu correo" id="correo">
						<label for="correo">Correo</label>
				</div>

				<div class="file-field input-file">
					<div class="btn">
						<span>Foto:</span>
						<input type="file" name="foto">
					</div>
					<div class="file-path-wrapper">
						<input class="file-path validate" type="text">
					</div>
				</div>

				<button type="submit" class="btn black" id="btn_guardar">Guardar <i class="material-icons">send</i></button>
				</form>
			</div>
		</div>
	</div>
</div>
	<?php $sel = $con->query("SELECT * FROM usuarios");
	$row =mysqli_num_rows($sel);
	?>
	 <div class="row">
	    <div class="col s12">
	      <div class="card blue-grey darken-1">
	        <div class="card-content white-text">
	          <span class="card-title">Usuarios (<?php echo $row ?> )</span>
	          <table>
	          	<thead>
	          		<th>Nick</th>
	          		<th>Nompre</th>
	          		<th>Correo</th>
	          		<th>Nivel</th>
	          		<th>Foto</th>
	          		<th>Bloqueo</th>
	          		<th></th>
	          		<th></th>
	          	</thead>
	          	<?php while($f = $sel-> fetch_assoc()){?>
	          		<tr>
	          		<td> <?php echo $f['nick']; ?> </td>
	          		<td> <?php echo $f['nombre']; ?> </td>
	          		<td> <?php echo $f['correo']; ?> </td>
	          		<td> <?php echo $f['nivel']; ?> </td>
	          		<td> <img src="<?php echo $f['foto']; ?>" width="50" class="circle" alt=""></td>
	          		<td> <?php echo $f['bloqueo']; ?> </td>
	          		<td></td>
	          		<td></td>
	          		</tr>

	          <?php } ?>
	          </table>
	        </div>
	        <div class="card-action">
	          <a href="#">This is a link</a>
	          <a href="#">This is a link</a>
	        </div>
	      </div>
	    </div>
	  </div>

<?php include '../extend/scripts.php'; ?>
<script src="../js/val_form.js"></script>

</body>
</html>