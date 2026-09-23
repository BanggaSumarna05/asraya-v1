<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$column = \Filament\Tables\Columns\ImageColumn::make('test')->disk('public');
// We can't easily instantiate a column and render it without a table, but we can look at the trait.
// Let's just find the view for image-column.
