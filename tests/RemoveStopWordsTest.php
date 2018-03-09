<?php
namespace Rap2hpoutre\RemoveStopWords\Tests;
use PHPUnit\Framework\TestCase;
use function Rap2hpoutre\RemoveStopWords\remove_stop_words;

/**
 * Class RemoveStopWordsTest
 * @package Rap2hpoutre\RemoveStopWords\Tests
 */
class RemoveStopWordsTest extends TestCase
{
    public function testConversion()
    {
        $this->assertEquals('Hello', remove_stop_words('Hello'));
        $this->assertEquals(' plaît   majesté', remove_stop_words('Ça plaît à sa majesté', 'fr'));
        $this->assertEquals(' quick brown fox jumps   lazy dog', remove_stop_words('The quick brown fox jumps over the lazy dog'));
        $this->assertEquals('Portez  vieux whisky  juge blond  fume', remove_stop_words('Portez ce vieux whisky au juge blond qui fume', 'fr'));
        $this->assertEquals(
            '  must explain      mistaken idea  denouncing pleasure  praising pain  born    give   complete account   system,  expound  actual teachings   great explorer   truth,  master-builder  human happiness.', 
            remove_stop_words('But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.'));
    }
}