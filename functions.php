<?php

function dd($value):void
{
echo "<pre>";
var_dump($value);
echo "</pre>";
die();
};

function urlIs(string $value): string
{
    return $_SERVER['REQUEST_URI'] === $value;
}
