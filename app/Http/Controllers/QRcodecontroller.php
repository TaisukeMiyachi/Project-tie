<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{
    public function generateQRCode($message_id)
        {
            $url = route('register', ['message_id' => $message_id]);
            return QrCode::size(200)->generate($url);
        }
}