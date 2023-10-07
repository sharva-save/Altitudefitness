<?php  
// INSERT INTO `notes` (`sno`, `title`, `description`, `tstamp`) VALUES (NULL, 'But Books', 'Please buy books from Store', current_timestamp());
$insert = false;
$update = false;
$delete = false;
// Connect to the Database 
$servername = "localhost";
$username = "root";
$password = "";
$database = "contact";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}

if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `registration` WHERE `sno` = $sno";
  $result = mysqli_query($conn, $sql);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
if (isset( $_POST['snoEdit'])){
  // Update the record
    $sno = $_POST["snoEdit"];
    $fname = $_POST["fnameEdit"];
    $lname = $_POST["lnameEdit"];
    $mno = $_POST["mnoEdit"];
    $add = $_POST["addEdit"];
    $allData=implode(" ,",$datas);
    $allDates=$_POST["allDatesEdit"];
    echo $allData;

  // Sql query to be executed
  $sql = "UPDATE `registration` SET `fname` = '$fname' , `lname` = '$lname', `mno` = '$mno' , `add` = '$add' , `checkbox` = '$allData' WHERE `registration`.`sno` = $sno";
  $result = mysqli_query($conn, $sql);
  if($result){
    $update = true;
}
else{
    echo "We could not update the record successfully";
}
}
else{
  // $sno = $_POST["sno"];
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $mno = $_POST["mno"];
  $add = $_POST["add"];
  $datas=$_POST['data'];
  // echo $datas;
  $allData=implode(" ,",$datas);
  echo $allData;


  // Sql query to be executed
  $sql = "INSERT INTO `registration` (`fname`, `lname`,`mno`,`add`,`checkbox`) VALUES ('$fname', '$lname','$mno','$add','$allData')";
  $result = mysqli_query($conn, $sql);

   
  if($result){ 
      $insert = true;
  }
  else
  {
      echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
  }
}
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

  <title>Login Page </title>

</head>

<body>


  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit this Note</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="/Sharva/curd/curd.php" method="POST">
          <div class="modal-body">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="form-group">
              <label for="title">First Name</label>
              <input type="text" class="form-control" id="fnameEdit" name="fnameEdit" aria-describedby="emailHelp">
            </div>

            <div class="form-group">
              <label for="desc">Last Name</label>
              <textarea class="form-control" id="lnameEdit" name="lnameEdit" rows="3"></textarea>
            </div> 

            <div class="form-group">
              <label for="desc">Mobile No </label>
              <textarea class="form-control" id="mnoEdit" name="mnoEdit" rows="3"></textarea>
            </div>

            <div class="form-group">
              <label for="desc">Address</label>
              <textarea class="form-control" id="addEdit" name="addEdit" rows="3"></textarea>
            </div> 

            <div class="form-group">
              <label for="desc">Months</label>
              <div class="input-group-text">
                                             <input type="checkbox" name="data[]" value="January">January <br>
                              </div>

                              <div class="input-group-text">
                                             <input type="checkbox" name="data[]" value="February"> February <br>
                              </div>

                              <div class="input-group-text">
                                             <input type="checkbox" name="data[]" value="March"> March<br>

                              </div>

                              <div class="input-group-text">
                                             <input type="checkbox" name="data[]" value="April"> April<br>

                              </div>

                              <div class="input-group-text">
                                             <input type="checkbox" name="data[]" value="May"> May <br>

                              </div>

                              <div class="input-group-text">
                                             <input type="checkbox" name="data[]" value="June"> June <br>
                              </div>

                              <div class="input-group-text">
                                             <input type="checkbox" name="data[]" value="July"> July <br>
                              </div>

                              <div class="input-group-text">
                                             <input type="checkbox" name="data[]" value="August"> August <br>
                              </div>

                              <div class="input-group-text">
                                             <input type="checkbox" name="data[]" value="September"> September <br>
                              </div>

                              <div class="input-group-text">
                                             <input type="checkbox" name="data[]" value="October"> October  <br>
                              </div>

                              <div class="input-group-text">
                                             <input type="checkbox" name="data[]" value="November"> November <br>
                              </div>

                              <div class="input-group-text">
                                             <input type="checkbox" name="data[]" value="December"> December  <br>
                              </div>
            </div> 

          </div>
          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <!-- <a class="navbar-brand" href="#"><img src="/crud/logo.svg" height="28px" alt=""></a> -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact Us</a>
        </li>

      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>

  <?php
  if($insert){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been inserted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
  <?php
  if($delete){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
  <?php
  if($update){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been updated successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
   <div class="container my-4">
    <h2>ADD NEW ENTRY</h2>
    <form action="/Sharva/curd/curd.php" method="POST">
      <div class="form-group">
        <label for="title">First Name </label>
        <input type="text" class="form-control" id="fname" name="fname" aria-describedby="emailHelp">
      </div>

      <div class="form-group">
        <label for="desc">Last Name</label>
        <textarea class="form-control" id="lname" name="lname" rows="3"></textarea>
      </div>
      <div class="form-group">
        <label for="desc">Mobile No</label>
        <textarea class="form-control" id="mno" name="mno" rows="3"></textarea>
      </div>
      <div class="form-group">
        <label for="desc">Address</label>
        <textarea class="form-control" id="add" name="add" rows="3"></textarea>
      </div>

      <div class="container my-5">
               <form action="/Sharva/curd/curd.php" method="POST">
                              <div class="input-group-text">
                                             <input type="checkbox" name="data[]" value="January">January <br>
                              </div>

                              <div class="input-group-text">
                                             <input type="checkbox" name="data[]" value="February"> February <br>
                              </div>

                              <div class="input-group-text">
                                             <input type="checkbox" name="data[]" value="March"> March<br>

                              </div>

                              <div class="input-group-text">
                                             <input type="checkbox" name="data[]" value="April"> April<br>

                              </div>

                              <div class="input-group-text">
                                             <input type="checkbox" name="data[]" value="May"> May <br>

                              </div>

                              <div class="input-group-text">
                                             <input type="checkbox" name="data[]" value="June"> June <br>
                              </div>

                              <div class="input-group-text">
                                             <input type="checkbox" name="data[]" value="July"> July <br>
                              </div>

                              <div class="input-group-text">
                                             <input type="checkbox" name="data[]" value="August"> August <br>
                              </div>

                              <div class="input-group-text">
                                             <input type="checkbox" name="data[]" value="September"> September <br>
                              </div>

                              <div class="input-group-text">
                                             <input type="checkbox" name="data[]" value="October"> October  <br>
                              </div>

                              <div class="input-group-text">
                                             <input type="checkbox" name="data[]" value="November"> November <br>
                              </div>

                              <div class="input-group-text">
                                             <input type="checkbox" name="data[]" value="December"> December  <br>
                              </div>
                              <button type="submit" name="submit" class="btn btn-primary">submit</button>
                                             </form>
                            </div>
                            
      
      <!-- <button type="submit" class="btn btn-primary">Add Entry</button> -->
    </form>
  </div>

  <div class="container my-4">


    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">S.No</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Mobile No</th>
          <th scope="col">Address</th>
          <th scope="col">Actions</th>
          <th scope="col">Months</th>
          
        </tr>
      </thead>
      <tbody>
        <?php 
          $sql = "SELECT * FROM `registration`";
          $result = mysqli_query($conn, $sql);
          $sno = 0;
          while($row = mysqli_fetch_assoc($result)){
            $sno = $sno + 1;
            echo "<tr>
            <th scope='row'>". $sno . "</th>
            <td>". $row['fname'] . "</td>
            <td>". $row['lname'] . "</td>
            <td>". $row['mno'] . "</td>
            <td>". $row['add'] . "</td>
            <td> <button class='edit btn btn-sm btn-primary' id=".$row['sno'].">Edit</button> <button class='delete btn btn-sm btn-primary' id=d".$row['sno'].">Delete</button>  </td>
            <td>". $row['checkBox'] . "</td>
          </tr>";
        } 
          ?>


      </tbody>
    </table>
  </div>
  <hr>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();

    });
  </script>
  <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        tr = e.target.parentNode.parentNode;
        fname = tr.getElementsByTagName("td")[0].innerText;
        lname = tr.getElementsByTagName("td")[1].innerText;
        mno = tr.getElementsByTagName("td")[2].innerText;
        add = tr.getElementsByTagName("td")[3].innerText;
        checkbox = tr.getElementsByTagName("td")[4].innerText;
        console.log(fname, lname.mno,add);
        fnameEdit.value = fname;
        lnameEdit.value = lname;
        mnoEdit.value = mno;
        addEdit.value = add;
        snoEdit.value = e.target.id;
        console.log(e.target.id)
        $('#editModal').modal('toggle');
      })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        sno = e.target.id.substr(1,);

        if (confirm("Are you sure you want to delete this Entry!")) {
          console.log("yes");
          window.location = `/Sharva/curd/curd.php?delete=${sno}`;
          // TODO: Create a form and use post request to submit a form
        }
        else {
          console.log("no");
        }
      })
    })
  </script>
</body>

</html>