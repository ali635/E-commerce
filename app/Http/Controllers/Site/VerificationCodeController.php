<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\VerificationRequest;
use App\Http\Services\VerificationServices;
use Illuminate\Http\Request;

class VerificationCodeController extends Controller
{

    public $verificationService;
     public function __construct(VerificationServices $verificationService)
     {
         $this  -> verificationService = $verificationService;
     }

    public function verify(VerificationRequest $request)
    {

        $check = $this->verificationService->checkOTPCode($request->code);

        if(!$check){  // code not correct

            return redirect()->route('get.verification.form')->withErrors(['code'=> 'الكود الذي ادخلته غير موجود']);

        }else {  // verifiction code correct
            $this->verificationService->removeOTPCode($request->code);
            return redirect()->route('home');
        }
    }
    public function getverifyPage()
    {
        return view('auth.verification');
    }
}
