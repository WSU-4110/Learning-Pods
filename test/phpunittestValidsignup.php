<?
use PHPUnit\Framework\TestCase;  
    
class TestFiles extends TestCase  
{  
    public function testNegativeTestcaseForAssertFileExists()  
    {  
        $file = "../src/signup.php";   
        $this->assertFileExists(  
            $file,  
            "given filename doesn't exists"
        );  
    }  
}
?>
