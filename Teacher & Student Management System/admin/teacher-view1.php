<?php 

       include "../DB_connection.php";
       include "data/teacher.php";
       
     
       if  (isset($_GET['teacher_id'])){
       $teacher_id = $_GET['teacher_id'];
       $teacher = getTeacherById($teacher_id,$conn);    
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Teachers</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php 
        include "inc/navteacher.php";
        if ($teacher != 0) {
     ?>
     <div class="container mt-5">
         <div class="card" style="width: 22rem;">
          <img src="../img/profile.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title text-center">@<?=$teacher['username']?></h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">First name: <?=$teacher['fname']?></li>
            <li class="list-group-item">Last name: <?=$teacher['lname']?></li>
            <li class="list-group-item">Username: <?=$teacher['username']?></li>
            <li class="list-group-item">Address: <?=$teacher['address']?></li>
            <li class="list-group-item">Date of birth: <?=$teacher['date_of_birth']?></li>
            <li class="list-group-item">Phone number: <?=$teacher['phone_number']?></li>
            <li class="list-group-item">Qualification: <?=$teacher['qualification']?></li>
            <li class="list-group-item">Email address: <?=$teacher['email_address']?></li>
            <li class="list-group-item">Gender: <?=$teacher['gender']?></li>
            <li class="list-group-item">Date of joined: <?=$teacher['date_of_joined']?></li>
          
           
            
          </ul>
          <div class="card-body">
            <a href="teacher1.php" class="card-link">Go Back</a>
          </div>
        </div>
     </div>
     <?php 
        }else {
          header("Location: teacher1.php");
          exit;
        }
     ?>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(2) a").addClass('active');
        });
    </script>
</body>
</html>
<?php 
    }else {
        header("Location: teacher1.php");
        exit;
    }
  

?>