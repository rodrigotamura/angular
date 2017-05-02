<?php
$db = new \PDO('sqlite:projetos.db');
$db->exec("CREATE TABLE IF NOT EXISTS projetos (id INTEGER PRIMARY KEY AUTOINCREMENT, nome VARCHAR( 255 ), desc TEXT)");

$res = $db->prepare("SELECT COUNT(*) FROM projetos");
$res->execute();
$num_rows = $res->fetchColumn();
if($num_rows < 1){
    $query = $db->prepare("INSERT INTO projetos (nome, desc) VALUES (:nome, :desc)");
    $query->execute(array(':nome' => "Rodrigo Tamura", ':desc' => "Papai"));
    $query->execute(array(':nome' => "Debora Tamura", ':desc' => "Mamãe"));
    $query->execute(array(':nome' => "Marcos Levi", ':desc' => "Filho"));
    $query->execute(array(':nome' => "Hadassa", ':desc' => "Filha"));
}



switch (@$_POST['acao']) {
    case 'add':
        $query = $db->prepare("INSERT INTO projetos (nome, desc) VALUES (:nome, :desc)");
        $query->execute(array(':nome' => $_POST['nome'], ':desc' => $_POST['desc']));
        break;
    default:
    $stm = $db->prepare("SELECT * FROM projetos");
    $stm->execute();
    $array = $stm->fetchAll();

        //$array = array(array('id'=>1,'nome'=>'Rodrigo'), array('id'=>2,'nome'=>'Debora'), array('id'=>3,'nome'=>'Levi'), array('id'=>4,'nome'=>'Hadassa'));
    echo json_encode($array);
}