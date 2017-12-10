<?php 
//ajuntar la libreria excel
require_once  WWW_ROOT .DS.'Classes' .DS. 'PHPExcel.php';
require_once  WWW_ROOT .DS.'Classes' .DS. 'PHPExcel/IOFactory.php';
/** PHPExcel_Writer_Excel2007 */
require_once  WWW_ROOT .DS.'Classes' .DS. 'PHPExcel/Writer/Excel2007.php';

$inputFileName = 'plantillas/PLANTILLA_AGENTES.xlsx';

/*check point*/
$fileType = 'Excel2007';
$objReader = PHPExcel_IOFactory::createReader($fileType);
$objPHPExcel = $objReader->load($inputFileName);

$objPHPExcel->setActiveSheetIndex(0);

//formato filas


$bordes = new PHPExcel_Style(); //nuevo estilo
 
$bordes->applyFromArray(
  array('borders' => array(
      'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
      'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
      'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
      'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
    ),
    'font' => array( //fuente
                    'size' =>9,
                    'name' => 'Verdana'),
   'alignment' => array( //alineacion
                'wrap' => false,
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER)
));
	
$bordesContorno = new PHPExcel_Style(); //nuevo estilo
 
$bordesContorno=
  array('borders' => array(
      'top' => array('style' => PHPExcel_Style_Border::BORDER_THICK),
      'right' => array('style' => PHPExcel_Style_Border::BORDER_THICK),
      'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THICK),
      'left' => array('style' => PHPExcel_Style_Border::BORDER_THICK)
    )
);	
	
			
$fila = 5;
foreach($agentes as $agente) {
    $fila+=1;
    $objPHPExcel->getActiveSheet()->SetCellValue("A$fila", $agente->nombre);
    $objPHPExcel->getActiveSheet()->SetCellValue("B$fila", $agente->apellido1 . ' ' .  $agente->apellido2 );
    $objPHPExcel->getActiveSheet()->SetCellValue("C$fila", $agente->codigo_agente);
    $objPHPExcel->getActiveSheet()->SetCellValue("D$fila", $agente->cargo->cargo);
    $objPHPExcel->getActiveSheet()->SetCellValue("E$fila", $agente->residencia->residencia);
  
    $objPHPExcel->getActiveSheet()->setSharedStyle($bordes, "A$fila:E$fila");
}			
			
 $objPHPExcel->getActiveSheet()->getStyle("A5:E$fila")->applyFromArray($bordesContorno);



$objWriter =  PHPExcel_IOFactory::createWriter($objPHPExcel, $fileType);
$nuevonombre ="Agentes.xlsx";
//// nombre del archivo
header('Content-Disposition: attachment;filename="' . $nuevonombre . '"');
$objWriter->save('php://output');
exit();