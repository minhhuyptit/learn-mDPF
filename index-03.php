
<?php
    // D:\xampp_5\htdocs\mPDF\mpdf.pdf
    header('Content-Type: application/pdf');
    require_once 'library/mpdf.php';

    // CSS

    $mpdf = new mPDF(
        'utf-8', // mode - default ''
        'A4', // format - A4, for example, default '' Change size array(150,150)
        16, // font size - default 0
        'arial', // default font family
        0, // margin header
        9, // margin footer
        'P' // L - landscape, P - portrait
    );

    $styleSheet = file_get_contents('css/style.css');
    $mpdf->WriteHTML($styleSheet, 1);   //1 là ẩn định dạng css đi

    // Header
    $htmlHeader = '<p class="header">Header Lập trình PHP</p>';
    $mpdf->SetHTMLHeader($htmlHeader); //Phải đặt trước writeHTML

    // Footer
    $htmlFooter = '<p class="footer">Footer Lập trình PHP</p>';
    $mpdf->SetHTMLFooter($htmlFooter); //Phải đặt trước writeHTML

    // HTML
    $mpdf->setXY(0, 50);
    $htmlContent = '<h3 style="color: red">Akai Shuichi</h3>
                Khóa học trực tuyến';
    $mpdf->WriteHTML($htmlContent);

    $mpdf->setXY(0, 100);
    $htmlContent = '<h3 style="color: blue">Vermouth</h3>
                Khóa học Online (0,100)';
    $mpdf->WriteHTML($htmlContent);

    $mpdf->WriteText(40, 40, 'Sexy (40,40)');

    $mpdf->Output();

?>