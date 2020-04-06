<?php

include '../koneksi.php';

if(isset($_POST['simpan']))
{
  $nis = $_POST['nis'];
  $nama = $_POST['nama'];
  $jurusan = $_POST['jurusan'];
  $kelas = $_POST['kelas'];
  $alamat = $_POST['alamat'];
  $web = $_POST['web'];
  $css = $_POST['css'];
  $pbo = $_POST['pbo'];
  $basdat = $_POST['basdat'];
  $progdas = $_POST['progdas'];
  $jumlah = $web+$css+$pbo+$basdat+$progdas;
  $ratarata = $jumlah/5;
  if($ratarata >=90)
  {
    $pred='A';
    $ket='EXCELLENT';
  }else if($ratarata >=80 )
  {
    $pred='B';
    $ket='Baik';
  } else if($ratarata >=70 )
  {
    $pred='C';
    $ket='Cukup';
  }else if($ratarata >=60)
  {
    $pred='D';
    $ket='Kurang';
  }else if($ratarata <=50)
    {
    $pred='E';
    $ket='Rendah';
  }




  $sql = "INSERT INTO datasiswa (nis,nama,jurusan, kelas, alamat,nilai_mapel_web, nilai_mapel_css, nilai_mapel_pbo,nilai_mapel_basdat,nilai_mapel_progdas,ratarata,predikat,keterangan)
            VALUES ('$nis', '$nama', '$jurusan', '$kelas', '$alamat', '$web', '$css', '$pbo', '$basdat', '$progdas', '$ratarata', '$pred', '$ket')";

            $res = mysqli_query($koneksi, $sql);

            $count = mysqli_affected_rows($koneksi);

            if($count == 1)
            {
              header("Location: ../index.php");
            }
            else
            {
              header("Location: tambah.php");
            }


          }
          else
          {
            header("Location: tambah.php");
          }

?>