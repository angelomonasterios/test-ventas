<section class="detallesProdutos">
  <a href="<?=base_url?>item/ventasConfirmadas">Voltar</a>
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
              if (isset($devolucion)):
              
                $longitud = count($devolucion);
                //Recorro todos los elementos
                for($i=0; $i<$longitud; $i++):  ?>

                <tr>
                  <th><?= $devolucion[$i]["codigo"]?></th>
                  <th><?= $devolucion[$i]["descricao"]?></th>
                  <th><?= $devolucion[$i]["preco"]?></th>
                  <th><?= $devolucion[$i]["total"]?></th>
                </tr>

                <?php  endfor; 
                    endif;
            ?>
  </table>
</section>