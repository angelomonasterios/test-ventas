
<section class="totalVentas">
  <table style="width:100%">
                  <thead>
                      <tr>
                        <th>Numero</th>
                        <th>Total Vendido</th>
                        <th> </th>
                        </tr>
                  </thead>
              <?php

  if (isset($total)):

      $longitud = count($total);
      //Recorro todos los elementos
      for ($i = 0; $i < $longitud; $i++): ?>

                  <tr>
                    <th><?=$total[$i]["numero"]?> </th>
                    <th> <?=$total[$i]["total"]?> </th>
                    <th><form
            action="<?=base_url?>item/ventasDetalhes"
            method="POST"
            class="col-lg-12 col-12 "
          >
            <input type="hidden" name="detalhes" value="<?=$total[$i]["numero"]?> " />
            <button type="submit" class="btn btn-primary btn-block ">
            ver detalhes
            </button>
          </form></th>

                </tr>

              <?php endfor;
  endif;
  ?>
  </table>
 </section>