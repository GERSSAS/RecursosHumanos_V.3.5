<?php
require '../../web/vendor/autoload.php';
include_once '../../model/Excel/ExcelModel.php';



use phpDocumentor\Reflection\Types\Null_;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Border;
use Symfony\Component\Validator\Constraints\Length;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Sum;

$obj = new ExcelModel();
$spreadsheet = new Spreadsheet();
$spreadsheet = IOFactory::load('Prueba.xlsx');
$sheet = $spreadsheet->getActiveSheet();
   //Bordes de los headers de la tabla
   $sheet->getStyle('A4:R4')
   ->getBorders()
   ->getAllBorders()
   ->setBorderStyle(Border::BORDER_THICK)
   ->setColor(new Color('000000'));
 //Celdas combinadas
 $sheet->mergeCells('A4:B4');
 $sheet->mergeCells('C4:E4');
 $sheet->mergeCells('F4:H4');
 $sheet->mergeCells('P4:R4');

//Activar fuente en negrita
$sheet->getStyle('A4:R4')->getFont()->setBold(true);

$fechaActual = date ( 'd-m-Y' );


$sql2 = "SELECT distinct tbl_usuario.usu_id,tbl_usuario.usu_nombre,tbl_usuario.usu_apellido,
tbl_usuario.usu_correo,
tbl_usuario.usu_telefono,tbl_vacante.id_vacante,tbl_vacante.vac_nombre,tbl_vacante.vac_publicacion,
tbl_seleccionado.id_seleccionado,tbl_seleccionado.selec_nombre,
 tbl_formacion.form_tituloname, tbl_formacion.usu_id
 FROM (((tbl_usuario INNER JOIN tbl_usuariovacante ON tbl_usuario.usu_id=tbl_usuariovacante.usu_id) 
 INNER JOIN tbl_vacante ON tbl_usuariovacante.id_vacante=tbl_vacante.id_vacante)
 INNER JOIN tbl_seleccionado ON tbl_usuariovacante.id_seleccionado=tbl_seleccionado.id_seleccionado)
 INNER JOIN tbl_formacion ON tbl_formacion.usu_id=tbl_usuario.usu_id 
 WHERE tbl_usuario.rol_id='2';";

$sql3 = "SELECT tbl_usuario.usu_id, tbl_area.id_area, tbl_area.are_nombre, tbl_historiadetalle.usu_id, tbl_historiadetalle.id_area FROM (tbl_usuario INNER JOIN tbl_historiadetalle ON tbl_usuario.usu_id=tbl_historiadetalle.usu_id) INNER JOIN tbl_area ON tbl_area.id_area=tbl_historiadetalle.id_area WHERE tbl_usuario.rol_id='2';";

$listado=$obj->consult($sql2);
$listado2=$obj->consult($sql3);
    $sheet ->setCellValue('A4','     ID_ASPIRANTE');
    $sheet ->setCellValue('C4','       NOMBRE');
    $sheet ->setCellValue('F4','      APELLIDO');
    $sheet ->setCellValue('I4','      CORREO ELECTRONICO');
    $sheet ->setCellValue('L4','      TELEFONO');
    $sheet ->setCellValue('N4','      ESTADO');
    $sheet ->setCellValue('P4','      VACANTE');
    $sheet ->setCellValue('S4','      PROFESION');
    $sheet ->setCellValue('U4','      AREA DE ESPECIALIZACION');
    $n=5;
    $s=3;
foreach ($listado as $Usu) {
   

    $sheet->getCell('L2')->setValue($fechaActual);
    $sheet->mergeCells('A'.$n.':B'.$n.'');
    $sheet->mergeCells('C'.$n.':E'.$n.'');
    $sheet->mergeCells('F'.$n.':H'.$n.'');
    $sheet->mergeCells('I'.$n.':K'.$n.'');
    $sheet->mergeCells('L'.$n.':M'.$n.'');
    $sheet->mergeCells('N'.$n.':O'.$n.'');
    $sheet->mergeCells('P'.$n.':R'.$n.'');
    $sheet->mergeCells('S'.$n.':T'.$n.'');
    $sheet->mergeCells('U'.$n.':V'.$n.'');
    $sheet ->setCellValue('A'.$n,'ASP_"'.$Usu['usu_id'].'"');
    $sheet ->setCellValue('C'.$n,'"'.$Usu['usu_nombre'].'"');
    $sheet ->setCellValue('F'.$n,'"'.$Usu['usu_apellido'].'"');
    $sheet ->setCellValue('I'.$n,  '"'.$Usu['usu_correo'].'"');
    $sheet ->setCellValue('L'.$n,  '"'.$Usu['usu_telefono'].'"');
    $sheet ->setCellValue('N'.$n,  '"'.$Usu['selec_nombre'].'"');
    $sheet ->setCellValue('P'.$n,  '"'.$Usu['vac_nombre'].'"');
    $sheet ->setCellValue('S'.$n,  '"'.$Usu['form_tituloname'].'"');
   
    foreach ($listado2 as $Usu2) { 

        if($Usu['usu_id'] == $Usu2['usu_id']){

            $sheet ->setCellValue('U'.$n,  '"'.$Usu2['are_nombre'].'"');

        }
    }
    $n++;

}
$n = $n-1;


//Bordes del uerpo de la tabla
$sheet->getStyle('A4:R'.$n)
        ->getBorders()
        ->getAllBorders()
        ->setBorderStyle(Border::BORDER_THIN)
        ->setColor(new Color('000000'));

$filename ='Lista registrados'.time().'xlsx';

header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="'.$filename. date("d-m-Y") . '.xlsx"');
header ('Cache-Control: max-age = 0' );

header ('Cache-Control: max-age = 1' );

ob_end_clean();
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');
?>
