<?php
require_once 'conexao.php';

if(isset($_POST['enviar'])){
    $nome = $_POST['nome'];
    $n_familiares = $_POST['n_familiares'];
    $renda = $_POST['renda'];

    $sql = "INSERT INTO pessoa (nome,n_familiares,renda) VALUES ('$nome',$n_familiares,$renda)";
    $query = mysqli_query($conn,$sql);

    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
}

if(isset($_POST['delete'])){
    $id = $_POST['id'];

    $sql = "DELETE FROM pessoa WHERE id = '$id'";

    $query = mysqli_query($conn,$sql);
}


$dados = "SELECT * FROM pessoa";
$res = mysqli_query($conn,$dados);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="issets/style.css">
    <title>crud php</title>
</head>
<body>
    <main>
        <form method="post" class="inserir">
            <h2>Insira seus dados</h2>
            <div>
                <label>Nome Completo: </label> <input type="text" name="nome"> <br>
                <label>Numero de familiares</label> <input type="number" name="n_familiares"> <br>
                <label>Renda familiar Bruta</label> <input type="number" name="renda">
            </div>
            <div class="btn">
                <button name="enviar">Confirmar</button>
            </div>
        </form>
        <section class="ver">
            <h1>Todos os dados</h1>
            <div>
                <?php
                    if(Mysqli_num_rows($res) > 0){
                        while($row = mysqli_fetch_assoc($res)){
                            echo "<div class='informacoes'>" .
                                "<label>Participante: " . $row['id'] . "</label>" .
                                "<label>Nome: " . $row['nome'] . "</label>" .
                                "<label>N° Familiares: " . $row['n_familiares'] . "</label>" .
                                "<label>Renda: " . $row['renda'] . "</label>" .
                                "<form method='post'>" .
                                "<input type='hidden' name='id' value='" . $row['id'] . "'>" .
                                "<button class='delete' name='delete'>X</button>" .  
                                "</form>" .
                                "</div>";
                        }
                    }
                ?>
            </div>
        </section>
    </main>
</body>
</html>