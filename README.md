# Remove stop words

[![Packagist](https://img.shields.io/packagist/v/rap2hpoutre/remove-stop-words.svg)](https://packagist.org/packages/rap2hpoutre/remove-stop-words)
[![Packagist](https://img.shields.io/packagist/l/rap2hpoutre/remove-stop-words.svg)](https://packagist.org/packages/rap2hpoutre/remove-stop-words)
[![Build Status](https://travis-ci.org/rap2hpoutre/remove-stop-words.svg?branch=master)](https://travis-ci.org/rap2hpoutre/remove-stop-words)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/rap2hpoutre/remove-stop-words/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/rap2hpoutre/remove-stop-words/?branch=master)

Remove stop words from a string. It currently works in French and English. Feel free to submit a Pull Request if you want to include your language.

## Installation

```bash
composer require rap2hpoutre/remove-stop-words
```

## Usage

Just call the `remove_stop_words` function with a string.

```php
use function Rap2hpoutre\RemoveStopWords\remove_stop_words;

echo remove_stop_words('The quick brown fox jumps over the lazy dog');
// quick brown fox jumps   lazy dog
```
You can provide a locale as a second argument:

```php
use function Rap2hpoutre\RemoveStopWords\remove_stop_words;

echo remove_stop_words('Portez ce vieux whisky au juge blond qui fume', 'fr');
// Portez  vieux whisky  juge blond  fume
```
