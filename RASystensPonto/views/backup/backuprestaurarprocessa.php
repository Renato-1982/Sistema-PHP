<br>
<!--CONTAINER-->
<div class="container-fluid">
<div class="row align-items-center justify-content-center">
<div class="formulario col-lg-8 p-4 bg-white">
<!--CABECALHO-->
<header>
    <h4>Backup</h4>
</header>
<!--CODIGO INSERIR-->
<?php
// Configurações do banco de dados
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'rasystensponto';

// Conectar ao banco de dados
$conn = new mysqli($host, $username, $password, $database);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Caminho do arquivo de backup
$backup_file = 'c:/xampp/htdocs/RASystensPonto/db/backup/bkp_restaurar/rasystensponto_bkp.sql'; // Exemplo: '/var/www/html/backups/nome_do_arquivo.sql'

// Verifica se o arquivo existe
if (!file_exists($backup_file)) {
    die("Arquivo de backup não encontrado.");
}

// Ler o conteúdo do arquivo
$sql = file_get_contents($backup_file);

// Verifica se conseguiu ler o arquivo
if ($sql === false) {
    die("Não foi possível ler o arquivo de backup.");
}

// Executa cada comando do arquivo
$conn->multi_query($sql);

// Limpa os resultados intermediários
do {
    // Armazena cada resultado para limpar o buffer do mysqli
    if ($result = $conn->store_result()) {
        $result->free();
    }
} while ($conn->more_results() && $conn->next_result());

// Verifica se houve erro
if ($conn->errno) {
    echo "Erro ao restaurar o banco de dados: " . $conn->error;
    echo "<h5><a href='inicio.php?menuop=menu'>Voltar</a></h5>";  
} else {
    //echo "Restauração concluída com sucesso!";
    echo "<h5><span style='color:green';>Backup restaurado com sucesso!</span></h5><br>"; 
    echo "<h5><a class='btn btn-outline-primary w-100' href='inicio.php?menuop=home'><i class='bi bi-arrow-return-left'></i> Voltar</a></h5>"; 
    //echo "<h5><a href='inicio.php?menuop=home'>Voltar</a></h5>";  
}
// Fecha a conexão
$conn->close();





/*
//Modelo Celke
//receber os dados do formulário
$arquivo = $_FILES['arquivo'];
$banco = $arquivo['tmp_name'];

$servidor = ['localhost'];
$usuario = ['root'];
$senha = [''];
$dbname = ['rasystensponto'];

//criar a conexão
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);


//Ler os dados do arquivo e converter em string
$dados = file_get_contents($banco);
echo $dados;

//Executar as query do backup
mysqli_multi_query($conexao, $dados);

//$_SESSION['msg'] = "<span style='color: green'>Base de dados restaurada com sucesso!</span><br>";
//header("Location: index.php");
echo "<h3><span style='color:green';>Backup realizado com sucesso!</span></h3><br>";      
echo "<h3><a href='backupmenu.php'>Voltar</a></h3>";
*/
?>
</div>
</div>
</div>