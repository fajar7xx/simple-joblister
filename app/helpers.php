<?php

function changeDateFormat($date, $date_format)
{
    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format($date_format);
}

function formatDate($date)
{
    return date('d-M-Y', strtotime($date));
}