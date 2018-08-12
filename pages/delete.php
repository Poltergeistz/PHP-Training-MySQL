<?php
/**** Supprimer une randonnée ****/

require 'db_login.php';
// 
$id = $_GET['id'];
$sql = 'DELETE * FROM hiking WHERE id = :id;';
//
if(isset($_POST['delete'])){
try{
        $del = $pdo->prepare($sql);
        $del->execute(array(':id' => $id));
        echo $del.' Element supprimé!';
        $pdo = null;
        header('location:https://localhost:8000/?page=read');
} catch (PDOException $e){
    print "Error!:".$e->getMessage()."<br>";
    die();
}
}