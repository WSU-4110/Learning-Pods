<?
use PHPUnit\Framework\TestCase;  
    
class TestFiles extends TestCase  
{  
    public function testNegativeTestcaseForAssertFileExists()  
    {  
        $file = "../src/policy.html";   
        $this->assertFileExists(  
            $file,  
            "given filename doesn't exists"
        );  
    }  
}
?>
