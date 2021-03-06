<?php
    require_once 'library/mpdf.php';
    $courseArray = array(
            'javascript'	=> array(
                    'picture'	=> 'javascript.png',
                    'title'		=> 'HTML - CSS - Javascript',
                    'summary'	=> 'Khóa học HTML - CSS - Javascript của ZendVN là một MODULE trong khóa học jQuery master. Khóa học này đem đến cho các bạn kiến thức nền tảng của lập trình website bao gồm HTML, CSS và Javascript',
            ),
            'joomla'		=> array(
                    'picture'	=> 'joomla.png',
                    'title'		=> 'Lập trình Joomla! 2.5',
                    'summary'	=> 'Joomla CMS là một hệ thống quản lý dữ liệu được đánh giá rất cao hiện nay, Joomla rất dễ sử dụng để xây dựng một website và rất thân thiện với người sử dụng. Nhưng để lập trình tạo ra các thành phần mở rộng như Component, Module, Plugin, Template...',
            ),
            'jquery'		=> array(
                    'picture'	=> 'jquery.png',
                    'title'		=> 'Lập trình jQuery (jQuery Master)',
                    'summary'	=> 'Nếu nói đến lập trình web, chúng ta nghĩ ngay đến một ngôn ngữ lập trình không thể thiếu trong một website đó là Javascript. Javascript giúp chúng ta thực hiện nhưng thao tác, hiệu ứng mà các ngôn ngữ lập web như PHP, ASP, JSP… khó mà thực hiện được. ',
            ),
            'php'			=> array(
                    'picture'	=> 'php.png',
                    'title'		=> 'Lập trình PHP chuyên nghiệp',
                    'summary'	=> 'PHP đã và đang trở thành một ngôn ngữ lập trình phổ biến trong các ứng dụng web ngày nay. Với các ưu điểm như miễn phí, dễ đọc, thao tác tốt với các hệ quản trị cơ sở dữ liệu, cộng đồng sử dụng rộng rãi, thư viện phong phú ... PHP ngày càng phát triển và việc học PHP đã trở nên đặc biệt cần thiết đối với bất kỳ lập trình viên nào.',
            ),
            'wordpress'	=> array(
                    'picture'	=> 'wordpress.png',
                    'title'		=> 'Lập trình Wordpress',
                    'summary'	=> ' WordPress là một mã nguồn web mở để quản trị nội dung (CMS – Content Management System), một mã nguồn mở và hoàn toàn miễn phí để làm blog, trang web cá nhân hoặc bất cứ gì mà bạn thích',
            ),
            'zend-framework'	=> array(
                    'picture'	=> 'zend-framework.png',
                    'title'		=> 'Lập trình Zend Framework 2',
                    'summary'	=> 'Zend Framework là một thư viện các lớp được xây dựng trên nền tảng ngôn ngữ PHP, theo hướng OOP và được công ty Zend phát triển. Zend Framework được định hướng theo mô hình MVC và là một PHP framework ra đời khá trễ',
            ),
    );

    $mpdf	= new mPDF(
		'utf-8', 			// mode - default ''
		'A4',    			// format - A4, for example, default ''
		0,     				// font size - default 0
		'arial',			// default font family
		0,    				// margin_left
		0,    				// margin right
		30,     			// margin top
		0,    				// margin bottom
		0,     				// margin header
		0,     				// margin footer
		'P'  				// L - landscape, P - portrait
	);
	
	$stylesheet = file_get_contents('css/style.css');
    $mpdf->WriteHTML($stylesheet,1);
    
    $mpdf->SetHTMLHeader('<p class="header">Học lập trình PHP</p>'); 
    $mpdf->SetHTMLFooter('<p class="footer">Page 1</p>'); 

    $count = 1;
    $xhtml ='';
    $page = 1;
    $total = count($courseArray);
    $mpdf->WriteHTML('');  //Viết giả 1 cái để water mark chạy dx
    $mpdf->watermark('Water Mark Page 1', 30, 48, 0.2); //text, tilt, size, opacity
    if(!empty($courseArray)){
        foreach($courseArray as $key => $val){
            $xhtml = '<div class="course">
                            <img src="images/'.$val['picture'].'" />
                            <h3>'.$val['title'].'</h3>
                            <p>'.$val['summary'].'</p>
                        </div>';
            $mpdf->WriteHTML($xhtml);
            if($count % 2 == 0 && $count != $total){
                $mpdf->AddPage();
                $mpdf->SetHTMLFooter('<p class="footer">Page '.(++$page).'</p>'); 
                $mpdf->watermark('Water Mark Page '.$page , 30, 48, 0.2); //text, tilt, size, opacity
            }
            $count++;
        }
    }

    $mpdf->Output();	

?>