<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

use Illuminate\Support\Facades\Artisan;

$request = Illuminate\Http\Request::capture();

$kernel->handle($request);

echo "<pre>";
try {
    // Clear config cache
    Artisan::call('config:clear');
    echo "Config cleared.\n";

    // Clear route cache
    Artisan::call('route:clear');
    echo "Route cleared.\n";

    // Clear application cache
    Artisan::call('cache:clear');
    echo "Cache cleared.\n";

    // Clear view cache
    Artisan::call('view:clear');
    echo "View cleared.\n";

    // Run migrate:fresh --seed
    Artisan::call('migrate:fresh --seed');
    echo "Database migrated and seeded.\n";
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
echo "</pre>";