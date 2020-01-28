<?php

require_once "models/produto.php";
require_once "models/item.php";

class ProdutoController
{

    private $produto = null;

    public function __constructor($produtoModel)
    {

        $this->produto = $produtoModel;

    }

    public function find($id)
    {
        $produto = new Produto();
        return $produto->find($id);

    }

    public function vender()
    {
        $lista = new self();
        $listado = $lista->getlistaProdutos();

        require_once './views/vender.php';
    }

    public function create()
    {
        require_once './views/produtos/inserir.php';
    }

    public function save()
    {
        if (isset($_POST)) {
            $produto = new produto();

            $produto->setDescricao($_POST['descricaoProducto']);
            $produto->setPreco($_POST['PrecoProducto']);
            $produto->setCodigo($_POST['codigoProducto']);
            $save = $produto->save();

            if ($save) {
                $_SESSION['register'] = "complete";

            } else {
                $_SESSION['register'] = "Failed";
            }
        } else {
            $_SESSION['register'] = "failed";

        }
        header("Location:" . base_url . "produto/create");

    }

    public function delete($id)
    {
        $produto = $this->produto->find($id);

        $produto->delete();

        $_SESSION['deletado'] = true;

        require_once './view/produtos/list';
    }

    public function getlistaProdutos()
    {
        if (isset($_SESSION['docID'])) {
            # code...

            $itensVenda = new item();
            $itensVenda->setDocumento($_SESSION['docID']);
            $devolucion = $itensVenda->getListVenta();
            return $devolucion;
        }

    }
}
