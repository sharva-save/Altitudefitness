<?php
// Connecting to the Database
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
// else{
//     echo "Connection was successful<br>";
// }

// $sql = "SELECT * FROM `registration`";
// $result = mysqli_query($conn, $sql);

// // Find the number of records returned
// $num = mysqli_num_rows($result);
// echo $num;
// echo " records found in the DataBase<br>";
// echo "<hr>";
// // Display the rows returned by the sql query
// if($num> 0){
//     // $row = mysqli_fetch_assoc($result);
//     // echo var_dump($row);
//     // echo "<br>";
//     // $row = mysqli_fetch_assoc($result);
//     // echo var_dump($row);
//     // echo "<br>";
//     // $row = mysqli_fetch_assoc($result);
//     // echo var_dump($row);
//     // echo "<br>";
//     // $row = mysqli_fetch_assoc($result);
//     // echo var_dump($row);
//     // echo "<br>";
//     // $row = mysqli_fetch_assoc($result);
//     // echo var_dump($row);
//     // echo "<br>";
//     // $row = mysqli_fetch_assoc($result);
//     // echo var_dump($row);
//     // echo "<br>";
//     // $row = mysqli_fetch_assoc($result);
//     // echo var_dump($row);
//     // echo "<br>";

//     // We can fetch in a better way using the while loop
//     while($row = mysqli_fetch_assoc($result)){
//         // echo var_dump($row);
//         echo "Sr No: ".$row['sno'] ." <br>First Name:  ". $row['fname'] ."<br>Last Name:  ". $row['lname']."<br>Mobile No:  ". $row['mno']."<br>Address:  ". $row['add'];
//         echo "<hr>";
//         echo "<br>";
//     }


// }
?>
<table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">S.No &nbsp&nbsp</th>
          <th scope="col">First Name&nbsp&nbsp</th>
          <th scope="col">Last Name&nbsp&nbsp</th>
          <th scope="col">Mobile No &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
          <th scope="col">Address &nbsp&nbsp</th>
          <tr>
               <br>
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
          </tr>";
//           echo "<hr>";
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