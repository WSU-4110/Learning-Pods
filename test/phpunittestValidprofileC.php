<?
use PHPUnit\Framework\TestCase;  
    
class TestFiles extends TestCase  
{  
    public function testNegativeTestcaseForAssertFileExists()  
    {  
        $file = "../src/profileBuilderChild.php";   
        $this->assertFileExists(  
            $file,  
            "given filename doesn't exists"
        );  
    }  
}
?>
