<?php
    session_start();
    require_once('../Models/alldb.php');
    if(!isset($_SESSION['username']))
    {
        header("Location: ../Controllers/loginController.php");
    }
    else
    {
        if(isset($_REQUEST["creatPDF"]))
        {
            require_once('../tcpdf/tcpdf.php');

            //patient details
            $varPatientUsername = $_REQUEST["creatPDF"];
            $resultPatient = patientDetails($varPatientUsername);
            $rowPatient=mysqli_fetch_assoc($resultPatient);
            //doctor details
            $varDoctorUsername = $_SESSION['username'];
            $rowDoctor = doctorDetails($varDoctorUsername);
            //prescription details
            $resultPrescription = prescriptionDetails($varPatientUsername);
            
            $obj_pdf = new TCPDF('P', PDF_UNIT,  PDF_PAGE_FORMAT, true, 'UTF-8', false);
            $obj_pdf->SetCreator(PDF_CREATOR);
            $obj_pdf->SetTitle("Prescription");

            $obj_pdf->setHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
            $obj_pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
            $obj_pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

            $obj_pdf->SetDefaultMonospacedFont('helvetica');
            $obj_pdf->setFooterMargin(PDF_MARGIN_FOOTER);

            $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
            $obj_pdf->setPrintHeader(false);
            $obj_pdf->setPrintFooter(false);
            $obj_pdf->SetAutoPageBreak(true, 10);
            $obj_pdf->SetFont('helvetica', '', 12);
            $obj_pdf->AddPage();

            $content = '';

            if($resultPrescription->num_rows > 0)
            {
                $content = '
                <h5>Doctor Information</h5><hr>
                <h5>&nbsp;Doctor Name:&nbsp;Dr.&nbsp;'.$rowDoctor['D_Name'].'</h5>
                <h5>&nbsp;Doctor Email:&nbsp;'.$rowDoctor['D_Email'].'</h5><br>
                <h5>Patient Information</h5><hr>
                <h5>&nbsp;Patient ID:&nbsp;'.$rowPatient['P_Username'].'</h5>
                <h5>&nbsp;Patient Name:&nbsp;'.$rowPatient['P_Name'].'</h5>
                <h5>&nbsp;Patient Phone Number:&nbsp;'.$rowPatient['P_Phone'].'</h5>
                <h5>&nbsp;Patient Email:&nbsp;'.$rowPatient['P_Email'].'</h5><br>
                <h4 align="center">Prescription</h4><br><br>
                <table border="1" cellspacing="0" cellpadding="3">';
                $content.='<thead>
                <tr>
                <th scope="col">Brand Name</th>
                <th scope="col">Dose</th>
                <th scope="col">Duration</th>
                <th scope="col">Condition Dose</th>
                </tr>
                </thead><tbody>';
                while($r= mysqli_fetch_assoc($resultPrescription)){
                    $content.='<tr>
                    <td>'.$r['Brand_Name'].'</td>
                    <td>'.$r['Dose'].'</td>
                    <td>'.$r['Duration'].'</td>
                    <td>'.$r['Condition_Dose'].'</td>
                    </tr>';
                }
                $content.='</tbody></table><br><br><p align="center">Thank you for your visit.</p>';
            }
            else
            {
                $content = 'No Data Found';
            }

            $pdfName = $varPatientUsername.".pdf";
            $obj_pdf->writeHTML($content);
            $obj_pdf->Output($pdfName);
        }
    }
?>