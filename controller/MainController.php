<?php 
class MainController {
    public $n;
    public $m;
    public $resGlobalArray = [];
    public $positionsCount;
    public $errors;
    public $status = 0;

    public function index()
    {
        $this->m = isset($_POST['cellCount'])?$_POST['cellCount']:'';
        $this->n = isset($_POST['coinCount'])?$_POST['coinCount']:'';
        if(isset($_POST['send']) && isset($_POST['send'])){
            $this->validateInputData();
            if(!$this->errors['error'])
                $this->status = $this->startGeneration();
        }
        include 'view/index.php';

    }
    public function startGeneration(){

        $array = range(1,$this->m);
        $this->positionsCount = $this->C($this->m,$this->n);
        if($this->positionsCount >= 10)
            $this->generatePositions($array, $this->n, 0, []);
        return $this->writeInFile();
    }
    public function generatePositions($array, $len, $stPos, $resArray)
    {

        if($len == 0)
        {
            $this->resGlobalArray[] = $resArray;
            return;
        }

        for ($i = $stPos; $i <= count($array) - $len; $i++)
        {
            $resArray[$this->n - $len] = $array[$i];
            $this->generatePositions($array, $len-1, $i+1, $resArray);
        }
    }

    public function factorial($n)
    {
        $f=1;
        for($i=2;$i<=$n;++$i)
            $f=$f*$i;
        return $f;
    }

    public function C($m,$n)
    {
        return $this->factorial($m)/($this->factorial($n)*$this->factorial($m-$n));
    }
    public function writeInFile()
    {

        $str = 'Less then 10 variation';
        if($this->positionsCount >= 10){
            $str =  $this->positionsCount."\n\r";
            foreach($this->resGlobalArray as $pos){
                $str.= "\n\r".implode(', ',$pos);
            }

        }
        if( file_exists ( 'result.txt' ))
            unlink('result.txt');
        $fp = fopen("result.txt", "w");
        $res = fwrite($fp, $str);
        fclose($fp);

        return $res;
    }

    public function validateInputData(){
        if ($this->m > 0 && $this->n > 0 && $this->m > $this->n){
            $this->errors = array('error'=>false,'message'=>'');
        }
        else
            $this->errors = array('error'=>true,'message'=>"All fields must be valid number! \r\n Count of Cells must be greather then Count of Coins!");
    }

}  
?>