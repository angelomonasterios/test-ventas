<div style="whith:88%;">
<h1>Registrese</h1>
<?php if (isset($_SESSION["register"]) && $_SESSION["register"] && $_SESSION["register"] == "complete"): ?>
    <strong>Registro completado de manera correcta</strong>
<?php elseif (isset($_SESSION["register"]) && $_SESSION["register"] && $_SESSION["register"] == "failed"): ?>
        <strong>Registro fallido</strong>
<?php endif;  Utils::borrarSession("register"); ?>
<form action="<?=base_url?>usuario/save" style=" display: flex; flex-direction: column;" method="POST">

<label for="nombre">Nombre</label>
<input type="text" name="nombre" id="">

<label for="apellido">Apellido</label>
<input type="text" name="apellido" id="">

<label for="email">Email</label>
<input type="email" name="email" id="">

<label for="password">Password</label>
<input type="password" name="password" id="">
<input type="submit" value="registrarme">
</form>

</div>