<?php
include 'connect.php';
if(isset($_POST['submit'])){
               $datas=$_POST['data'];
                              // echo $datas;
               $allData=implode(" ,",$datas);
               echo $allData;
               $sql ="insert into  `checkbox` (checkbox)
               values ('$allData')";
               echo "<br>";

               $result = mysqli_query($conn, $sql);
               if($result){
                              echo "inserterd successfully<br>";
               }else{
                              die(mysqli_error($con));
               }
}

?>
<div class="container my-5">
               <form action="/Sharva/curd/checkbox.php" method="POST">
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
                            