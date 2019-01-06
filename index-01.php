
<?php
    header('Content-Type: application/pdf');
    require_once 'library/mpdf.php';
    $mpdf = new mPDF(
                    'utf-8', 			// mode - default ''
                    'A4',    	        // format - A4, for example, default '' Change size array(150,150)
                    22,     			// font size - default 0
                    'arial',			// default font family
                    15,    				// margin_left
                    15,    				// margin right
                    0,     				// margin top
                    100,    				// margin bottom
                    20,     			// margin header
                    9,     				// margin footer
                    'P'  				// L - landscape, P - portrait
    );
    // Text
    $mpdf->WriteHTML('Hellow mPDF');

    // HTML
    $html = '<h3 style="color: red">Akai Shuichi</h3>
             Khóa học trực tuyến';
    $mpdf->WriteHTML($html);

    $mpdf->Output();
    // echo "<pre>";
    // echo "</pre>";

?>