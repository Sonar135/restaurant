<?php
    include 'connect.php';


    
    function create_student($conn, $email, $fname, $department, $phone, $password, $confirm , $matric, $year, $prefi){

        $user_type="student";
  
        $insert= "INSERT INTO students (name,  phone, matric,  email, prefix, department, year, password, user_type) VALUES (?,?,?,?,?,?,?,?,?)";   
        
      

        if($insert){
            mysqli_query($conn, "INSERT into week1 (matric_no) values('$matric')");
            mysqli_query($conn, "INSERT into week2 (matric_no) values('$matric')");
            mysqli_query($conn, "INSERT into week3 (matric_no) values('$matric')");
            mysqli_query($conn, "INSERT into week4 (matric_no) values('$matric')");
            mysqli_query($conn, "INSERT into week5 (matric_no) values('$matric')");
            mysqli_query($conn, "INSERT into week6 (matric_no) values('$matric')");
            mysqli_query($conn, "INSERT into week7 (matric_no) values('$matric')");
            mysqli_query($conn, "INSERT into week8 (matric_no) values('$matric')");
            mysqli_query($conn, "INSERT into week9 (matric_no) values('$matric')");
            mysqli_query($conn, "INSERT into week10 (matric_no) values('$matric')");
            mysqli_query($conn, "INSERT into week11 (matric_no) values('$matric')");
            mysqli_query($conn, "INSERT into week12 (matric_no) values('$matric')");
            mysqli_query($conn, "INSERT into week13 (matric_no) values('$matric')");
            mysqli_query($conn, "INSERT into week14 (matric_no) values('$matric')");
            mysqli_query($conn, "INSERT into week15 (matric_no) values('$matric')");
            mysqli_query($conn, "INSERT into week16 (matric_no) values('$matric')");
            mysqli_query($conn, "INSERT into week17 (matric_no) values('$matric')");
            mysqli_query($conn, "INSERT into week18 (matric_no) values('$matric')");
            mysqli_query($conn, "INSERT into week19 (matric_no) values('$matric')");
            mysqli_query($conn, "INSERT into week20 (matric_no) values('$matric')");
            mysqli_query($conn, "INSERT into week21 (matric_no) values('$matric')");
            mysqli_query($conn, "INSERT into week22 (matric_no) values('$matric')");
            mysqli_query($conn, "INSERT into week23 (matric_no) values('$matric')");
            mysqli_query($conn, "INSERT into week24 (matric_no) values('$matric')");
            mysqli_query($conn, "INSERT into week25 (matric_no) values('$matric')");
            mysqli_query($conn, "INSERT into week26 (matric_no) values('$matric')");
        }

        $stmt2=mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt2, $insert)){
            header("location: student_auth.php?error=stmtfailed");
            exit();
        }
    
        
        $hashed_pwd=password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt2, 'sssssssss', $fname, $phone, $matric,  $email, $prefix, $department, $year, $hashed_pwd, $user_type);
        mysqli_stmt_execute($stmt2);
        mysqli_stmt_close($stmt2);
        
        header("location: student_auth.php?error=success");
        exit();
    }



    function emptysignup($email, $fname, $department, $phone, $password, $confirm , $matric, $year){
        $result;
        if($email=="" or $fname=="" or $department=="" or $phone=="" or $password=="" or $confirm=="" or $matric=="" or $year==""){
            $result= true;
        }
        else {
            $result=false;
        } 

        return $result;
    }

    function emptylogin($email, $password){
        $result;
        if($email=="" or $password==""){
            $result= true;
        }
        else {
            $result=false;
        } 

        return $result;
    }


    function invalid_password($password){
        // Check if password contains at least one uppercase letter, one lowercase letter, and one special character
        if (!preg_match('/[A-Z]/', $password) || // Check for at least one uppercase letter
            !preg_match('/[a-z]/', $password) || // Check for at least one lowercase letter
            !preg_match('/[^a-zA-Z0-9]/', $password)) { // Check for at least one special character
            return true; // Password does not meet the criteria
        } else {
            return false; // Password meets the criteria
        }
    }

    function invalid_email($email){
        $result;
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $result= true;
        }

        else{
            $result= false;
        }

        return $result;
    
    }


    function pwd_match($password, $confirm){
        $result;
        if($password !== $confirm){
            $result= true;
        }
        
        else{
            $result=false;
        }
        return $result;
    }

    function email_exists($conn, $email){
        $result;
    
        $query="SELECT * FROM students WHERE email=?";
    
        $stmt=mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $query)){
            header("location: super_auth.php?error=stmtfailed");
            exit();
        }
    
        
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result= mysqli_stmt_get_result($stmt);
    
        if($row=mysqli_fetch_assoc($result)){
            return $row;
        }

        else{
            $result= false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }






    function matric_exists($conn, $matric){
        $result;
    
        $query="SELECT * FROM students WHERE matric=?";
    
        $stmt=mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $query)){
            header("location: super_auth.php?error=stmtfailed");
            exit();
        }
    
        
        mysqli_stmt_bind_param($stmt, "s", $matric);
        mysqli_stmt_execute($stmt);
        $result= mysqli_stmt_get_result($stmt);
    
        if($row=mysqli_fetch_assoc($result)){
            return $row;
        }

        else{
            $result= false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }

    

    function login($conn, $matric, $password){
        $uidexist= matric_exists($conn, $matric);

        if($uidexist===false){
            header("location: student_auth.php?error=wrongLogin");
            exit();
        }

        $pwdHashed=$uidexist["password"];
        $checkedpwd=password_verify($password, $pwdHashed);

        if($checkedpwd===false){
            header("location: student_auth.php?error=wrongLogin");
            exit();
        }

        else if($checkedpwd===true){
            session_start();

            $_SESSION["id"]=$uidexist["id"];
            $_SESSION['siwesid']=$uidexist['siwesid'];
            $_SESSION["email"]=$uidexist["email"];
            $_SESSION['phone']=$uidexist['phone'];
            $_SESSION['user_type']=$uidexist['user_type'];
          
     
   
         

            header("location: main.php");
            exit();
        }
    }

















    // creating the supervisors...............................................................................................................//////////////////////////




    function sup_email_exists($conn, $email){
        $result;
    
        $query="SELECT * FROM supervisors WHERE email=?";
    
        $stmt=mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $query)){
            header("location: super_auth.php?error=stmtfailed");
            exit();
        }
    
        
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result= mysqli_stmt_get_result($stmt);
    
        if($row=mysqli_fetch_assoc($result)){
            return $row;
        }

        else{
            $result= false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }


    function create_super($conn, $email, $fname,  $phone, $password, $confirm , $prefix){
        $user_type="supervisor";
  
        $insert= "INSERT INTO supervisors (name,  phone, email, prefix,  password, user_type) VALUES (?,?,?,?,?,?)";

        $stmt2=mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt2, $insert)){
            header("location: super_auth.php?error=stmtfailed");
            exit();
        }
    
        
        $hashed_pwd=password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt2, 'ssssss', $fname, $phone,  $email, $prefix, $hashed_pwd, $user_type);
        mysqli_stmt_execute($stmt2);
        mysqli_stmt_close($stmt2);
        
        header("location: super_auth.php?error=success");
        exit();
    }


    function empty_sup_signup($email, $fname, $phone, $password, $confirm ){
        $result;
        if($email=="" or $fname=="" or  $phone=="" or $password=="" or $confirm=="" ){
            $result= true;
        }
        else {
            $result=false;
        } 

        return $result;
    }



    function sup_login($conn, $email, $password){
        $uidexist= sup_email_exists($conn, $email);

        if($uidexist===false){
            header("location: super_auth.php?error=wrongLogin");
            exit();
        }

        $pwdHashed=$uidexist["password"];
        $checkedpwd=password_verify($password, $pwdHashed);

        if($checkedpwd===false){
            header("location: super_auth.php?error=wrongLogin");
            exit();
        }

        else if($checkedpwd===true){
            session_start();

            $_SESSION["id"]=$uidexist["id"];
            $_SESSION['siwesid']=$uidexist['siwesid'];
            $_SESSION["email"]=$uidexist["email"];
            $_SESSION['phone']=$uidexist['phone'];
            $_SESSION['user_type']=$uidexist['user_type'];
          
     
   
         

            header("location: main.php");
            exit();
        }
    }
















    // creating the coordinators...............................................................................................................//////////////////////////








    function coor_email_exists($conn, $email){
        $result;
    
        $query="SELECT * FROM coordinators WHERE email=?";
    
        $stmt=mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $query)){
            header("location: coor_auth.php?error=stmtfailed");
            exit();
        }
    
        
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result= mysqli_stmt_get_result($stmt);
    
        if($row=mysqli_fetch_assoc($result)){
            return $row;
        }

        else{
            $result= false;
            return $result;
        }

        mysqli_stmt_close($stmt);
    }


    function create_coor($conn, $email, $fname,  $phone, $password, $confirm , $prefix){
        $user_type="coordinator";
  
        $insert= "INSERT INTO coordinators (name,  phone, email, prefix,  password, user_type) VALUES (?,?,?,?,?,?)";

        $stmt2=mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt2, $insert)){
            header("location: coor_auth.php?error=stmtfailed");
            exit();
        }
    
        
        $hashed_pwd=password_hash($password, PASSWORD_DEFAULT);

        mysqli_stmt_bind_param($stmt2, 'ssssss', $fname, $phone,  $email, $prefix, $hashed_pwd, $user_type);
        mysqli_stmt_execute($stmt2);
        mysqli_stmt_close($stmt2);
        
        header("location: coor_auth.php?error=success");
        exit();
    }


    function empty_coor_signup($email, $fname, $phone, $password, $confirm ){
        $result;
        if($email=="" or $fname=="" or  $phone=="" or $password=="" or $confirm=="" ){
            $result= true;
        }
        else {
            $result=false;
        } 

        return $result;
    }



    function coor_login($conn, $email, $password){
        $uidexist= coor_email_exists($conn, $email);

        if($uidexist===false){
            header("location: coor_auth.php?error=wrongLogin");
            exit();
        }

        $pwdHashed=$uidexist["password"];
        $checkedpwd=password_verify($password, $pwdHashed);

        if($checkedpwd===false){
            header("location: coor_auth.php?error=wrongLogin");
            exit();
        }

        else if($checkedpwd===true){
            session_start();

            $_SESSION["id"]=$uidexist["id"];
            $_SESSION['siwesid']=$uidexist['siwesid'];
            $_SESSION["email"]=$uidexist["email"];
            $_SESSION['phone']=$uidexist['phone'];
            $_SESSION['user_type']=$uidexist['user_type'];
          
     
   
         

            header("location: main.php");
            exit();
        }
    }
?>