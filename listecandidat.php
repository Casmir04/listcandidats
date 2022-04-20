<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbgestioncadidat";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

date_default_timezone_set('UTC');
$dateTimeNow = date('Y-m-d H:i:s');

function inputSanitize($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = addslashes($data);
  return $data;
}
function checkEmptyInput($data) 
{
if (empty($data)) 
	{
	?>
    <div class="alert alert-danger">
      <strong>Erreur!</strong> Tous les champs sont obligatoires.</a>.
    </div>
  <?php 
	}
  else 
	{
		$data =  inputSanitize($data);
		return $data;
	}
}

date_default_timezone_set('UTC');
$dateTimeNow = date('Y-m-d H:i:s');

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
  $nom = checkEmptyInput($_POST["nom"]);
  $prenom = checkEmptyInput($_POST["prenom"]);
  $age = checkEmptyInput($_POST["age"]);
  $sexe = checkEmptyInput($_POST["sexe"]);
  $nationalite = checkEmptyInput($_POST["nationalite"]);
  $adresse = checkEmptyInput($_POST["adresse"]);
  $situation = checkEmptyInput($_POST["situation"]);
  $diplome = checkEmptyInput($_POST["diplome"]);
  $dateheure = $dateTimeNow;

  $photoC = "photo-".uniqid().".jpg";
  $photoUrlToSave = "photos/".$photoC;
  move_uploaded_file($_FILES['photoC']['tmp_name'],$photoUrlToSave); 

  $sql = "INSERT INTO candidat (nom, prenom, age, photo, diplome, sexe, adresse, nationalite, dateHeure, situation) VALUES ('$nom', '$prenom', '$age', '$photoUrlToSave', '$diplome' , '$sexe', '$adresse', '$nationalite', '$dateheure','$situation')";
if(mysqli_query($conn, $sql)){
  ?>
  <div class="alert alert-success">
    <strong>Succes!</strong> Candidat enregidtrer.</a>.
  </div>
<?php 
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
  }
}
?>
<html lang="en">
<head>
  <title></title>
 <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
 <?php
  $sql = "SELECT * FROM candidat ORDER BY id DESC";
$result = $conn->query($sql);
?>
<?php
if ($result->num_rows > 0) {

 ?>
 <body>
   <br>
 <a href="NewDataform1.php" type="button" class="btn btn-primary btn-lg" style= " margin-left:140px;" >Ajouter un nouveau candidats</a>
 <br><br>
<div class="panel-group" style="width:80%; margin-left:140px; justify-content:center;">
    <div class="panel panel-primary">
      <div class="panel-heading" style="text-align: center; font-size:20px; letter-spacing: 2px;">LISTE DES CANDIDATS</div>
      <div class="panel-body">
  <table id="example" class="display" style="width:100%; font-size: 11.5px">
  <thead>
            <tr>
                <th>id</th>
                <th>nom et prenom</th>
                <th>Age et sexe</th>
                <th>situation et nationalite</th>
                <th>diplome et adresse</th>
                <th>photo</th>
                <th>DateHeure</th>
                <th></th>
            </tr>
        </thead>
  <?php while($row = $result->fetch_assoc()) { 
  ?> 
  
    <tr>
      <td><?php echo $row["id"]; ?></td>
      <td><?php echo $row["nom"] ?> 
    <br>
    <?php echo $row["prenom"]; ?>
  </td>
      <td>
      <span class="glyphicon glyphicon-calendar"></span>
        <?php echo $row["age"]."ans";?>
    <br>
    <span class="glyphicon glyphicon-user"></span>
    <?php  
      if ($row["sexe"] == 0){
        echo "feminin";
      }else{
        echo "masculin";
      } ?>
  </td>
      <td>
      <span class="glyphicon glyphicon-heart"></span>
        <?php echo $row["situation"]; ?>
    <br>
    <span class="glyphicon glyphicon-globe"></span>
    <?php echo $row["nationalite"]; ?>
  </td>
      <td>
      <span class="glyphicon glyphicon-education"></span>
      <?php echo $row["diplome"]; ?>
    <br>
    <span class="glyphicon glyphicon-home"></span> 
    <?php echo $row["adresse"]; ?>
    </td>
    <td><img src="<?php echo $row["photo"];?>" height="50px";></td>
    <td><?php echo $row["dateHeure"]; ?></td>
    <td>
    <a href="supprimer.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-lg">
          <span class="glyphicon glyphicon-remove"></span>  
        </a>    
    </td>

  <?php
  }
  ?>
  </table>
  </div>
    </div>
  <?php

} else {
  echo "0 results";
}

?> 

    <script>
        var $  = require( 'jquery' );
        var dt = require( 'datatables.net' )( window, $ );
    </script>
    <script>$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
 <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
  <script src ="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"></script>
  <script src ="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.css"/>
 <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</body>

</head>

</html>

<?php $conn->close(); ?>