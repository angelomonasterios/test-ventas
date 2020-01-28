<section>
  <div id="ventasContainer" class="container">
    <div class="row">
      <!-- row -->
      <h2>
        Venda atual:
        <?php if (isset($_SESSION["docID"]) && $_SESSION["docID"]): ?>
        <strong><?=$_SESSION["docID"]?></strong>
        <?php endif;?>
      </h2>
    </div>
    <!-- end row -->

    <div class="row mt-3">
      <!-- row -->

      <form
        action="<?=base_url?>item/save"
        method="POST"
        class="registroProductos"
        style="width: 100%;"
      >
      <div class="row">
        <div class="col-12 col-sm-9">
          <h3>lista de produtos</h3>
          <div class="mostrador">
            <table style="width:100%">
              <thead>
                <tr>
                  <th>Codigo</th>
                  <th>Descricao</th>
                  <th>Preco</th>
                  <th>Quantidade</th>
                </tr>
              </thead>
              <?php
if (isset($listado)):

    $longitud = count($listado);
    //Recorro todos los elementos
    for ($i = 0; $i < $longitud; $i++): ?>

	              <tr>
	                <th><?=$listado[$i]["codigo"]?></th>
	                <th><?=$listado[$i]["descricao"]?></th>
	                <th><?=$listado[$i]["preco"]?></th>
	                <th><?=$listado[$i]["total"]?></th>
	              </tr>

	              <?php endfor;
endif;
?>
            </table>
          </div>
        </div>
        <div class="form-group col-12 col-sm-3">
          <label for="codigo">Codigo do producto</label>
          <input
            type="text"
            class="form-control"
            id="codigo"
            name="codigo"
            aria-describedby="codigo de producto"
          />
          <button type="submit" class="btn btn-secondary left-position">
            OK
          </button>
          <?php if (isset($_SESSION["register"]) && $_SESSION["register"] && $_SESSION["register"] == "complete"): ?>
          <strong>Agregado corretamente</strong>
          <?php elseif (isset($_SESSION["register"]) && $_SESSION["register"] && $_SESSION["register"] == "Failed"): ?>
          <strong>Produto não cadastrado</strong>
          <?php endif;
Utils::borrarSession("register");?>
        </div>
      </form>
    </div>
    </div>
    <!-- end row -->
    <div class="row d-flex justify-content-between">
      <form
        action="<?=base_url?>item/confirm"
        method="POST"
        class="col-lg-2 col-12 pb-3"
      >
        <input type="hidden" name="confirm" value="0" />
        <button type="submit" class="btn btn-danger btn-block ">
          Cancelar
        </button>
      </form>
      <form
        action="<?=base_url?>item/confirm"
        method="POST"
        class="col-lg-2 col-12 "
      >
        <input type="hidden" name="confirm" value="1" />
        <button type="submit" class="btn btn-primary btn-block ">
          Confirmar
        </button>
      </form>
    </div>
  </div>
</section>
