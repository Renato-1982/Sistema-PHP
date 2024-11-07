<br>
<!--CONTAINER-->
<div class="container-fluid">
<div class="row align-items-center justify-content-center">
<div class="formulario col-lg-8 p-4 bg-white">
<!--CABECALHO-->
<header>
    <h4>Backup</h4>
</header>
<!--CODIGO BACKUP-->
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

// Diretório de destino para o backup
$backup_dir = 'C:/xampp/htdocs/RASystensPonto/db/backup/'; // Ex: '/var/www/html/backups/'

// Verifica se o diretório existe, senão tenta criar
if (!is_dir($backup_dir)) {
    mkdir($backup_dir, 0777, true);
}

// Nome do arquivo de backup
//$backup_file = $backup_dir . $database . '_backup_' . date("Y-m-d_H-i-s") . '.sql';
$backup_file = $backup_dir . $database . '_bkp' . '.sql';

// Abre o arquivo para gravação
$file = fopen($backup_file, 'w');

// Verifica se conseguiu abrir o arquivo
if (!$file) {
    die("Não foi possível criar o arquivo de backup.");
}

// Obter a lista de tabelas
$tables = $conn->query("SHOW TABLES");

while ($table = $tables->fetch_row()) {
    $table_name = $table[0];

    // Adiciona o comando DROP TABLE para evitar duplicação na restauração
    fwrite($file, "DROP TABLE IF EXISTS `$table_name`;\n");

    // Obter o comando CREATE TABLE
    $create_table_result = $conn->query("SHOW CREATE TABLE `$table_name`")->fetch_assoc();
    fwrite($file, $create_table_result['Create Table'] . ";\n\n");

    // Obter os dados da tabela
    $rows = $conn->query("SELECT * FROM `$table_name`");

    while ($row = $rows->fetch_assoc()) {
        $values = array_map(function($value) use ($conn) {
            return isset($value) ? "'" . $conn->real_escape_string($value) . "'" : "NULL";
        }, $row);

        fwrite($file, "INSERT INTO `$table_name` VALUES (" . implode(", ", $values) . ");\n");
    }
    fwrite($file, "\n");
}

// Fecha o arquivo e a conexão
fclose($file);
$conn->close();

//echo "Backup concluído com sucesso! Arquivo salvo em: $backup_file";
echo "<h5><span style='color:green';>Backup realizado com sucesso!<br> Arquivo salvo em:<br>  $backup_file</span></h5><br>";   
echo "<h5><a class='btn btn-outline-primary w-100' href='inicio.php?menuop=home'><i class='bi bi-arrow-return-left'></i> Voltar</a></h5>";     
//echo "<h5><a href='inicio.php?menuop=home'>Voltar</a></h5>";  


/*
//Modelo Celke
//INICIA A SESSAO
session_start();
//BUSCA O ARQUIVO CONEXAO
    include "./db/conexao.php";
//Ler as tabelas
$result_tabela = "SHOW TABLES";
$resultado_tabela = mysqli_query($conexao, $result_tabela);
while($row_tabela = mysqli_fetch_row($resultado_tabela)){
	$tabelas[] = $row_tabela[0];
}
//var_dump($tabelas);

$result = "";
foreach($tabelas as $tabela){
	//Pesquisar o nome das colunas
	$result_colunas = "SELECT * FROM " . $tabela;
	$resultado_colunas = mysqli_query($conexao, $result_colunas);
	$num_colunas = mysqli_num_fields($resultado_colunas);
	//echo "Quantidade de colunas na tabela: ". $tabela. " - " . $num_colunas . "<br>";
	
	//Criar a intrução para apagar a tabela caso a mesma exista no BD
	$result .= 'DROP TABLE IF EXISTS '.$tabela.';';
	
	//Pesquisar como a coluna é criada
	$result_cr_col = "SHOW CREATE TABLE " . $tabela;
	$resultado_cr_col = mysqli_query($conexao, $result_cr_col);
	$row_cr_col = mysqli_fetch_row($resultado_cr_col);
	//var_dump($row_cr_col);
	$result .= "\n\n" . $row_cr_col[1] . ";\n\n";
	//echo $result;
	
	//Percorrer o array de colunas
	for($i = 0; $i < $num_colunas; $i++){
		//Ler o valor de cada coluna no bando de dados
		while($row_tp_col = mysqli_fetch_row($resultado_colunas)){
			//var_dump($row_tp_col);
			//Criar a intrução da Query para inserir os dados
			$result .= 'INSERT INTO ' . $tabela . ' VALUES(';
			
			//Ler os dados da tabela
			for($j = 0; $j < $num_colunas; $j++){
				//addslashes — Adiciona barras invertidas a uma string
				$row_tp_col[$j] = addslashes($row_tp_col[$j]);
				//str_replace — Substitui todas as ocorrências da string \n pela \\n
				$row_tp_col[$j] = str_replace("\n", "\\n", $row_tp_col[$j]);
				
				if(isset($row_tp_col[$j])){
					if(!empty($row_tp_col[$j])){
						$result .= '"' . $row_tp_col[$j].'"';
					}else{
						$result .= 'NULL';
					}
				}else{
					$result .= 'NULL';
				}
				
				if($j < ($num_colunas - 1)){
					$result .=',';
				}				
			}
			$result .= ");\n";
		}
	}
	$result .= "\n\n";
	//echo $result;
}

//Criar o diretório de backup
$diretorio = 'C:/xampp/htdocs/RASystensPonto/db/backup/';
//C:\xampp\htdocs\RASystensPonto\db\backup
//$diretorio = 'backup/';
if(!is_dir($diretorio)){
	mkdir($diretorio, 0777, true);
	chmod($diretorio, 0777);
}

//Nome do arquivo de backup
$data = date('Y-m-d-h-i-s');
$nome_arquivo = $diretorio . "db_backup_".$data;
//echo $nome_arquivo;

$handle = fopen($nome_arquivo . '.sql', 'w+');
fwrite($handle, $result);
fclose($handle);

//Montagem do link do arquivo
$download = $nome_arquivo . ".sql";

//Adicionar o header para download
if(file_exists($download)){
	header("Pragma: public");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: private", false);
	header("Content-Type: application/force-download");
	header("Content-Disposition: attachment; filename=\"" . basename($download) . "\";");
	header("Content-Transfer-Encoding: binary");
	header("Content-Length: " . filesize($download));
	readfile($download);
	
	//$_SESSION['msg'] = "<span style='color: green;'>Exportado BD com sucesso</span>";
    echo "<h3><span style='color:green';>Backup realizado com sucesso!</span></h3><br>";      
    echo "<h3><a href='backupmenu.php'>Voltar</a></h3>";
}else{
	//$_SESSION['msg'] = "<span style='color: red;'>Erro ao exportar o BD</span>";
    echo "<h3><span style='color:red';>Erro ao exportar o BD!</span></h3><br>";      
    echo "<h3><a href='backupmenu.php'>Voltar</a></h3>";
}
*/
?>
</div>
</div>
</div>