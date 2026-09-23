<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$managements = \App\Models\Management::all()->toArray();
echo json_encode($managements, JSON_PRETTY_PRINT);
