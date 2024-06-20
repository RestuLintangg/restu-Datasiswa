<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<table align="center">
<form action=""  method="post">
    <h3 align="center">DATA SISWA</h3>  
    <tr> 
    <td><label for="nama">Masukkan Nama</label></td>    
    <td><input type="text" name="nama" placeholder="" id="nama"><br></td>
    </tr> 
    <tr>
    <td><label for="NIS">Masukkan NIS</label></td>
    <td><input type="text" min="0" name="NIS" placeholder="" id="NIS"><br></td>
    </tr>
    <tr>
    <td><label for="Rayon">Masukkan Rayon</label></td>    
    <td><input type="text" name="Rayon" placeholder="" id="Rayon"><br></td>
    </tr>
    <tr>
    <td><button type="submit" name="kirim">Tambah<br></button></td>
    <td><button><a href="datasiswa2.php">RESET</a></button></td>
    </tr>
</form>
</table>

<?php
//memulai sesi baru
session_start();

// kalo belum ada $_SESSION ['dataStudent'] maka buat dengan array ksong
if (!isset($_SESSION['dataStudent'])) {
    $_SESSION ['dataStudent'] = array ();
}

//var_dump($_SESSION['dataStudent']);

// validasi data input user ket
if (isset($_POST ['kirim'])) {
    if(!empty($_POST['nama']) && isset ($_POST['NIS']) && isset ($_POST['Rayon'])){
        $data = [
            'nama' => $_POST ['nama'],
            'NIS' => $_POST ['NIS'],
            'Rayon' => $_POST ['Rayon']
        ];
        array_push($_SESSION['dataStudent'], $data);
    }
}
    echo '<br>';

    //validasi data yang ingin dihapus
    if (isset($_GET['hapus'])) {
        $key = $_GET['hapus'];
        unset($_SESSION['dataStudent'][$key]);
        header ('Location: datasiswa.php');
    }

    if(!empty($_SESSION['dataStudent'])) {
    foreach($_SESSION ['dataStudent'] as $key => $value){
    echo "nama :" . $value['nama'] . '<br>';
    echo "NIS :" . $value['NIS'] . '<br>';
    echo "Rayon :" . $value['Rayon'] . '<br>';
    //echo '<input type="submit" value="' . $key . '" name="hapus">';
    echo '<a href="?hapus=' . $key . '">HAPUS</a>';
    echo '<hr>';
}
}
?>
</body>
</html>