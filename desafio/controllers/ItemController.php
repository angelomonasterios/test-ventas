<?php


class ItemController
{

    private $item = null;

    public function __constructor()
    {
        
        $this->item = new item();
    }
    /* guargar y la venta actual en documento y en la tabla itens */
    public function save()
    {
        if (isset($_POST)) {
          require_once "models/produto.php";
          require_once "models/item.php";
            $produto = new Produto();
/* consultando la existencia del producto */
            $resultado = $produto->find($_POST["codigo"]);

            if ($resultado) {
                /* variable de seccion que nos dice si se registro va venta o no */
                $_SESSION['register'] = "complete";

                $guardarRegistro = new Item();
                /* validando si existe un documento si no lo hay se crea uno */
                if (isset($_SESSION['docID']) && !empty($_SESSION['docID'])) {

                    $guardarRegistro->saveDocument($resultado["id"], $_SESSION['docID']);
                } else {
                    $guardarRegistro->saveDocument($resultado["id"], false);
                }
                $lista = new self();
                $lista->getlistaProdutos();
                var_dump($lista);
            } else {
                $_SESSION['register'] = "Failed";
            }
        } else {
            $_SESSION['register'] = "failed";

        }
        header("Location:" . base_url . "produto/vender");

    }

    public function getlistaProdutos()
    {

        $itensVenda = new item();
        $itensVenda->setDocumento($_SESSION['docID']);
        $devolucion = $itensVenda->getListVenta();
        return $devolucion;

    }

    public function confirm()
    {
        if (isset($_POST['confirm']) && isset($_SESSION['docID'])) {
            # code...
            require_once "models/item.php";
            $confirm = new item();

            switch ($_POST['confirm']) {
                case '1':
                    $result = $confirm->confir(1);
                    break;
                case '0':
                    $result = $confirm->confir(0);
                    break;
                default:
                    echo "error";
                    break;
            }
            var_dump($result);
            if ($result) {
                $borrarSession = new Utils();
                $borrado = $borrarSession->borrarSession("docID");

            }
            header("Location:" . base_url . "produto/vender");

        }
    }

    public function ventasConfirmadas()
    {
        require_once "models/item.php";
        $totalVentas = new item();
        $total = $totalVentas->ventasTotal();

        require_once './views/produtos/totalVentas.php';

    }

    public function ventasDetalhes()
    {
        require_once "models/item.php";
        $itensVenda = new item();
        $itensVenda->setDocumento($_POST['detalhes']);
        $devolucion = $itensVenda->getListVenta();

        require_once './views/produtos/ventaDetalhes.php';

    }

}
