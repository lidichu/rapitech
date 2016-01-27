<?php
// http://ron314159.blogspot.tw/2013/07/phpexcel.html
require_once 'Classes/PHPExcel.php';

// 新增Excel物件
$objPHPExcel = new PHPExcel ();

// 設定屬性
$objPHPExcel->getProperties ()->setCreator ( "PHP" )->setLastModifiedBy ( "PHP" )->setTitle ( "Title" )->setSubject ( "Subject" )->setDescription ( "Description" )->setKeywords ( "Keywords" )->setCategory ( "Category" );

// 設定操作中的工作表
$objPHPExcel->setActiveSheetIndex ( 0 );
$sheet = $objPHPExcel->getActiveSheet ();

// 將工作表命名
$sheet->setTitle ( '第一張表' );

// 合併儲存格
$sheet->mergeCells ( 'A1:D2' );

// 儲存格內容
$sheet->setCellValue ( 'A1', 'PHPEXCEL TEST' ); // 合併後的儲存格，設定時指定左上角那個。
$sheet->setCellValue ( 'A3', 'test' );
$sheet->setCellValue ( 'B3', 'test' );
$sheet->setCellValue ( 'C3', 'test' );
$sheet->setCellValue ( 'D3', 'test' );
$sheet->setCellValue ( 'A4', 'test' );
$sheet->setCellValue ( 'B4', 'test' );
$sheet->setCellValue ( 'C4', 'test' );
$sheet->setCellValue ( 'D4', 'test' );

// 設定背景顏色單色
$sheet->getStyle ( 'A3:D3' )->applyFromArray ( array (
		'fill' => array (
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'color' => array (
						'argb' => 'D1EEEE' 
				) 
		) 
) );

// 設定漸層背景顏色雙色(灰/白) 經測試，Excel2007才有漸層
$sheet->getStyle ( 'A1:D2' )->applyFromArray ( array (
		'font' => array (
				'bold' => true,
				'size' => '24' 
		),
		'alignment' => array (
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER 
		),
		'borders' => array (
				'top' => array (
						'style' => PHPExcel_Style_Border::BORDER_THIN 
				) 
		),
		'fill' => array (
				'type' => PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
				'rotation' => 90,
				'startcolor' => array (
						'rgb' => 'DCDCDC' 
				),
				'endcolor' => array (
						'rgb' => 'FFFFFF' 
				) 
		) 
) );

// 框線 方法一：使用 setBorderStyle() 函數
$sheet->getStyle ( 'A5' )->getBorders ()->getTop ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );
$sheet->getStyle ( 'B5' )->getBorders ()->getBottom ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );
$sheet->getStyle ( 'C5' )->getBorders ()->getleft ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );
$sheet->getStyle ( 'D5' )->getBorders ()->getright ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );
$sheet->getStyle ( 'A7:C10' )->getBorders ()->getAllborders ()->setBorderStyle ( PHPExcel_Style_Border::BORDER_THIN );

// 框線 方法二：使用applyFromArray()函數
$styleArray = array (
		'borders' => array (
				'allborders' => array (
						'style' => PHPExcel_Style_Border::BORDER_THIN,
						'color' => array (
								'argb' => '000000' 
						) 
				) 
		) 
);
$sheet->getStyle ( 'A12:C15' )->applyFromArray ( $styleArray );

// 框線 方法三：使用物件 + applyFromArray()函數
$style_obj = new PHPExcel_Style ();
$style_array = array (
		'borders' => array (
				'allborders' => array (
						'style' => PHPExcel_Style_Border::BORDER_THIN 
				) 
		),
		'alignment' => array (
				'wrap' => true,
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER 
		),
		'font' => array (
				'size' => '8' 
		) 
);
$style_obj->applyFromArray ( $style_array );
$sheet->setSharedStyle ( $style_obj, 'E7:G10' );

// 斜線 方法一
$styleArray = array (
		'borders' => array (
				'diagonal' => array (
						'style' => PHPExcel_Style_Border::BORDER_THICK,
						'color' => array (
								'argb' => 'FFFF0000' 
						) 
				),
				'diagonaldirection' => PHPExcel_Style_Borders::DIAGONAL_UP 
		)
		// 'diagonaldirection' => PHPExcel_Style_Borders::DIAGONAL_DOWN
		// 'diagonaldirection' => PHPExcel_Style_Borders::DIAGONAL_BOTH
		 
);
$sheet->getStyle ( "E1" )->applyFromArray ( $styleArray );

// 斜線 方法二
$sheet->getStyle ( 'F1' )->getBorders ()->getDiagonal ()->applyFromArray ( array (
		'style' => PHPExcel_Style_Border::BORDER_THIN,
		'color' => array (
				'argb' => 'FFFF0000' 
		) 
) );
$sheet->getStyle ( 'F1' )->getBorders ()->setDiagonalDirection ( PHPExcel_Style_Borders::DIAGONAL_DOWN );
/*
 * 註：
 * PHPExcel_Style_Borders::DIAGONAL_UP
 * PHPExcel_Style_Borders::DIAGONAL_DOWN
 * PHPExcel_Style_Borders::DIAGONAL_BOTH
 */

// 設定一個範圍後套用相同格式
$sheet->mergeCells ( 'E12:F13' );
$sheet->setCellValue ( 'E12', "Hello \n World" );
$style_obj = new PHPExcel_Style ();
$style_array = array (
		'borders' => array (
				'allborders' => array (
						'style' => PHPExcel_Style_Border::BORDER_THIN 
				) 
		),
		'alignment' => array (
				'wrap' => true,
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER 
		),
		'font' => array (
				'size' => '8' 
		) 
);
$style_obj->applyFromArray ( $style_array );
$sheet->setSharedStyle ( $style_obj, "E12:G14" );

// 設定字型(大小、粗細、顏色) 也可參照上面的方法，用陣列的方式設定。
$sheet->getStyle ( 'B4' )->getFont ()->setName ( 'Candara' );
$sheet->getStyle ( 'B4' )->getFont ()->setSize ( 16 );
$sheet->getStyle ( 'B4' )->getFont ()->setBold ( true );
$sheet->getStyle ( 'B4' )->getFont ()->setUnderline ( PHPExcel_Style_Font::UNDERLINE_SINGLE );
$sheet->getStyle ( 'B4' )->getFont ()->getColor ()->setARGB ( PHPExcel_Style_Color::COLOR_BLUE ); // 藍色
$sheet->getStyle ( 'C4' )->getFont ()->getColor ()->setARGB ( PHPExcel_Style_Color::COLOR_RED ); // 紅色
$sheet->getStyle ( 'C4' )->getFont ()->getColor ()->setARGB ( 'FF0000' ); // 紅色
$sheet->setCellValue ( 'G2', '2008-12-31' );
$sheet->getStyle ( 'G2' )->getNumberFormat ()->setFormatCode ( PHPExcel_Style_NumberFormat::FORMAT_DATE_YYYYMMDDSLASH );

/*
 * 這裡有列出可用英文單字表示的顏色，並不多。
 * http://www.cmsws.com/examples/applications/phpexcel/Documentation/API/PHPExcel_Style/PHPExcel_Style_Color.html
 *
 * COLOR_BLACK
 * COLOR_BLUE
 * COLOR_DARKBLUE
 * COLOR_DARKGREEN
 * COLOR_DARKRED
 * COLOR_DARKYELLOW
 * COLOR_GREEN
 * COLOR_RED
 * COLOR_WHITE
 * COLOR_YELLOW
 */

// 使用函數
$sheet->setCellValue ( 'A5', '3' );
$sheet->setCellValue ( 'B5', '4' );
$sheet->setCellValue ( 'C5', '=SUM(A5:B5)' );

// 設定A3內容為00123，並指定為文字型態。這樣在顯示的時候不會自動把0去掉。
$sheet->getCell ( "A4" )->setValueExplicit ( '00123', PHPExcel_Cell_DataType::TYPE_STRING );

// 設定成數字，並且有千分位逗號
$sheet->getCell ( $celll_name )->setValueExplicit ( $value, PHPExcel_Cell_DataType::TYPE_NUMERIC );
$sheet->getStyle ( "$celll_name" )->getNumberFormat ()->setFormatCode ( '#,##0.00' );
// excel格式設定裡的#：代表數字，多餘的0會去掉。 excel格式設定裡的0:基本上跟#一樣，但是多餘的0會保留。

// 分離儲存格
// $objActSheet->unmergeCells('B1:C22');

// 設定欄寬
$sheet->getColumnDimension ( 'A' )->setWidth ( 20 );

// 設定欄寬(自動欄寬)
// $sheet->getColumnDimension("A")->setAutoSize(true);

// 設定高度(列高) (有些人可能會說行高)
$sheet->getRowDimension ( '1' )->setRowHeight ( 150 );

// 下底線
$sheet->getStyle ( "D3" )->getFont ()->setUnderline ( PHPExcel_Style_Font::UNDERLINE_SINGLE );

// 旋轉文字
$sheet->getStyle ( 'A4' )->getAlignment ()->setTextRotation ( - 90 );
// 對齊 //注意是 setVertiacl 還是 setHorizontal
$sheet->getStyle ( 'B4' )->getAlignment ()->setVertical ( PHPExcel_Style_Alignment::VERTICAL_CENTER );
$sheet->getStyle ( 'C4' )->getAlignment ()->setHorizontal ( PHPExcel_Style_Alignment::HORIZONTAL_CENTER );

/*
 * VERTICAL_CENTER 垂直置中
 * VERTICAL_TOP
 * HORIZONTAL_CENTER
 * HORIZONTAL_RIGHT
 * HORIZONTAL_LEFT
 * HORIZONTAL_JUSTIFY
 */

// 設定備註 add comment -----------------------------------------------
$sheet->getComment ( 'A6' )->setAuthor ( 'PHPExcel' );
$sheet->getComment ( 'A6' )->getText ()->createTextRun ( 'comment1 comment1 comment1 ' );
$sheet->getComment ( 'A6' )->setWidth ( '200pt' );
$sheet->getComment ( 'A6' )->setHeight ( '100pt' );
$sheet->getComment ( 'A6' )->setMarginLeft ( '150pt' );
$sheet->getComment ( 'A6' )->getFillColor ()->setRGB ( 'dea66e' ); // 背景顏色
$objCommentRichText = $sheet->getComment ( 'A6' )->getText ()->createTextRun ( 'comment2 comment2 comment2 ' );
$objCommentRichText->getFont ()->setBold ( true ); // 文字加粗
$objCommentRichText->getFont ()->getColor ()->setARGB ( PHPExcel_Style_Color::COLOR_RED ); // 文字顏色
                                                                                      
// 設定格式：使用物件的方式
$style_obj = new PHPExcel_Style ();
$styleArray = array (
		'borders' => array (
				'left' => array (
						'style' => PHPExcel_Style_Border::BORDER_THICK 
				),
				'top' => array (
						'style' => PHPExcel_Style_Border::BORDER_THIN 
				),
				'right' => array (
						'style' => PHPExcel_Style_Border::BORDER_THIN 
				),
				'bottom' => array (
						'style' => PHPExcel_Style_Border::BORDER_THIN 
				) 
		) 
);
$style_obj->applyFromArray ( $styleArray );
$letter = PHPExcel_Cell::stringFromColumnIndex ( 0 ); // A
$cellname1 = $letter . '1'; // A1
$cellname2 = $letter . '7'; // A7
$cell_range = "$cellname1:$cellname2";
$sheet->setSharedStyle ( $style_obj, "$cell_range" );

// 設定格式：使用陣列
$styleArray = array (
		'borders' => array (
				'allborders' => array (
						'style' => PHPExcel_Style_Border::BORDER_THIN,
						'color' => array (
								'argb' => '000000' 
						) 
				) 
		),
		'font' => array (
				'bold' => true,
				'size' => '12',
				'color' => array (
						'argb' => 'FF0000' 
				) 
		) 
);
$sheet->getStyle ( 'A12:C15' )->applyFromArray ( $styleArray );

// 註解
$comment = "This is comment";
$sheet->getComment ( "F1" )->getFillColor ()->setRGB ( 'FFFAD9' ); // 背景顏色
$sheet->getComment ( "F1" )->setWidth ( '320pt' );
$objCommentRichText = $sheet->getComment ( "F1" )->getText ()->createTextRun ( "$comment" );
$objCommentRichText->getFont ()->getColor ()->setRGB ( '008080' ); // 文字顏色
$objCommentRichText->getFont ()->setBold ( true ); // 文字加粗
                                               // ---------------------------------------------------------------------------------------------
                                               // 設定其它工作表
$objPHPExcel->createSheet ();
$objPHPExcel->setActiveSheetIndex ( 1 );
$sheet->setTitle ( '第二張表' );
$sheet->setCellValue ( 'A3', "test1" );
$sheet->setCellValue ( 'B3', 'test2' );
$objPHPExcel->setActiveSheetIndex ( 0 );

// 若要在 2003 跟 2007 之間切換，選然下面兩段其中一段即可。
// Excel 2007
header ( 'Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' );
header ( 'Content-Disposition: attachment;filename="01simple.xlsx"' );
header ( 'Cache-Control: max-age=0' );
$objWriter = PHPExcel_IOFactory::createWriter ( $objPHPExcel, 'Excel2007' );
/*
 * //Excel 2003
 * header('Content-Type: application/vnd.ms-excel');
 * header('Content-Disposition: attachment;filename="01simple.xls"');
 * header('Cache-Control: max-age=0');
 * $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); //Excel 2003 = Excel 5
 */
// =============================================================================================
$objWriter->save ( 'php://output' );
exit ();
?>