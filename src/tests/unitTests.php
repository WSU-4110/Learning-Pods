<?
use PHPUnit\Framework\TestCase;  
    
class TestFiles extends TestCase  
{  
    public function testNegativeTestcaseForAssertFileExists()  
    {  
        $file = "../login.php";   
        $this->assertFileExists(  
            $filename,  
            "given filename doesn't exists"
        );  
    }  
}
?>