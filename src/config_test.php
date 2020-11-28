<?php
require 'DB_Connect.php';

use PHPUnit\Framework\TestCase;

class config_test extends TestCase
{
    private $result;
 
    
 
    public function testConnect()
    {
        $this->result = new DB_Connect('2.000webhhost', 'id15127113_admin', 'Jefferson2020!!', 'id15127113_learningpodsdb');
        $this->assertIsObject($this->result);
    }
 
}

?>