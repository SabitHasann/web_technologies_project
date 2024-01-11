<?php 
    require_once('../Models/db.php');

    //auto username
    function lastUserName()
    {
        $conn = getConnection();

        $sqlLastDoctorUserName = "select username from login order by username desc limit 1";
        $resultLastDoctorUserName = mysqli_query($conn, $sqlLastDoctorUserName);
        $rowLastDoctorUserName = mysqli_fetch_assoc($resultLastDoctorUserName);
        $varLastDoctorUserName = $rowLastDoctorUserName["username"];

        return $varLastDoctorUserName;
    }
    
    //registration
    function register($username,$name,$email,$phone,$dob,$gender,$address,$salary,$qualification,$speciality,$password)
    {
        $conn = getConnection();

        $sqlRegistration = "insert into doctor (D_Username,D_Name,D_Email,D_Phone,D_DOB,D_Gender,D_Address,D_Salary,D_Qualification,D_Speciality) values('$username','$name','$email','$phone','$dob','$gender','$address','$salary','$qualification','$speciality');";
        $sqlLogin = "insert into login (username,password) values('$username','$password');";

        if(mysqli_query($conn,$sqlRegistration) && mysqli_query($conn,$sqlLogin))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    //login
    function auth($username,$password)
    {
        $conn = getConnection();
        $sqlLogin = "select * from login where username ='$username' and password ='$password';";
        $resultLogin = mysqli_query($conn,$sqlLogin);
        $count = mysqli_num_rows($resultLogin);

        if($count == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    //doctor details
    function doctorDetails($varDoctorUsername)
    {
        $conn = getConnection();
        $sqlDoctor = "select * from doctor where D_Username = '$varDoctorUsername';";
        $resultDoctor = mysqli_query($conn, $sqlDoctor);
        $rowDoctor = mysqli_fetch_assoc($resultDoctor);

        return $rowDoctor;
    }

    //update password
    function updatePass($varDoctorUsername,$oldPassword,$newPassword,$retypePassword)
    {
        $conn = getConnection();
        $sqlPassword = "select password from login where password = '$oldPassword'";
        $resultPassword = mysqli_query($conn,$sqlPassword);

        if($resultPassword->num_rows > 0 && $newPassword == $retypePassword && !empty($oldPassword) && !empty($newPassword) && !empty($retypePassword))
        {
            $sqlUpdatePassword = "update login set password = '$newPassword' where username = '$varDoctorUsername'";
            mysqli_query($conn,$sqlUpdatePassword);
            return true;
        }
        else
        {
            return false;
        }
    }
    //medicine details
    function medicineDetails()
    {
        $conn = getConnection();
        $sqlMedicineDetails = "select * from medicine";
        $resultMedicine = mysqli_query($conn,$sqlMedicineDetails);
        return $resultMedicine;
    }
    //add medicine
    function addMedicine($brandName,$genericName,$companyName,$indications)
    {
        $conn = getConnection();
        $sqlAddMedicine= "insert into medicine (Brand_Name,Generic_Name,Company_Name,Indications) values('$brandName','$genericName','$companyName','$indications');";

        if(mysqli_query($conn,$sqlAddMedicine) )
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    //delete medicine
    function deleteMedicine($brandName)
    {
        $conn = getConnection();
        $sqlDelete = "delete from medicine where Brand_Name = '$brandName'";

        if(mysqli_query($conn,$sqlDelete) )
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    //edit medicine not all
    function editMedicineNotAll($update_id,$brandName,$genericName,$companyName)
    {
        $conn = getConnection();
        $sqlEditNotAll = "update medicine set Brand_Name='$brandName', Generic_Name='$genericName', Company_Name='$companyName' where Brand_Name='$update_id'";
        
        if(mysqli_query($conn,$sqlEditNotAll) )
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    //edit medicine all
    function editMedicineAll($update_id,$brandName,$genericName,$companyName,$indications)
    {
        $conn = getConnection();
        $sqlEditAll = "update medicine set Brand_Name='$brandName', Generic_Name='$genericName', Company_Name='$companyName', Indications='$indications' where Brand_Name='$update_id'";
        
        if(mysqli_query($conn,$sqlEditAll) )
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    //appoinment details
    function appoinmentDetails($varDoctorUsername)
    {
        $conn = getConnection();
        $date = date("Y-m-d");
        $sqlAppoinment = "select * from appoinments where Date = '$date' and D_Username = '$varDoctorUsername' and Status = '' order by Serial_No asc";
        $resultAppoinment = mysqli_query($conn,$sqlAppoinment);

        return $resultAppoinment;
    }
    //appoinment count
    function appoinmentCount($varDoctorUsername)
    {
        $conn = getConnection();
        $date = date("Y-m-d");
        $sqlAppoinmentCount = "select * from appoinments where Date = '$date' and D_Username = '$varDoctorUsername' and Status = ''";
        $resultAppoinmentCount = mysqli_query($conn,$sqlAppoinmentCount);

        return $resultAppoinmentCount;
    }
    function appoinmentCountChecked($varDoctorUsername)
    {
        $conn = getConnection();
        $date = date("Y-m-d");
        $sqlAppoinmentCountChecked = "select * from appoinments where Date = '$date' and D_Username = '$varDoctorUsername' and Status = 'Checked'";
        $resultAppoinmentCountChecked = mysqli_query($conn,$sqlAppoinmentCountChecked);

        return $resultAppoinmentCountChecked;
    }
    //patient details
    function patientDetails($varPatientUsername)
    {
        $conn = getConnection();
        $sqlPatient = "select * from patient where P_Username = '$varPatientUsername'";
        $resultPatient = mysqli_query($conn,$sqlPatient);
            
        return $resultPatient;
    }
    //patient name
    function patientName($varPatientUsername)
    {
        $conn = getConnection();
        $sqlPatient = "select * from patient where P_Username = '$varPatientUsername'";
        $resultPatient = mysqli_query($conn,$sqlPatient);
        $rowPatientName = mysqli_fetch_assoc($resultPatient);

        return $rowPatientName;
    }
    //medical history
    function medicalHistory($varPatientUsername)
    {
        $conn = getConnection();
        $date = date("Y-m-d");
        $sqlMedicalHistory = "select * from medicalhistory where P_Username = '$varPatientUsername' and Date = '$date'";
        $resultMedicalHistory = mysqli_query($conn,$sqlMedicalHistory);
        $rowMedicalHistory = mysqli_fetch_assoc($resultMedicalHistory);

        return $rowMedicalHistory;
    }
    //search brand name
    function searchBrandName($brandName)
    {
        $conn = getConnection();
        $sqlSearchBrandName = "select Brand_Name from medicine where Brand_Name like '%$brandName%'";
        $resultSearchBrandName = mysqli_query($conn,$sqlSearchBrandName);

        return $resultSearchBrandName;
    }
    //prescription details
    function prescriptionDetails($varPatientUsername)
    {
        $conn = getConnection();
        $date = date("Y-m-d");
        $sqlPrescription = "select * from prescription where P_Username = '$varPatientUsername' and Date = '$date'";
        $resultPrescription = mysqli_query($conn,$sqlPrescription);

        return $resultPrescription;
    }
    //add prescription
    function addPrescription($varPatientUsername,$disease,$brandName,$dose,$duration,$conditionDose)
    {
        $conn = getConnection();
        $date = date("Y-m-d");
        $sqlAddPrescription = "insert into prescription (P_Username,Disease,Brand_Name,Dose,Duration,Condition_Dose,Date) Values('$varPatientUsername','$disease','$brandName','$dose','$duration','$conditionDose','$date')";

        if(mysqli_query($conn,$sqlAddPrescription) )
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    //update appoinment
    function updateAppoinments($varPatientUsername)
    {
        $conn = getConnection();
        $sqlUpdateAppoinments = "update appoinments set Status='Checked' where P_Username='$varPatientUsername'";
        mysqli_query($conn,$sqlUpdateAppoinments);
    }
?>