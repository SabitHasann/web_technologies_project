<?php
    session_start();
    require_once('../Models/alldb.php');

    if(isset($_REQUEST["signup"]))
    {
        $name = trim($_REQUEST["name"]);
        $email = trim($_REQUEST["email"]);
        $phone = trim($_REQUEST["phone"]);
        $dob = $_REQUEST["dob"];
        $gender = $_REQUEST["gender"];
        $address = trim($_REQUEST["address"]);
        $salary = trim($_REQUEST["salary"]);
        $qualification = trim($_REQUEST["qualification"]);
        $speciality = trim($_REQUEST["speciality"]);
        $password = trim($_REQUEST["password"]);

        //Set all field session
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['phone'] = $phone;
        $_SESSION['dob'] = $dob;
        $_SESSION['gender'] = $gender;
        $_SESSION['address'] = $address;
        $_SESSION['salary'] = $salary;
        $_SESSION['qualification'] = $qualification;
        $_SESSION['speciality'] = $speciality;
        $_SESSION['password'] = $password;

        //Unset all field session
        function unsetAllField()
        {
            unset($_SESSION['name']);
            unset($_SESSION['email']);
            unset($_SESSION['phone']);
            unset($_SESSION['dob']);
            unset($_SESSION['gender']);
            unset($_SESSION['address']);
            unset($_SESSION['salary']);
            unset($_SESSION['qualification']);
            unset($_SESSION['speciality']);
            unset($_SESSION['password']);
        }
        
        //Auto username
        function generateUserName()
        {
            $varNewDoctorUserName = "";
            $varLastDoctorUserName = lastUserName();
            
            if($varLastDoctorUserName == "")
            {
                $varNewDoctorUserName = "D-100";
            }
            else
            {
                $varNewDoctorUserName = substr($varLastDoctorUserName,2);
                $varNewDoctorUserName = intval($varNewDoctorUserName);
                $varNewDoctorUserName = "D-". ($varNewDoctorUserName+1);
            }
            return $varNewDoctorUserName;
        }
        //Name
        if(empty($name))
        {
            $_SESSION['nameErr'] = "*Name is required";
        }
        else
        {
            if(!preg_match("/^[a-zA-z-.' ]*$/",$name))
            {
                $_SESSION['nameErr'] = "*Only letters and white-spaces are allowed";
            }
        }
        //Email
        if(empty($email))
        {
            $_SESSION['emailErr'] = "*Email is required";
        }
        else
        {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $_SESSION['emailErr'] = "*Invalid email format";
            }
        }
        //Phone
        if(empty($phone))
        {
            $_SESSION['phoneErr'] = "*Phone is required";
        }
        else
        {
            if(!preg_match("/^01\d{9}$/",$phone))
            {
                $_SESSION['phoneErr'] = "*Invalid phone format";
            }
        }
        //Date of birth
        if(empty($dob))
        {
            $_SESSION['dobErr'] = "*Birth date is required";
        }
        //Gender
        if(empty($gender))
        {
            $_SESSION['genderErr'] = "*Gender is required";
        }
        //Address
        if(empty($address))
        {
            $_SESSION['addressErr'] = "*Address is required";
        }
        //Salary
        if(empty($salary))
        {
            $_SESSION['salaryErr'] = "*Salary is required";
        }
        else
        {
            if(!is_numeric($salary))
            {
                $_SESSION['salaryErr'] = "*Invalid salary format";
            }
        }
        //Qualification
        if(empty($qualification))
        {
            $_SESSION['qualificationErr'] = "*Qualification is required";
        }
        else
        {
            if(!preg_match("/^[a-zA-z-.' ]*$/",$qualification))
            {
                $_SESSION['qualificationErr'] = "*Only letters and white-spaces are allowed";
            }
        }
        //Speciality
        if(empty($speciality))
        {
            $_SESSION['specialityErr'] = "*Speciality is required";
        }
        else
        {
            if(!preg_match("/^[a-zA-z-.' ]*$/",$speciality))
            {
                $_SESSION['specialityErr'] = "*Only letters and white-spaces are allowed";
            }
        }
        //Password
        if(empty($password))
        {
            $_SESSION['passwordErr'] = "*Password is required";
        }
        if(empty($_SESSION['nameErr']) && empty($_SESSION['emailErr']) && empty($_SESSION['phoneErr']) && empty($_SESSION['dobErr']) && empty($_SESSION['genderErr']) && empty($_SESSION['addressErr']) && empty($_SESSION['salaryErr']) && empty($_SESSION['qualificationErr']) && empty($_SESSION['specialityErr']) && empty($_SESSION['passwordErr']))
        {
            $username = generateUserName();
            $status = register($username,$name,$email,$phone,$dob,$gender,$address,$salary,$qualification,$speciality,$password);
            if($status)
            {
                $_SESSION['newUsername'] = $username;
                header("Location: ../Controllers/loginController.php");
                unsetAllField();
                exit();
            }
            else
            {
                $_SESSION['registrationErr'] = "Error! Registration is Unsuccessful.";
            }
        }
        header("Location: ../Controllers/registrationController.php");
        exit(); 
    }
?>