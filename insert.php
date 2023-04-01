<?php 
include_once('config.php');
if(isset($_POST['login'])){
	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = mysqli_query($config, "SELECT * FROM  data_akun WHERE username='$username' and password='$password'");
	$data = mysqli_fetch_array($sql);
	$cek = mysqli_num_rows($sql);

	$level = $data['level'];
	$status = $data['status'];
	if($cek > 0){
		if($username=="kambing200" && $status=="aktif"){
			$_SESSION['id_anggota'] = $data['id_anggota'];
			$_SESSION['status'] = $data['status'];
			$_SESSION['level'] = $data['level'];
			header("location:dayat.php");

		}elseif($username=="gigi12" && $status=="aktif"){
			$_SESSION['id_anggota'] = $data['id_anggota'];
			$_SESSION['status'] = $data['status'];
			$_SESSION['level'] = $data['level'];
			header("location:aufar.php");

		}else{
			header("location:index.php");
		}

	}else{
		header("location:index.php");
	}

}
if(isset($_GET['logout'])){
	session_start();
	session_unset();
	session_destroy();
	session_write_close();
	setcookie(session_name(),'',0,'/');
	session_regenerate_id(true);
	header("location:index.php");
}
if(isset($_POST['saveakun1'])){

	$id = $_POST['id'];
	$id_anggota = $_POST['id_anggota'];
	$username = $_POST['username'];
	$password = $_POST['password']; 
	$bidang = $_POST['bidang'];
	$status = $_POST['status'];
	$level = $_POST['level'];

	mysqli_query($config, "INSERT INTO data_akun (id,id_anggota,username,password,bidang,status,level) VALUES (NULL, '$id_anggota','$username', '$password', '$bidang', '$status','$level')");
	header("location:data_akun.php");

}
if (isset($_GET['delete'])) {

	$id = $_GET['id'];

	mysqli_query($config, "DELETE FROM data_akun WHERE id='$id'");
	header("location:data_akun.php");
}
if (isset($_POST['edit'])) {

	$id = $_POST['id'];
	$nama = $_POST['nama'];
	$id_anggota = $_POST['id_anggota'];
	$jabatan = $_POST['jabatan'];
	$bidang = $_POST['bidang'];
	$kamar = $_POST['kamar'];
	$kelas = $_POST['kelas'];
	$ttl = $_POST['ttl'];
	$asal = $_POST['asal'];

	mysqli_query($config, "UPDATE data_anggota SET nama = '$nama', id_anggota = '$id_anggota', jabatan = '$jabatan', kamar = '$kamar',kelas = '$kelas',ttl = '$ttl',asal = '$asal',bidang = '$bidang' WHERE id ='$id'");
	header("location:data_anggota.php");
}
if(isset($_POST['tambah'])){
	$id_anggota = $_POST['id_anggota'];
	$nama = $_POST['nama']; 
	$jabatan = $_POST['jabatan']; 
	$kamar = $_POST['kamar'];
	$kelas = $_POST['kelas'];
	$ttl = $_POST['ttl'];
	$asal = $_POST['asal'];

	$sql=mysqli_query($config, "INSERT INTO data_anggota (id,id_anggota,nama,jabatan,kamar,kelas,ttl,asal) VALUES (NULL, '$id_anggota', '$nama', '$jabatan', '$kamar', '$kelas', '$ttl', '$asal')");
	header("location:data_anggota.php");
}
?>