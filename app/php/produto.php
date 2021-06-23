<?php 
include_once "../layout/heard.php";
include_once "../class/ClassProduto.php";
include_once "../dao/ProdutoDAO.php";



if (isset($_POST['produtosalva'])) {


    if ($_POST['codigo'] != '' and $_POST['desc'] != ''  and $_POST['unidade'] != '') {

        $ClassProduto = new ClassProduo();
        $ClassProduto->setCod($_POST['codigo']);
        $ClassProduto->setDesc($_POST['desc']);
        $ClassProduto->setUnidade($_POST['unidade']);

        $Produto = new ProdutoDAO();
        $Produto->insertProduto($ClassProduto);


    } else {
?>
        <script>
            Swal.fire({
                title: 'Error!',
                text: 'Preenchar todos os campos obrigatorios!',
                icon: 'error',
                confirmButtonText: 'OK'
            })
        </script>

<?php


    }
}




?>
<link rel="stylesheet" href="../css/cliente.css">
<div class="container">

    <form id="form-cliente" action="" method="POST">
        <div class="text-left" id="title">
            <h2> NOVO PEDIDO </h2>
            <hr>
        </div>
        <div class="form-row">

            <div class="form-group col-md-2">
                <label for="inputEmail4">Código <span style="color: red;">*</span></label>
                <input type="text" class="form-control form-control-sm is-invalid" id="codigo" name="codigo" placeholder="">
            </div>
            <div class="form-group col-md-6">
                <label for="inputEmail4">Descrição <span style="color: red;">*</span></label>
                <input type="text" class="form-control form-control-sm is-invalid" id="desc" name="desc" placeholder="">
            </div>
            <div class="form-group col-md-2">
                <label for="inputEmail4">Unidade <span style="color: red;">*</span></label>
                <input type="text" class="form-control form-control-sm is-invalid" id="unidade" name="unidade" placeholder="">
            </div>
            <div class="form-group col-md-2">
                <label for="inputEmail4">Unidade <span style="color: red;">*</span></label>
                <input type="text" class="form-control form-control-sm is-invalid" id="unidade" name="unidade" placeholder="">
            </div>
        </div>

        <div id="lista">
        
        </div>



        <div class="text-right">
            <button type="submit" class="btn btn-success" name="produtosalva">Salvar</button>
        </div>

        <div class="form-row">
            <div class="form-group col-md-8">
                <p for="inputEmail4">Campos Obrigatórios<span style="color: red;">*</span></p>

            </div>

        </div>
        <hr>

    </form>

</div>

<script>

    

</script>

<?php include_once "../layout/footer.php"; ?>