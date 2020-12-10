<?
use PHPUnit\Framework\TestCase;  
    
class TestFiles extends TestCase  
{  
    public function testNegativeTestcaseForAssertFileExists()  
    {  
        $file = "../src/login.php";   
        $this->assertFileExists(  
            $file,  
            "given filename doesn't exists"
        );  
    }  
}
?>
