<?php
/**
 * Created by PhpStorm.
 * User: tahany
 * Date: 3/19/2016
 * Time: 7:38 AM
 */
session_start();
if(isset($_SESSION['username'])) {
        require_once('../tcpdf/tcpdf.php');
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->SetAuthor('Bahya Hospital');
        $pdf->SetSubject('prescription');
        $pdf->SetTitle("prescription");
        $pdf->AddPage();
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        $pdf->Image("img/newlogo.png", 10, 10, 30, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        $pdf->SetFont('aealarabiya', 'B', 14);
        $pdf->Ln(30);
        $pdf->Cell(0, 0, 'مستشفى بهية', 0, false, 'L', 0, '', 0, false, 'M', 'M');
        $pdf->Ln(10);
        $name = $_SESSION['FNAME'];
        $lname = $_SESSION['LNAME'];
        $mname = $_SESSION['MNAME'];
        $pdf->Cell(0, 0, 'الاسم : ' . $name . ' ' . $mname. ' ' . $lname, 0, false, 'R', 0, '', 0, false, 'M', 'M');
        $pdf->Ln(8);
        $date = date('Y-m-d');
        $pdf->Cell(0, 0, 'التاريخ : '.$date, 0, false, 'R', 0, '', 0, false, 'M', 'M');
        $pdf->Ln(10);
        $tableFont = $pdf->AddFont('aealarabiya', '', 14);
        $tableHeader = '
                <table text-align: center float: right cellpadding="2">
                <tr style="background-color: #5bc0de; font-size: 20px;">
                <th >ارشادات</th>
                <th>الجرعة</th>
                <th>اسم الدواء</th></tr>';
        $tableContent = '';
        $result = $_SESSION['prescription'];
        foreach ($result as $x) {
                $tableContent .= '<tr><td>' . $x['INSTRUCTIONS'] . '</td>
                    <td>' . $x['FREQUENCY'] . '</td>
                    <td>' . $x['NAME'] . '</td>
                    </tr>';
        }
        $tableFooter = '</table>';
        $table = $tableHeader . $tableContent . $tableFooter;
        $pdf->SetFont('aealarabiya', 'B', 14);
        $pdf->writeHTML($table, true, false, true, false, 'R');
        $pdf->Ln(10);
        $pdf->Cell(0, 0, 'التوقيع', 0, false, 'L', 0, '', 0, false, 'M', 'M');
        $pdf->Output();

}else{
        echo '<h1>'."You can't access this page.".'</h1>';

        echo '&emsp;'."Please login first ";
        echo '<a href="../index.html">login here</a>';
}?>