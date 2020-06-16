<?php

class Cardapio {
    private $id;
    private $codigo;
    private $desc_produto;
    private $preco;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getCodigo(){
        return $this->codigo;
    }

    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }

    public function getDesc_produto(){
        return $this->desc_produto;
    }

    public function setDesc_produto($desc_produto){
        $this->desc_produto = $desc_produto;
    }

    public function getPreco(){
        return $this->preco;
    }

    public function setPreco($preco){
        $this->preco = $preco;
    }

    public function loadById($id){
        // ESSE METODO CARREGA OS DADOS DO BANCO PARA O OBJETO INSTANCIADO

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM cardapio WHERE id = :ID", array(
            ":ID"=>$id
        ));

        if (count($results) > 0){
            $this->setData($results[0]);
        }
    }

    public static function getList(){
        $sql = new Sql();

        return $sql->select("SELECT * FROM cardapio ORDER BY desc_produto;");
    }

    public static function search($desc_produto){
        $sql = new Sql();

        return $sql->select("SELECT * FROM cardapio WHERE desc_produto LIKE :SEARCH ORDER BY desc_produto", array(
            ':SEARCH'=>"%".$desc_produto."%"
        ));
    }

    public function setData($data) {
        $this->setId($data['id']);
        $this->setCodigo($data['codigo']);
        $this->setDesc_produto($data['desc_produto']);
        $this->setPreco($data['preco']);
    }

    public function insert(){
        $sql = new Sql();
        $results = $sql->select("CALL sp_cardapio_insert(:CODIGO, :DESC_PRODUTO, :PRECO)", array(
            ':CODIGO'=>$this->getCodigo(),
            ':DESC_PRODUTO'=>$this->getDesc_produto(),
            ':PRECO'=>$this->getPreco()
        ));

        if (count($results) > 0 ){
            $this->setData($results[0]);
        }

    }

    public function exibir(){
        return array(
            "id"=>$this->getId(),
            "codigo"=>$this->getCodigo(),
            "desc_produto"=>$this->getDesc_produto(),
            "preco"=>$this->getPreco()
        );
    }

    public function __construct($codigo = 0, $desc_produto = "", $preco = 0) {
        $this->setCodigo($codigo);
        $this->setDesc_produto($desc_produto);
        $this->setPreco($preco);
    }
    
    public function __toString(){
        return json_encode(array(
            "id"=>$this->getId(),
            "codigo"=>$this->getCodigo(),
            "desc_produto"=>$this->getDesc_produto(),
            "preco"=>$this->getPreco()
        ));
    }
    
}

?>