<?php

use Carbon\Carbon;

// dth = DateTimeHelper

function dth_date($date, $format = 'd.m.Y') : string
{
    return date($format, strtotime($date));
}

function dth_now($format = 'Y-m-d H:i:s') : string
{
    return Carbon::now()->format($format);
}
