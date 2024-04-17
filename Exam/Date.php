<?php

$time = date("Сегодня d.m.y H:i");

$time2 = date("j F Y, \a\\t g.i a, l", mktime(13, 30, 0, 1, 22, 1971));
//22 January 1971, at 1.30 pm, Friday
$yestarday = date('Y-m-d', strtotime("-1  days"));
$tomorrow = date('Y-m-d', strtotime("+1  days"));

print $time;