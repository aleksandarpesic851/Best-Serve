<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Artisan;

class ImportantController extends Controller
{
    public function act() {
        //u121584411_ybed
        Artisan::call('migrate:reset', ['--force' => true]);
        // Schema::getConnection()->getDoctrineSchemaManager()->dropDatabase("`best_serve`");
    }
}