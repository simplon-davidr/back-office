<?php

session_start();
if (isset($_GET["tel"])){
  $tel=$_GET["tel"];
}
if (isset($_GET["mail"])){
  $mail=$_GET["mail"];
}

$iduser=$_SESSION["iduser"];

try {
  $connect=new PDO('mysql:host=localhost;dbname=simplonsite;charset=utf8','root','root');
}
catch (Exception $e){
  die ('erreur : '.$e->getMessage());
}

$insertion ="UPDATE lien SET tel=:tel WHERE id=:iduser";
$requete1 = $connect->prepare($insertion);
$requete1->bindParam(':tel', $tel, PDO::PARAM_INT);
$requete1->bindParam(':iduser', $iduser, PDO::PARAM_INT);
$requete1->execute(); // renvoie TRUE || FALSE


$insertion ="UPDATE lien SET mail=:mail WHERE id=:iduser";
$requete = $connect->prepare($insertion);
$requete->bindParam(':mail', $mail, PDO::PARAM_STR);
$requete->bindParam(':iduser', $iduser, PDO::PARAM_INT);
$requete->execute(); // renvoie TRUE || FALSE
?>
