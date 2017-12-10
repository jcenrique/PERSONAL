<?php 
//ajuntar la libreria excel
require_once  WWW_ROOT .DS.'Classes' .DS.'PHPExcel.php';


 
$objPHPExcel = new PHPExcel(); //nueva instancia
 
$objPHPExcel->getProperties()->setCreator("Kiuvox"); //autor
$objPHPExcel->getProperties()->setTitle("Prueba para generar excel"); //titulo
 
//inicio estilos
$titulo = new PHPExcel_Style(); //nuevo estilo
$titulo->applyFromArray(
  array('alignment' => array( //alineacion
      'wrap' => false,
      'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER
    ),
      'font' => array( //fuente
      'bold' => true,
      'size' => 20,
      'name' => 'Verdana'
    )
));
 
$subtitulo = new PHPExcel_Style(); //nuevo estilo
 
$subtitulo->applyFromArray(
  array('fill' => array( //relleno de color
      'type' => PHPExcel_Style_Fill::FILL_SOLID,
      'color' => array('argb' => 'FFCCFFCC')
    ),
      'borders' => array( //bordes
                          'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                          'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                          'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
                          'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
    )
));
 
$bordes = new PHPExcel_Style(); //nuevo estilo
 
$bordes->applyFromArray(
  array('borders' => array(
      'top' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
      'right' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
      'bottom' => array('style' => PHPExcel_Style_Border::BORDER_THIN),
      'left' => array('style' => PHPExcel_Style_Border::BORDER_THIN)
    )
));
//fin estilos
 
$objPHPExcel->createSheet(0); //crear hoja
$objPHPExcel->setActiveSheetIndex(0); //seleccionar hora
$objPHPExcel->getActiveSheet()->setTitle("Listado"); //establecer titulo de hoja
 
//orientacion hoja
$objPHPExcel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
 
//tipo papel
$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
 
//establecer impresion a pagina completa
$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToPage(true);
$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToWidth(1);
$objPHPExcel->getActiveSheet()->getPageSetup()->setFitToHeight(0);
//fin: establecer impresion a pagina completa
 
//establecer margenes
$margin = 0.5 / 2.54; // 0.5 centimetros
$marginBottom = 1.2 / 2.54; //1.2 centimetros
$objPHPExcel->getActiveSheet()->getPageMargins()->setTop($margin);
$objPHPExcel->getActiveSheet()->getPageMargins()->setBottom($marginBottom);
$objPHPExcel->getActiveSheet()->getPageMargins()->setLeft($margin);
$objPHPExcel->getActiveSheet()->getPageMargins()->setRight($margin);
//fin: establecer margenes
 
//incluir una imagen
$objDrawing = new PHPExcel_Worksheet_Drawing();
$objDrawing->setPath('img/logo.png'); //ruta
$objDrawing->setHeight(75); //altura
$objDrawing->setCoordinates('A1');
$objDrawing->setWorksheet($objPHPExcel->getActiveSheet()); //incluir la imagen
//fin: incluir una imagen
 
//establecer titulos de impresion en cada hoja
$objPHPExcel->getActiveSheet()->getPageSetup()->setRowsToRepeatAtTopByStartAndEnd(1, 6);
 
$fila=6;
$objPHPExcel->getActiveSheet()->SetCellValue("A$fila", "CELDAS UNIDAS");
$objPHPExcel->getActiveSheet()->mergeCells("A$fila:G$fila"); //unir celdas
$objPHPExcel->getActiveSheet()->setSharedStyle($titulo, "A$fila:G$fila"); //establecer estilo
 
//titulos de columnas
$fila+=1;
$objPHPExcel->getActiveSheet()->SetCellValue("A$fila", 'NOMBRE');
$objPHPExcel->getActiveSheet()->SetCellValue("B$fila", 'APELLIDO');
$objPHPExcel->getActiveSheet()->setSharedStyle($subtitulo, "A$fila:B$fila"); //establecer estilo
$objPHPExcel->getActiveSheet()->getStyle("A$fila:B$fila")->getFont()->setBold(true); //negrita
 
//rellenar con contenido
for ($i = 0; $i < 10; $i++) {
  $fila+=1;
  $objPHPExcel->getActiveSheet()->SetCellValue("A$fila", 'Blog');
  $objPHPExcel->getActiveSheet()->SetCellValue("B$fila", 'Kiuvox');
 
  //Establecer estilo
  $objPHPExcel->getActiveSheet()->setSharedStyle($bordes, "A$fila:B$fila");
 
}

$fila = 7;
foreach($agentes as $agente) {
    $fila+=1;
  $objPHPExcel->getActiveSheet()->SetCellValue("D$fila", $agente->nombre_completo);
  $objPHPExcel->getActiveSheet()->SetCellValue("E$fila", $agente->codigo_agente);
  
  
}
//insertar formula
//$fila+=2;
//$objPHPExcel->getActiveSheet()->SetCellValue("A$fila", 'SUMA');
//$objPHPExcel->getActiveSheet()->SetCellValue("B$fila", '=1+2');
 
//recorrer las columnas
foreach (range('A', 'E') as $columnID) {
  //autodimensionar las columnas
  $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
}
 
//establecer pie de impresion en cada hoja
$objPHPExcel->getActiveSheet()->getHeaderFooter()->setOddFooter('&R&F página &P / &N');


//crear una nueva hoja
$objPHPExcel->createSheet(1); //crear hoja
$objPHPExcel->setActiveSheetIndex(1); //seleccionar hora
$objPHPExcel->getActiveSheet()->setTitle("Pruebas"); //establecer titulo de hoja

//borrar la ultima hoka
$objWorkSheet = $objPHPExcel->setActiveSheetIndex(2); 

$objPHPExcel->removeSheetByIndex(2);
 
//****************Guardar como excel 2007*******************************
$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); //Escribir archivo

//// nombre del archivo
header('Content-Disposition: attachment; filename="kiuvox.xlsx"');
//**********************************************************************
 
//forzar a descarga por el navegador
$objWriter->save('php://output');
exit;