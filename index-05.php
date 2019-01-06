
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

    //Security
    // $mpdf->SetProtection(array('print'), 'userxx', 'passwordyy');   //Cho print
    // $mpdf->SetProtection(array('modify'), 'userxx', 'passwordyy');  //Cho modify nhưng ko cho print

    // Page 1
    $mpdf->WriteHTML('<h3><h3 style="color: blue">Vermouth in Page 1</h3>');
    
    // Water Mark text & image
    $mpdf->watermark('Nguyễn Huy', 30, 48, 0.2); //text, tilt, size, opacity
    $mpdf->watermarkImg('images/logo.png', 0.3); //src, opacity

    $mpdf->Output();

?>