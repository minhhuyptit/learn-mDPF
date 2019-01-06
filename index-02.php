
<?php
    // D:\xampp_5\htdocs\mPDF\mpdf.pdf
    header('Content-Type: application/pdf');
    require_once 'library/mpdf.php';
    $mpdf = new mPDF(
        'utf-8', // mode - default ''
        'A4', // format - A4, for example, default '' Change size array(150,150)
        16, // font size - default 0
        'arial', // default font family
        15, // margin_left
        15, // margin right
        15, // margin top
        15, // margin bottom
        0, // margin header
        9, // margin footer
        'P' // L - landscape, P - portrait
    );

    // Header
    $htmlHeader = '<p style="text-align:right; font-size=8px; border-bottom:1px solid red">Header Lập trình PHP</p>';
    $mpdf->SetHTMLHeader($htmlHeader); //Phải đặt trước writeHTML

    // Footer
    $htmlFooter = '<p style="text-align:center; font-size=8px; border-top:1px solid red">Footer Lập trình PHP</p>';
    $mpdf->SetHTMLFooter($htmlFooter); //Phải đặt trước writeHTML

    // HTML
    $htmlContent = '<h3 style="color: red">Akai Shuichi</h3>
                Khóa học trực tuyến';
    $mpdf->WriteHTML($htmlContent);

    $mpdf->Output();

?>