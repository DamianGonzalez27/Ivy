<?php namespace App\Services;

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Template
{
    private $reportsDir;

    private $storageDir;

    private $template = null;

    public function __construct($constructor)
    {
        $this->reportsDir = $constructor['reportsDir'];

        $this->storageDir = $constructor['storageDir'];
    }

    public function constructTemplate($data, $view, $outputFormat)
    {
        //dd($view);
        switch($outputFormat)
        {
            case 'xlsx': 
                $spreadsheet = new Spreadsheet();
                $spreadsheet->setActiveSheetIndex(0)
                    ->setCellValue('A1', 'Hola')
                    ->setCellValue('B2', 'Mundo!')
                    ;

                $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
                
                $this->template = $writer->save('salida.xls');
            break;

            case 'pdf': 
            
            break;
        }
    }

    public function makeXLSTemplate($data, $path, $output = null)
    {
        $arrayPath = explode("|", $path);
        $filename = "/".$arrayPath[1]."_".date("Y-m-d H:i:s").".xlsx";
        $directoryPath = $this->storageDir."reports/".$arrayPath[0];

        if(!file_exists($directoryPath))
            mkdir($directoryPath);

        $spreadsheet = new Spreadsheet();
        $spreadsheet->getActiveSheet()
                    ->setTitle($arrayPath[1])
                    ->fromArray(
            $this->prepareArrayToExcel($data), 
            null, 
            'A1'
        );

        $spreadsheet->getActiveSheet()->getStyle('A1:Z1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('9FD5D1');
        $spreadsheet->getActiveSheet()->getStyle('A1:Z1')->getFont()->getColor()->setRGB('FFFFFF');
        $spreadsheet->getActiveSheet()->getStyle('A1:Z1')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('A1:Z1')->getAlignment()->setHorizontal('center');

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $this->template = $directoryPath.$filename;

        $writer->save($this->template);
    }

    public function getTemplate()
    {
        return $this->template;
    }

    private function prepareArrayToExcel($params)
    {
        $headers = [];

        foreach($params[0] as $key => $value)
        {
            $headers[] = $key;
        }
        
        $response[] = $headers;

        foreach($params as $param)
        {
            $response[] = $param;
        }

        return $response;
    }
}