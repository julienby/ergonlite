<?php

// Démarre le chronomètre au début du script
function startTimer(): float {
    return microtime(true);
}

// Calcule et retourne le temps écoulé depuis le début du script
function endTimer(float $startTime): float {
    return microtime(true) - $startTime;
}



