<?php
$insert=false;
// $not_insert=false;
if(isset($_POST['name'])){
   // set connection variables
    $server = "localhost";
    $username="root";
    $password = "";
// create a database connection
    $con = mysqli_connect($server,$username,$password);
// check for connection success
    if(!$con)
    {
        die("connection to the database failed due to".mysqli_connect_error());
    }

    // echo "Success connecting to the db";
    // collect post variables
    $name = $_POST['name'];
    $jersey_no  = $_POST['jersey_no'];
    $catagory  = $_POST['catagory'];
    $runs  = $_POST['runs'];
    $wickets  = $_POST['wickets'];
    $matches  = $_POST['matches'];
    
    // $dt = $_POST['dt'];

    $sql = "INSERT INTO `cricket`.`record` (`name`, `jersey_no`, `catagory`, `runs`, `wickets`, `matches`) VALUES ('$name', '$jersey_no', '$catagory', '$runs', '$wickets', '$matches');";
    // echo $sql;
//execute the query
    if($con->query($sql)==true){
        // flag for successful insertion
        $insert=true;

        // echo "successful submition";
    }
        
    
    else{
        // $not_insert=true;
        echo "ERROR: $sql <br> $con->error";
        
    }
    //close the database connection
    $con->close();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formPhp</title>
    <link rel="stylesheet" href="design.css">
<style>
    .doc{
        background-color: rgb(112, 37, 169);
    }
</style>
</head>

<body>
  <img class="bg" src="std.jpg" alt="stadium">
  <div class="con">
<h1 class="h1">Cricket Player Records</h1>
<p> Enter the details of player</p>

<?php
if($insert==true)
{
    echo "<p class='submitMsg'>Details are recorded.<p/>";
}

?>
<form action="cricket.php" method="post">
    <input type="text" name="name" id="name" placeholder="Enter player name here">
    <input type="text" name="jersey_no" id="jersey_no" placeholder="Enter jersey number here">
    <input type="text" name="catagory" id="catagory" placeholder="Batsman/Bowler">
    <input type="text" name="runs" id="runs" placeholder="Total Runs">
    <input type="text" name="wickets" id="wickets" placeholder="Total wickets taken">
    <input type="text" name="matches" id="matches" placeholder="Total matches played">
    <button class="btn">Submit</button>
  </form>

  </div>
  
</body>
</html>
