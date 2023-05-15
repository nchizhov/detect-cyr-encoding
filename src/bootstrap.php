<?php

if (\PHP_VERSION_ID >= 70400) {
  return;
}

if (!function_exists('mb_str_split') && function_exists('mb_substr')) {
  function mb_str_split($string, $length = 1, $encoding = null) {
    if (null !== $string && !\is_scalar($string) && !(\is_object($string) && method_exists($string, '__toString'))) {
      trigger_error('mb_str_split() expects parameter 1 to be string, '.\gettype($string).' given', \E_USER_WARNING);

      return null;
    }

    if (1 > $split_length = (int) $length) {
      trigger_error('The length of each segment must be greater than zero', \E_USER_WARNING);

      return false;
    }

    if (null === $encoding) {
      $encoding = mb_internal_encoding();
    }

    if ('UTF-8' === $encoding || \in_array(strtoupper($encoding), ['UTF-8', 'UTF8'], true)) {
      return preg_split("/(.{{$split_length}})/u", $string, -1, \PREG_SPLIT_DELIM_CAPTURE | \PREG_SPLIT_NO_EMPTY);
    }

    $result = [];
    $length = mb_strlen($string, $encoding);

    for ($i = 0; $i < $length; $i += $split_length) {
      $result[] = mb_substr($string, $i, $split_length, $encoding);
    }

    return $result;
  }
}
