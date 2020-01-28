<?php

class Item
{

    private $table = 'item';
    private $pk = 'codigo';

    private $id;
    private $documento;
    private $produto;
    private $db;
    private $fill = [
        'documento', 'produto',
    ];
    private $devolver;

    public function __construct()
    {
        $this->db = Database::connect();

    }

    /**
     * Get the value of id
     */
    public function getId()
    {

        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of Documento
     */
    public function getDocumento()
    {
        return $this->documento;
    }

    /**
     * Set the value of Documento
     *
     * @return  self
     */
    public function setDocumento($documento)
    {
        $this->documento = $documento;

        return $this;
    }

    /**
     * Get the value of produto
     */
    public function getProduto()
    {
        return $this->produto;
    }

    /**
     * Set the value of produto
     *
     * @return  self
     */
    public function setProduto($produto)
    {
        $this->produto = $produto;

        return $this;
    }

    public function fill($data)
    {
        foreach ($this->fill as $value) {
            $this->$value = $data[$value];
        }
    }


/*  */
    public function getcountProduct($id)
    {
        $registro;
        $devolver;
        $sql = "SELECT id_produto FROM {$this->table} WHERE id_documento = :id;";

        $this->db = Database::connect();
        $registro = $this->db->prepare($sql);

        $registro->bindParam(':id', $id, PDO::PARAM_INT);
        $registro->execute();
        $devolver = $registro->rowCount();
        return $devolver;
    }

    public function saveItens($documento, $producto)
    {
        var_dump($documento);
        var_dump($producto);
        if ($documento) {

            $inserItem;
            $sql = "INSERT INTO {$this->table} (`id_documento`, `id_produto`, `id`)
        VALUES (:id_produto, :id_documento, NULL );";

            $this->db = Database::connect();
            $inserItem = $this->db->prepare($sql);

            $inserItem->bindParam(':id_produto', $documento, PDO::PARAM_INT);
            $inserItem->bindParam(':id_documento', $producto, PDO::PARAM_INT);

            $result = $inserItem->execute();
            var_dump($result);
            $getNunItem;
            $getNunItem = new self();
            $totalProduct = $getNunItem->getcountProduct($documento);

            var_dump($totalProduct);
            $item = new self();
            $resultUpdate = $item->updateDocumentTotal($totalProduct, $documento);
            return $resultUpdate;

        } else {
            $getNunItem;
            $getNunItem = new self();
            $reun = $getNunItem->getcountProduct($_SESSION["docID"]);
            var_dump($reun);
        }

    }
    public function saveDocument($idIten, $idDoc = false)
    {

        if ($idDoc) {
            $item = new self();

            $item->saveItens($idDoc, $idIten);

        } else {

            try {

                $query = $this->db = Database::connect();
                $sql = "INSERT INTO documento (`numero`, `confirmado`, `total`)
         VALUES (NULL,null,1);";
                $query->prepare($sql);

                $query->beginTransaction();
                $query->exec($sql);
                $id_ultimo = $query->lastInsertId();
                $query->commit();

                $_SESSION["docID"] = $id_ultimo;
                $item = new self();
                $item->saveItens($_SESSION["docID"], $idIten);
            } catch (PDOExecption $e) {
                $dbh->rollback();
                print "Error!: " . $e->getMessage() . "</br>";
            }

        }

    }

    public function updateDocumentTotal($totalPoduct, $numOrder)
    {
        $documentUpdate;
        $sql = "UPDATE `documento` SET `total`=:total WHERE numero = :numero";

        $this->db = Database::connect();
        $documentUpdate = $this->db->prepare($sql);

        $documentUpdate->bindParam(':total', $totalPoduct, PDO::PARAM_INT);
        $documentUpdate->bindParam(':numero', $numOrder, PDO::PARAM_INT);

        $result = $documentUpdate->execute();
        return $result;

    }

    public function getListVenta()
    {
        $id = $this->getDocumento();

        $sql = "SELECT COUNT(produto.id) as total,produto.descricao, produto.codigo, produto.preco, produto.id
          FROM produto INNER JOIN item ON item.id_produto = produto.id && item.id_documento = :id
          group by produto.descricao";
        $lista = $this->db->prepare($sql);

        $lista->bindParam(':id', $id, PDO::PARAM_INT);

        $lista->execute();
        $resultado = $lista->fetchAll();

        return $resultado;
    }

    public function confir($confirm)
    {

        $sql = "UPDATE documento SET confirmado=:confirm WHERE numero = :numero";
        $confirmar = $this->db->prepare($sql);

        $confirmar->bindParam(':confirm', $confirm, PDO::PARAM_INT);
        $confirmar->bindParam(':numero', $_SESSION["docID"], PDO::PARAM_INT);

        $resultado = $confirmar->execute();

        var_dump($resultado);

        return $resultado;

    }

    public function ventasTotal()
    {
        $sql = "SELECT * FROM documento WHERE confirmado = 1";
        $totalProduct = $this->db->prepare($sql);

        $totalProduct->execute();

        $resultado = $totalProduct->fetchAll();

        return $resultado;
    }

}
