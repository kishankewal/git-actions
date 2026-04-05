<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller {
    public function index() {
        \Log::info('👉 Controller Hit');
        return response()->json([
            'message' => 'Controller executed'
        ]);
    }
}
