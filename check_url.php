<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$getStateUsingUrl = \Illuminate\Support\Facades\Storage::disk('public')->url('managements/test.png');
echo "State URL: " . $getStateUsingUrl . "\n";
echo "Filament URL: " . \Illuminate\Support\Facades\Storage::disk('public')->url($getStateUsingUrl) . "\n";
