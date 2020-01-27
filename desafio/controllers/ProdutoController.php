<?php
require_once "models/produto.php";

class ProdutoController {

  private $produto = null;

  function __constructor($produtoModel) {
   
    $this->produto = $produtoModel;
    
  }

  
  function find($id) {
    $produto = new Produto();
    return  $produto->find($id);

    
  }
  
function vender()
{
  $lista = new self();
  $listado=$lista->getlistaProdutos();
          
  require_once './views/vender.php';
}
  

  function create() {
    require_once './views/produtos/inserir.php';
  }

  function store($request) {
    $produto = $this->produto->create($request->all());

    $_SESSION['cadastrado'] = true;

    require_once './view/produtos/list';
  }

  function edit($id) {
    $produto = $this->produto->find($id);

    return require_once './view/produtos/form';
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


      }else {
          $_SESSION['register'] = "Failed";
      }
    }else {
      $_SESSION['register'] = "failed";
     
    }
    header("Location:".base_url."produto/create"); 
    
  }
  function update($request, $id) {
    $produto = $this->produto->find($id);

    $produto->fill($request->all());

    $_SESSION['atualizado'] = true;

    /* require_once './view/produtos/list'; */
  }

  function delete($id) {
    $produto = $this->produto->find($id);

    $produto->delete();

    $_SESSION['deletado'] = true;

    require_once './view/produtos/list';
  }

  function getlistaProdutos()
  {
if (isset($_SESSION['docID'])) {
  # code...

    require_once "models/produto.php";
    require_once "models/item.php";
      $itensVenda = new item();
      $itensVenda->setDocumento( $_SESSION['docID']);
      $devolucion = $itensVenda->getListVenta();
    return  $devolucion;
  }
  

  }
}