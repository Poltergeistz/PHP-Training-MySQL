    <h1>Liste des randonnées</h1>
    <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Difficulté</th>
        <th>Distance</th>
        <th>Durée</th>
        <th>Dénivelé</th>
      </tr>
    </thead>
<tbody>
      <!-- Afficher la liste des randonnées -->
      <?php
      require 'db_login.php';
      $sql = 'SELECT * FROM hiking;';
      try{
        foreach($pdo->query($sql) as $row){
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['difficulty']."</td>";
            echo "<td>".$row['distance']."</td>";
            echo "<td>".substr($row['duration'],0,-3)."</td>";
            echo "<td>".$row['height_difference']."</td>";
            echo "<td><a name='update' href='?page=update?id=".$row['id']."'>Update</a></td>";
            echo "<td><a name='delete' href='?page=delete.php?id=".$row['id']."'>Delete</a></td>";
            echo "</tr>";
        }
        $pdo = null;
      } catch (PDOException $e){
        print "Error!:".$e->getMessage()."<br>";
        die();
} 
?>
    </table>

