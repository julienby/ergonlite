<?php

foreach (glob(__DIR__ . '/*.php') as $helperFile) {
    require_once $helperFile;
}

