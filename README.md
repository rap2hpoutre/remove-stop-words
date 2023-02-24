# Remove stop words

[![Packagist](https://img.shields.io/packagist/l/entervpl/remove-stop-words.svg)](https://packagist.org/packages/entervpl/remove-stop-words)

Remove stop words from a string. It currently works in French, Spanish, English and Polish. Feel free to submit a Pull Request if you want to include your language.

## Installation

```bash
composer require entervpl/remove-stop-words
```

## Usage

```php
use EnterV\RSW\RemoveStopWords;

$string = 'The quick brown fox jumps over the lazy dog';
$rsw = new RemoveStopWords($string);
$result = $rsw->remove();
// $result = quick brown fox jumps   lazy dog
```
You can provide a locale as a second argument:

```php
use EnterV\RSW\Langs;
use EnterV\RSW\RemoveStopWords;

$string = 'Portez ce vieux whisky au juge blond qui fume';
$rsw = new RemoveStopWords($string, Lang::FR);
$result = $rsw->remove();
// $result = Portez  vieux whisky  juge blond  fume
```

You can also use a list of strings

```php
use EnterV\RSW\Langs;
use EnterV\RSW\RemoveStopWords;

$array = [
    'Portez ce vieux whisky au juge blond qui fume'
    'Ça plaît à sa majesté'
];
$rsw = new RemoveStopWords($array, Lang::FR);
$result = $rsw->remove();
// $result = ["Portez  vieux whisky  juge blond  fume", "plaît   majesté"]
```
