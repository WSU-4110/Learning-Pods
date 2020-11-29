<?php
use PHPUnit\Framework\TestCase;

require 'searchpods.php';

final class ZipSearchTest extends TestCase
{
   private function __construct($zip)
   {
       $this->ensureIsValidzip($zip);
       $this->zip = $zip;
   }

   private function ensureIsValidZip(int $zip)
   {
       if (!filter_var($zip, FILTER_VALIDATE_INT)) {
           throw new InvalidArgumentException(
               sprintf( '"%s" is not a valid zipcode', $zip )
           );
       }
       if (!($zip < 48999 && $zip > 4800)){
        throw new InvalidArgumentException(
            sprintf('"%s" is not a valid zipcode', $zip )
        );
       }
   }
}

?>