<?php  
  session_start();
  include_once 'header.php';
?>

    <!-- custom css-->
    

    <div class="container-fluid navcontainer pl-0 pr-0">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a href="#" class="navbar-brand">Cric</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navi"><span class="navbar-toggler-icon"></span></button> 
            <div class="collapse navbar-collapse navi" >
             
            <ul class=" navbar-nav">
                <li class="nav-item  "><a href="#" class="nav-link active">Home</a></li>
                <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" type="button" data-toggle="dropdown">Matches</a>
                 <ul class="dropdown-menu bg-light ">
                   <li class="dropdown-item"><a href="" class="dropdown-link ">Up Coming Matches</a></li>
                   <li class="dropdown-item"><a href="" class="dropdown-link">Live Scores </a></li>
                   <li class="dropdown-item"><a href="" class="dropdown-link ">Previous Matches</a></li>
                   
                 </ul>
                </li>
                <li class="nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Players</a>
                  <ul class="dropdown-menu bg-light">
                    <li class="dropdown-item"><a href="player.php" class="dropdowm-link">New Player</a></li>
                    <li class="dropdown-item"><a href="plyerinfo.php" class="dropdowm-link">Player Info</a></li>
                  </ul> 
                </li>
                <li class="nav-item"><a href="#" class="nav-link">Contact Us</a></li>
                <li class="nav-item"><a href="#" class="nav-link">About Us</a></li>
                
            </ul>
            
            </div>
            <div class="collapse navbar-collapse justify-content-end navi">
            <ul class="navbar-nav">
               <?php
                 if (isset($_SESSION['auth'])) {
                   $p_id = strval($_SESSION['auth']);
                   echo '<li class="nav-item dropdown mr-5 px-5">
                        <a href="" class="nav-link dropdown-toggle   font-weight-bold " style="color:#a3a375;" data-toggle="dropdown" type="button">'.$p_id.'</a>
                        <ul class="dropdown-menu">
                        <li class="dropdown-item"><a href="profile.php" class="dropdown-link">Your Profile</a></li>
                        <li class="dropdown-item"><a href="backend/logout.php" class="dropdown-link">Logout</a></li>
                        </ul>
                        </li>';
                 }else {
                   echo '<li class="nav-item "><a href="login.php" class="nav-link">Login</a></li>
                          <li class="nav-item " ><a href="sign_up.php" class="nav-link">Sign Up</a></li>';
                 }
                ?>
            </ul> 
            </div>
             
           
        </nav>

           

    </div>

     <div class="pageName mt-4 pt-4" style="padding-top:150px">
         <h1 class="mt-4 bg-info py-2 col-3 offset-4 text-center" style="font-weight:blod ;">Player Info</h1>       
 
     </div>

  
    <div class="container-fluid table-body justufy-content-center pt-4 mt-4" style="height:calc(100vh); ">
       <!--Table-->
<table class="table table-hover table-fixed mt-10">

<!--Table head-->
<thead class="bg-success">
  <tr>
    
    <th>Id</th>
    <th>Name With Initials</th>
    <th>Phone No</th>
    <th>Action</th>
    
  </tr>
</thead>
<!--Table head-->

<!--Table body-->
<tbody>
    <?php
      include_once 'databaseConnection.php';

      $sql="select * from player";
      $result=mysqli_query($conn,$sql);
      $count=mysqli_num_rows($result);
       if($count > 0){

          while($row=mysqli_fetch_assoc($result)) { ?>
           <tr>
    
                 <td><?php echo $row['Id']   ?></td>
                 <td><?php echo $row['sname']   ?></td>
                 <td><?php echo $row['pnumber']   ?></td>
                 <td>
                  <a href="example.php?id=<?php echo $row['id'];?>" class="btn btn-info" type="button">View</a>
                  <a href="" class="btn btn-success" type="button">Edit</a>
                  <a href="" class="btn btn-danger" type="button">Delete</a>
                 </td>
    
            </tr>
 
       <?php 
          }
    } 
    
    ?>
     
   
  
</tbody>
<!--Table body-->

</table>
<!--Table-->
    
    </div>
  


<?php  
  include_once 'footer.php';
?>

