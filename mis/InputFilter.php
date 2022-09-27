<?php

class InputFilter
{
  public static function sanitizeField(string $candidate = ''): string
  {
    $pipeline = strip_tags($candidate);
    $pipeline = trim($pipeline);
    $pipeline = htmlspecialchars($pipeline);
    $pipeline = stripslashes($pipeline);
    return $pipeline;
  }
}
