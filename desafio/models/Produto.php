<?php

class Produto
{

    private $table = 'produto';
    private $pk = 'codigo';
    private $codigo;
    private $descricao;
    private $preco;
    
    private $fill = [
      'descricao', 'preco',
    ];
    
    private $db;

    public function __construct() {
        $this->db = Database::connect();
        
    }
    /**
     * Get the value of codigo
     */ 
    public function getCodigo()
    {
        
        return $this->codigo;
    }

    /**
     * Set the value of codigo
     *
     * @return  self
     */ 
    public function setCodigo($codigo)
    {
      return  $this->codigo = $codigo;

        
    }

    /**
     * Get the value of descricao
     */ 
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     *
     * @return  self
     */ 
    public function setDescricao($descricao)
    {
      return   $this->descricao = $descricao ; 

        
    }

    /**
     * Get the value of preco
     */ 
    public function getPreco()
    { 
        return $this->preco;
    }

    /**
     * Set the value of preco
     *
     * @return  self
     */ 
    public function setPreco($preco)
    {
      return  $this->preco = $preco;

       
    }




    public function find($id) {
    
      $sql = "SELECT * FROM {$this->table} WHERE {$this->pk} = :id LIMIT 1;";
      
  
      $query = $this->db->prepare($sql);
      $query->bindParam(':id',$id, PDO::PARAM_STR);
      $resultado = $query->execute();
      if ($resultado) {
        return $query->fetch();
      }else {
        return false;
      }
  
     
    }

    public function save()
    {
      
     
        $sql ="INSERT INTO {$this->table} (`id`,`codigo`, `descricao`, `preco`) VALUES (NULL,:codigo ,:descricao, :preco);";
       

       
      
        $consulta = $this->db->prepare($sql);
        $codigo = $this->getCodigo();
       $descricao = $this->getDescricao();
       $preco = $this->getPreco();
         $consulta->bindParam(':codigo',$codigo, PDO::PARAM_STR);
        $consulta->bindParam(':descricao',$descricao, PDO::PARAM_STR);
        $consulta->bindParam(':preco', $preco, PDO::PARAM_INT);
        
        $save = $consulta->execute();
        
        $result = $save ?? false;
 
        return $result;
    }

}
