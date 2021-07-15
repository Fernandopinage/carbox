<?php 
include_once "../class/ClassProduto.php";
include_once "../dao/DAO.php";

class ProdutoDAO extends DAO{


    public function insertProduto(ClassProduto $ClassProduto){

        $sql = "INSERT INTO `produto`(`PRODUTO_ID`, `PEDIDO_CODSAP`, `PRODUTO_PRODUTO`, `PRODUTO_UNIDADE`, `PRODUTO_IMG`, `PRODUTO_FIXA`, `PRODUTO_STATUS`)
         VALUES (null, :PEDIDO_CODSAP, :PRODUTO_PRODUTO, :PRODUTO_UNIDADE, :PRODUTO_IMG, :PRODUTO_FIXA, :PRODUTO_STATUS)";
 
        
        $insert = $this->con->prepare($sql);
        $insert->bindValue(":PEDIDO_CODSAP", $ClassProduto->getSap());
        $insert->bindValue(":PRODUTO_PRODUTO", $ClassProduto->getProduto());
        $insert->bindValue(":PRODUTO_IMG", $ClassProduto->getImg());
        $insert->bindValue(":PRODUTO_UNIDADE", $ClassProduto->getUnidade());
        $insert->bindValue(":PRODUTO_FIXA", $ClassProduto->getFicha());
        $insert->bindValue(":PRODUTO_STATUS", $ClassProduto->getStatus());
        $insert->execute();
        
    }
    public function listaProduto(){

        $sql = "SELECT * FROM `produto` WHERE PRODUTO_STATUS = 'S'";
        $select = $this->con->prepare($sql);
        $select->execute();
        $array = array();
        
        while($row = $select->fetch(PDO::FETCH_ASSOC)){ 
            $ClassProduto = new ClassProduto();
            $ClassProduto->setID($row['PRODUTO_ID']);
            $ClassProduto->setSap($row['PEDIDO_CODSAP']);
            $ClassProduto->setProduto($row['PRODUTO_PRODUTO']);
            $ClassProduto->setUnidade($row['PRODUTO_UNIDADE']);
            $ClassProduto->setFicha($row['PRODUTO_FIXA']);
            $ClassProduto->setImg($row['PRODUTO_IMG']);
            $array[] = $ClassProduto;


        }
        return $array;

    }

    public function editarProduto(ClassProduto $ClassProduto){
        
       $sql = "UPDATE `produto` SET `PRODUTO_ID` = :PRODUTO_ID,
                                    `PRODUTO_PRODUTO`= :PRODUTO_PRODUTO,
                                    `PRODUTO_UNIDADE` = :PRODUTO_UNIDADE,
                                    `PRODUTO_IMG` = :PRODUTO_IMG,
                                    `PRODUTO_FIXA` = :PRODUTO_FIXA
                                     WHERE `PRODUTO_ID` = :PRODUTO_ID";

       $insert = $this->con->prepare($sql);
       $insert->bindValue(":PRODUTO_ID", $ClassProduto->getID());
       $insert->bindValue(":PRODUTO_PRODUTO", $ClassProduto->getProduto());
       $insert->bindValue(":PRODUTO_IMG", $ClassProduto->getImg());
       $insert->bindValue(":PRODUTO_UNIDADE", $ClassProduto->getUnidade());
       $insert->bindValue(":PRODUTO_FIXA", $ClassProduto->getFicha());
       $insert->execute();
       header('Location: ../php/home.php?p=produto/');
      
    }

    public function delete($delete){

        $sql = "UPDATE `produto` SET `PRODUTO_STATUS` = :PRODUTO_STATUS   WHERE `PRODUTO_ID` = :PRODUTO_ID";

        $insert = $this->con->prepare($sql);
        $insert->bindValue(":PRODUTO_ID", $delete);
        $insert->bindValue(":PRODUTO_STATUS", 'N');
        $insert->execute();
        header('Location: ../php/home.php?p=produto/');


    }

}
