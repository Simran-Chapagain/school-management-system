

<?php 
session_start();

if (isset($_POST['uname']) &&
    isset($_POST['pass']) &&
    isset($_POST['role'])) {

	include "../DB_connection.php";

	$uname = $_POST['uname'];
	$pass = $_POST['pass'];
	$role = $_POST['role'];

	if (empty($uname)) {
		$em  = "Username is required";
		header("Location: ../login.php?error=$em");
		exit;
	}else if (empty($pass)) {
		$em  = "Password is required";
		header("Location: ../login.php?error=$em");
		exit;
	}else if (empty($role)) {
		$em  = "An error Occurred";
		header("Location: ../login.php?error=$em");
		exit;
	}else {

        if($role == '1'){
        	$sql = "SELECT * FROM admin 
        	        WHERE username = ?";
        	$role = "Admin";
        }else if($role == '2'){
        	$sql = "SELECT * FROM teachers 
        	        WHERE username = ?";
        	$role = "Teacher";
        }else {
        	$sql = "SELECT * FROM students 
        	        WHERE username = ?";
        	$role = "Student";
        }

        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname]);

        if ($stmt->rowCount() == 1) {
        	$user = $stmt->fetch();
        	$username = $user['username'];
        	$password = $user['password'];
        
        	
            if ($username === $uname) {
            	if (password_verify($pass, $password)) {
            	
            		$_SESSION['role'] = $role;
            		
				    


                    if ($role == 'Admin') {
                        $_SESSION['admin_id'] = $user['admin_id'];
                        header("Location: ../admin/index.php");

                    } else if ($role == 'Teacher') {
                        $_SESSION['teacher_id'] = $user['teacher_id'];
                        header("Location: ../admin/teacher1.php");

                    } else if ($role == 'Student') {
                        $_SESSION['student_id'] = $user['student_id'];
                        header("Location: ../admin/student1.php");
                    }
                    exit;

                } else {
                    $em  = "Incorrect Password";
                    header("Location: ../login.php?error=$em");
                    exit;
                }
            } else {
                $em  = "Incorrect Username";
                header("Location: ../login.php?error=$em");
                exit;
            }
        } else {
            $em  = "User not found";
            header("Location: ../login.php?error=$em");
            exit;
        }
    }
} else {
    header("Location: ../login.php");
    exit;
}
?>
