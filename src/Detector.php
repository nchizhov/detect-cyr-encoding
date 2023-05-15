<?php

namespace Inok\detectCyrEncoding;

class Detector {
  private $cyrWeight = [
    'о', 'е', 'а', 'и', 'н', 'т', 'с', 'р', 'в', 'л', 'к', 'м', 'д', 'п', 'у', 'я', 'ы', 'ь', 'г', 'з',
    'б', 'ч', 'й', 'х', 'ж', 'ш', 'ю', 'ц', 'щ', 'э', 'ф', 'ъ', 'ё'
  ];

  private $cyrEncodings = ['cp1251', 'cp866'];

  public function detect(string $text): string {
    if (mb_check_encoding($text, 'UTF-8')) {
      return 'UTF-8';
    }
    $text = $this->sanitizeText($text);
    $textWeights = [];
    foreach ($this->cyrEncodings as $encoding) {
      $textWeights[$encoding] = $this->countWeight($text, $encoding);
    }
    return array_search(max($textWeights), $textWeights);
  }

  private function countWeight(string $text, string $encoding): int {
    $text = mb_convert_encoding($text, 'UTF-8', $encoding);
    $letters = array_count_values(mb_str_split($text));
    arsort($letters);
    return count(array_intersect($this->cyrWeight, array_keys($letters)));
  }

  private function sanitizeText(string $text): string {
    return str_replace(["\n", "\r\n", "\r", " "], '', $text);
  }
}
