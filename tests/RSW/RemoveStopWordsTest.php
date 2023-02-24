<?php 
declare(strict_types=1);
namespace EnterV\Tests\RSW;

use EnterV\RSW\Langs;
use EnterV\RSW\RemoveStopWords;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class RemoveStopWordsTest extends TestCase
{
    public static function conversionDataProvider() : array
    {
        return [
            ['Hello', 'Hello'],
            [' quick brown fox jumps   lazy dog', 'The quick brown fox jumps over the lazy dog'],
            ['  must explain      mistaken idea  denouncing pleasure  praising pain  born    give   complete account   system,  expound  actual teachings   great explorer   truth,  master-builder  human happiness.', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.'],
        ];
    }

    #[DataProvider('conversionDataProvider')]
    public function testConversion(string $expectedString, string|array $string) : void
    {
        $rsw = new RemoveStopWords($string);
        $this->assertEquals($expectedString, $rsw->remove());
    }

    public static function conversionWithLocaleDataProvider() : array
    {
        return [
            [' plaît   majesté', 'Ça plaît à sa majesté', Langs::FR],
            ['Portez  vieux whisky  juge blond  fume', 'Portez ce vieux whisky au juge blond qui fume', Langs::FR],
            [' test   programie', 'Jakiś test w tym programie', Langs::PL],
        ];
    }

    #[DataProvider('conversionWithLocaleDataProvider')]
    public function testConversionWithLocale(string $expectedString, string|array $string, Langs $lang): void

    {
        $rsw = new RemoveStopWords($string, $lang);
        $this->assertEquals($expectedString, $rsw->remove());
    }

    public static function removeWithArrayWords() : array
    {
        return [
            [
                [' plaît   majesté', 'Portez  vieux whisky  juge blond  fume'],
                ['Ça plaît à sa majesté', 'Portez ce vieux whisky au juge blond qui fume'],
                Langs::FR,
            ]
        ];
    }

    #[DataProvider('removeWithArrayWords')]
    public function testRemoveWithArrayWords(array $expectedString, string|array $array, Langs $lang) : void
    {
        $rsw = new RemoveStopWords($array, $lang);
        $this->assertEquals($expectedString, $rsw->remove());
    }

}