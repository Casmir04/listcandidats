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

if (isset($_GET["id"]))
{
  $id = $_GET["id"];

  $sqli = "DELETE FROM candidat WHERE id ='".$id."' ";

if(mysqli_query($conn, $sqli)){
  ?>  
  <div class="alert alert-success">
    <strong>Succes!</strong> Candidat Supprimer.</a>.
  </div>
<?php 
} else{
    echo "ERROR: Could not able to execute $sqli. " . mysqli_error($conn);
  }
}
?>