<?php

use Carbon\Carbon;

function helperFormatCurrency($val, $with_prefix = true) {
    return $with_prefix ? "Rp. " . number_format($val, 0,",",".") : number_format($val, 0,",",".");
}

function helperParseCurrency($currencyString) {
    return (int) preg_replace("/[^0-9]/", "", $currencyString);
}
