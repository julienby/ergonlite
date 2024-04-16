<?php

foreach (glob(__DIR__ . '/*.php') as $bootstrapFile) {
    require_once $bootstrapFile;
}
