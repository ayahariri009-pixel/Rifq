<?php

namespace App\Http\Controllers;

use App\Services\QRCodeService;
use App\Models\Animal;
use Illuminate\Http\Request;

class QRController extends Controller
{
    public function show(string $hash, QRCodeService $qrService)
    {
        $animal = $qrService->getAnimalByHash($hash);
        
        if (!$animal) {
            abort(404, 'لم يتم العثور على الحيوان');
        }
        
        return view('qr.show', compact('animal'));
    }
}
