<?php
App::uses('Component', 'Controller');

class ExcelReaderComponent extends Component {

    protected $PHPExcelReader; //variable to hold reference to the PHPExcel instance
    protected $PHPExcelLoaded = false;
    private $dataArray; // variable to hold data of the excel sheet.

    public function initialize(Controller $controller) {
        parent::initialize($controller);
        App::import('Vendor', 'PHPExcel'
            , array('file' => 'PHPExcel/PHPExcel.php'));
        if (!class_exists('PHPExcel'))
            throw new CakeException('Vendor class PHPExcel not found!');
        $dataArray = array();
    }

    public function loadExcelFile($filename) {
        $this->PHPExcelReader = PHPExcel_IOFactory::createReaderForFile($filename);
        $this->PHPExcelLoaded = true;
        $this->PHPExcelReader->setReadDataOnly(true);
        $excel = $this->PHPExcelReader->load($filename);
        $this->dataArray = $excel->getSheet(0)->toArray();
        return $this->dataArray;
    }

    public function format_date($date){
        return PHPExcel_Style_NumberFormat::toFormattedString($date,'YYYY-MM-DD' );
    }
}
?>