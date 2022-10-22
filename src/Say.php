<?php

namespace Coolcigarets\CliMaker;

use CanSay;
use HasPattern;

class Say implements HasPattern, CanSay
{
    /**
     * @inheritdoc
     */
    public function pattern(): string
    {
        return '';
    }

    /**
     * @inheritdoc
     */
    public function say($text): void
    {
        $pattern = $this->pattern();

        if (empty($this->pattern())) {
            echo $text;
        }

        $text = mb_str_split($text, 30);

        foreach ($text as &$texts) {
            $texts = trim($texts);

            if (mb_strwidth($texts) < 30) {
                for ($i = mb_strwidth($texts); $i < 30; $i++) {
                    $texts = $texts . ' ';
                }
            }
        }

        $message = preg_split("/\r\n|\n|\r/", $pattern);
        for ($i = 0; $i < count($text); $i++) {
            if (!isset($pattern[$i + 5])) break;
            if (!isset($pattern[$i + 10])) break;
            $message[$i + 5] = substr($pattern[$i + 5], 0, 8) . $text[$i] . substr($pattern[$i + 5], 8 + 30);
        }
        $message = implode("\n", $message);

        echo $message;
    }
}