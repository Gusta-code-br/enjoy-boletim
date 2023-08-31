<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alunos";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){   
    die("Erro na conexão: ".$conn->connect_error);
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["nome"];
    $password = $_POST["turma"];

    $sql = "SELECT * FROM alunos_enjoy WHERE nome = '$username' AND turma = '$password'";
    $result = $conn->query($sql);

    if($result->num_rows == 1){
        require 'boletim.html';
    }else{
        require 'index.html';
    }
}
$conn->close();
?>

