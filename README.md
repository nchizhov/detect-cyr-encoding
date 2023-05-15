## Detect Text Cyrillic Encoding

[![License](https://poser.pugx.org/inok/detect-cyr-encoding/license)](https://packagist.org/packages/inok/detect-cyr-encoding)
[![License](https://poser.pugx.org/inok/detect-cyr-encoding/v/stable)](https://packagist.org/packages/inok/detect-cyr-encoding)
[![License](https://poser.pugx.org/inok/detect-cyr-encoding/d/monthly)](https://packagist.org/packages/inok/detect-cyr-encoding)

This package for detecting cyrillic encoding of source text (Supports encodings: **'UTF-8', 'cp866', 'cp1251'**)

### Installation

You can install this package by using [Composer](http://getcomposer.org), running this command:

```sh
composer require inok/detect-cyr-encoding
```
Link to Packagist: https://packagist.org/packages/inok/detect-cyr-encoding

### Usage

```PHP
$detector = new \Inok\detectCyrEncoding\Detector();
$encoding = $detector->detect($text);
```
where:
- **$text** - Text for detect encoding

return:
- **$encoding** - string with one of detected encodings: UTF-8, cp866, cp1251

### License

This package is released under the __MIT license__.

Copyright (c) 2023 Chizhov Nikolay
