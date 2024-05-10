<?php
// env.php

// Pengecekan apakah fungsi parseEnv() sudah ada sebelumnya
if (!function_exists('parseEnv')) {
    function parseEnv($filePath)
    {
        $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            if (strpos(trim($line), '#') !== 0) {
                list($key, $value) = explode('=', $line, 2);
                $key = trim($key);
                $value = trim($value);
                if (!array_key_exists($key, $_SERVER) && !array_key_exists($key, $_ENV)) {
                    putenv("$key=$value");
                    $_ENV[$key] = $value;
                    $_SERVER[$key] = $value;
                }
            }
        }
    }
}

// Panggil fungsi untuk membaca file .env
parseEnv(__DIR__ . '/.env');
?>
