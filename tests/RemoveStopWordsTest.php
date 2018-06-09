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
    public function conversionDataProvider()
    {
        return [
            ['Hello', 'Hello'],
            [' quick brown fox jumps   lazy dog', 'The quick brown fox jumps over the lazy dog'],
            ['  must explain      mistaken idea  denouncing pleasure  praising pain  born    give   complete account   system,  expound  actual teachings   great explorer   truth,  master-builder  human happiness.', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.'],
        ];
    }

    /**
     * @dataProvider conversionDataProvider
     */
    public function testConversion($expectedString, $string)
    {
        $this->assertEquals($expectedString, remove_stop_words($string));
    }

    public function conversionWithLocaleDataProvider()
    {
        return [
            [' plaît   majesté', 'Ça plaît à sa majesté', 'fr'],
            ['Portez  vieux whisky  juge blond  fume', 'Portez ce vieux whisky au juge blond qui fume', 'fr'],
        ];
    }

    /**
     * @dataProvider conversionWithLocaleDataProvider
     */
    public function testConversionWithLocale($expectedString, $string, $locale)
    {
        $this->assertEquals($expectedString, remove_stop_words($string, $locale));
    }
}
