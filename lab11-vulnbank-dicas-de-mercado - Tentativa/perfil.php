<?php

include('bd/conectar.php');

session_start();

if (isset($_SESSION['valor-login'])) {

    if ($_POST["editar"] == "editar") {
        $id = $_SESSION['userid'];
        $nome  = $_POST['nome'];
        $email = $_POST['email'];	
        $query = "UPDATE usuarios SET nome='".$nome."', email='".$email."' WHERE id=".$id;

        if (mysqli_query($conn_handler, $query)) {
            echo "Perfil editado com sucesso!";
	} else {
            echo "Erro ao editar o perfil, tente novamente!";
        }
    } else {
        $id = $_SESSION['userid'];
	$query = "SELECT nome, email FROM usuarios WHERE id=".$id." LIMIT 1";

        $result_set = mysqli_query($conn_handler, $query);

        if ($result_set = mysqli_query($conn_handler, $query)) {
            $row = mysqli_fetch_assoc($result_set);
	    $nome  = $row['nome'];
	    $email = $row['email'];
?>
<html>
    <body>
        <h1>Meu Perfil</h1>
	<form action="perfil.php" method="POST">
	    <label>Nome: </label>
	    <input type="text" name="nome" id="nome" value="<?php echo $nome; ?>" /> 

	    <br>
            <label>Email: </label>
	    <input type="text" name="email" id="email" value="<?php echo $email; ?>" /> 

            <br>
            <input type="hidden" name="editar" id="editar" value="editar" />
            <input type="submit" value="Atualizar" />
        </form>
    </body>
</html>
<?php
        } else {
            echo "<br>Não foi possível recuperar seu perfil";
        }

    }
    

} else {
    header("Location: inicio.php");
}
