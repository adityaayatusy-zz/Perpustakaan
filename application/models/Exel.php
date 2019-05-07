<?php

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Exel extends CI_Model{

  public function print_download($data,$table){
    // var_dump($data);
    // die;
    require_once __DIR__ . '/../../assets/exel/src/Bootstrap.php';

    $helper = new Sample();
    if ($helper->isCli()) {
        $helper->log('This example should only be run from a Web Browser' . PHP_EOL);

        return;
    }
    // Create new Spreadsheet object
    $spreadsheet = new Spreadsheet();

    // // Set document properties
    // $spreadsheet->getProperties()->setCreator('Maarten Balliauw')
    //     ->setLastModifiedBy('Maarten Balliauw')
    //     ->setTitle('Office 2007 XLSX Test Document')
    //     ->setSubject('Office 2007 XLSX Test Document')
    //     ->setDescription('Test document for Office 2007 XLSX, generated using PHP classes.')
    //     ->setKeywords('office 2007 openxml php')
    //     ->setCategory('Test result file');
    // $count =
    // for ($i='A'; $i <$data[0].le  ; $i++) {
    //   # code...
    // }

    // $x++;

// echo $x;
  $count = json_encode($data[0],true);
  $count = json_decode($count,true);

  //   die;
    // Add some data
    // var_dump($count);
    while (current($count)) {
      $judul[] = key($count);
    next($count);
    }

    $x = 'A';
    for ($i=0; $i < count($count) ; $i++) {
    $spreadsheet->setActiveSheetIndex(0)->setCellValue($x.'1', $judul[$i]);
    $x++;
    }
    // Miscellaneous glyphs, UTF-8

    foreach ($data as $key => $d_item) {
      $d_item = (array) $d_item;
      $key = $key+2;
      $x = 'A';
      for ($i=0; $i < count($count) ; $i++) {
        $spreadsheet->setActiveSheetIndex(0)->setCellValue($x.$key, $d_item[$judul[$i]]);
      $x++;
      }
    }
    // Rename worksheet
    $spreadsheet->getActiveSheet()->setTitle('Simple');

    // Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $spreadsheet->setActiveSheetIndex(0);

    // Redirect output to a client’s web browser (Xlsx)
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="'.$table.'-'.date('Y-m-d').'.xlsx"');
    header('Cache-Control: max-age=0');
    // If you're serving to IE 9, then the following may be needed
    header('Cache-Control: max-age=1');

    // If you're serving to IE over SSL, then the following may be needed
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
    header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
    header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
    header('Pragma: public'); // HTTP/1.0

    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save('php://output');
    exit;

  }
}
