<?
use PHPUnit\Framework\TestCase;  
    
class TestFiles extends TestCase  
{  
    public function testNegativeTestcaseForAssertFileExists()  
    {  
        $file = "../src/createPod.php";   
        $this->assertFileExists(  
            $file,  
            "given filename doesn't exists"
        );  
    }  
}
?>
