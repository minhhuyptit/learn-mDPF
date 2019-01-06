
<?php
    // D:\xampp_5\htdocs\mPDF\mpdf.pdf
    header('Content-Type: application/pdf');
    require_once 'library/mpdf.php';

    // CSS

    $mpdf = new mPDF(
        'utf-8', 			// mode - default ''
		'A4',    			// format - A4, for example, default ''
		14,     			// font size - default 0
		'arial',			// default font family
		0,    				// margin_left
		0,    				// margin right
		0,     				// margin top
		0,    				// margin bottom
		0,     				// margin header
		9,     				// margin footer
		'P'  				// L - landscape, P - portrait
    );

    // Page 1
    $mpdf->WriteHTML('<h3><h3 style="color: blue">Vermouth in Page 1</h3>');
    // Page 2
    $mpdf->AddPage('P');   
    $mpdf->WriteHTML('<h3><h3 style="color: red">Akai Shuichi in Page 2 Portrait(Chân dung)</h3>');
    // Page 3
    $mpdf->AddPage('L');    //Nằm ngang
    $mpdf->WriteHTML('<h3><h3 style="color: green">Enzo Ferrari in Page 3 Landscape(Phong cảnh)</h3>');

    $mpdf->Output();

?>