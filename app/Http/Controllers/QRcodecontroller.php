<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{
    public function generateQRCode($invite_code)
    {
        $url = route('register', ['invite_code' => $invite_code]);
        return QrCode::size(200)->generate($url);
    }
}