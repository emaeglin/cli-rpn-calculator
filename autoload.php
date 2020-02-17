<?php

spl_autoload_register(function ($class) {
    $base_dir    = __DIR__ . '/src/';
    $baseFile    = $base_dir . str_replace('\\', '/', $class) . '.php';
    if (file_exists($baseFile)) {
        require_once $baseFile;
        return;
    }

    // Third party libs (not composer)
    $third_party_dir = __DIR__ . '/lib/third_party/';
    $thirdPartyFile = $third_party_dir . str_replace('\\', '/', $class) . '.php';
    if (file_exists($thirdPartyFile)) {
        require_once $thirdPartyFile;
        return;
    }
});