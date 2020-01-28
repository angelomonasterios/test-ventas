<?php if (isset($_SESSION["register"]) && $_SESSION["register"] && $_SESSION["register"] == "complete"): ?>
    <strong>Produto registrado corretamente</strong>
<?php elseif (isset($_SESSION["register"]) && $_SESSION["register"] && $_SESSION["register"] == "failed"): ?>
        <strong>Registro falhou</strong>
<?php endif;
Utils::borrarSession("register");?>


<section class="inserir">
<h2>inserir products</h2>
<form action="<?=base_url?>produto/save" method="POST"  id="inserirProducto">

<div class="form-group">
    <label for="codigo">Codigo do producto</label>
    <input type="text" class="form-control" id="codigoProducto" name="codigoProducto" aria-describedby="codigo de producto">

  </div>
  <div class="form-group">
    <label for="codigo">descricao</label>
    <input type="text" class="form-control" id="descricaoProducto" name="descricaoProducto" aria-describedby="codigo de producto">

  </div>
  <div class="form-group">
    <label for="codigo">preço do producto</label>
    <input type="number" class="form-control" id="PrecoProducto" name="PrecoProducto" aria-describedby="codigo de producto">

  </div>

  <div class="form-group">
  <button type="submit" class="btn btn-secondary btn-lg btn-block">inserir</button>
  </div>

</form>
</section>

