<?php
// Create a database 
include_once 'db_config.php';
$insert = false;
$delete = false;
$update = false;
$deleteMsg ="";
$updateMsg = "";
$submitMsg = "";
// Create  connection to a database
$conn = mysqli_connect($servername,$username,$password,$dbname);

// Check the connection to a database
if(!$conn){
  die( "Connection failed with an error: " . mysqli_connect_error() . "<br>");
}


if(isset($_GET["delete"])){
  $delete = true;
  $sno = $_GET["delete"];
  $sql = "DELETE FROM `Notes` WHERE `S.N` = '$sno'";
  $result = mysqli_query($conn,$sql);
  if($result){
    $deleteMsg = "Your Note has been deleted successfully.<br>";
  }

}
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST["editSNo"])){
     // Edit the note 
     $update = true;
        $title = $_POST["editTitle"];

        $Description = $_POST["editDescription"];
        $sno = $_POST["editSNo"];
        $sql = "UPDATE `Notes` SET `Title` = '$title',`Description` = '$Description' WHERE  `Notes`.`S.N` = '$sno'";
        $result = mysqli_query($conn,$sql);
        if(!$result){
          die ("Updating new notes failed! due to this error: " . mysqli_error($conn) . "<br>");
        }
        else{
          $updateMsg = "Note have been updated successfully.";
        }
    

    }


    if(isset($_POST["submit"])){
      $insert = true;

      $title=$_POST["title"];
      $Description=$_POST["description"];
      
      // SQL Query to be executed:
      $sql = "INSERT INTO `Notes`(`Title`,`Description`) VALUES ('$title','$Description')";
      
      $result = mysqli_query($conn,$sql);
      if($result && $insert){
        $submitMsg =  "The record has been inserted successfully.<br>";
      }
      else{
        die("Record has not been inserted successfully due to this error: " . mysqli_error($conn));
      }
      
      
    }
    
  }
  
  ?>
  <!--  Edit the Notes -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="modelEditLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
       <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Edit Note</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
          <div class="modal-body">
              <div class="mb-3 my-5">
                <input type="hidden" name="editSNo" id="editSNo">
                <label for="editTitle" class="form-label">Note Title</label>
                <input type="text" name="editTitle" id="editTitle" class="form-control"  aria-describedby="noteTitleHelp">
              </div>
          
             <div class="mb-3">
                <label for="editDescription" class="form-label">Note Description:</label>
                <textarea class="form-control" id="editDescription" name="editDescription"  rows="3"></textarea>
            </div>
         </div>
         
        <div class="modal-footer d-block mr-auto">
          <button type="submit" name="editSumit" class="btn btn-primary">Save Changes</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
     </form> 
    </div>
  </div>
</div>
  
      
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">PHP CRUD</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About Us</a>
          </li>
            </ul>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
</nav>

<?php 
if($insert){

  echo  '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  <strong>Success!</strong><p>'.$submitMsg. '</p>
  </div>';
}
if($update){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  <strong>Success!</strong><p>'.$updateMsg. '</p>
  </div>';
}
if($delete){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  <strong>Success!</strong><p>'.$deleteMsg. '</p>
  </div>';
}
  
?>


<div class="container my-4">
    <h2>Add Your Notes to iNotes App</h2>
    <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
      <div class="mb-3 my-5">
        <label for="title" class="form-label">Note Title</label>
        <input type="text" name="title" class="form-control" id="title" aria-describedby="emailHelp">
      </div>
    
      <div class="mb-3">
        <label for="note" class="form-label">Note Description:</label>
        <textarea class="form-control" name="description" id="note" rows="3"></textarea>
      </div>
    <button type="submit" name="submit" class="btn btn-primary btn-lg">Add Note</button>
    </form>
</div>


<div class="container-fluid table">

  <table class="table table-striped table-light" id="myTable">
    <thead>
      <tr>
        <th scope="col">S.N</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT DISTINCT  `S.N`,`Title`,`Description`,`Timestamp` FROM `Notes`";
      $result = mysqli_query($conn,$sql);
      while($row = mysqli_fetch_assoc($result)){
        echo 
      '<tr scope="row">
          <td>' . $row["S.N"] . '</td>
          <td>' . $row["Title"] . '</td>
          <td>' . $row["Description"] . '</td>
          <td>' . '<button class="btn btn-primary btn-sm mb-2 edit" id='. $row["S.N"] . '>edit</button>'. '  ' .'<button class="btn btn-danger btn-sm mb-2 delete" id='. $row["S.N"]. '>delete</button></td>
      </tr>'; 
      }
      ?>  
    </tbody>
  </table>
</div>

<?php mysqli_close($conn);?>

