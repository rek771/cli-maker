<?php

interface HasPattern
{
    /**
     * Выводит сообщение посредством echo через говорящую голову
     * @param $text
     * @return mixed
     */
    public function say($text):void;
}