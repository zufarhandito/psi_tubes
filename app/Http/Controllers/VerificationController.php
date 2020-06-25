<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;
use App\Homestay;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function verified(){
        $homestays = Homestay::all();
        $verified_homestays = array();
        foreach($homestays as $homestay){
            if($homestay->is_verified == 'sudah'){
                $verified_homestays[] = $homestay;
            }
        }
        return view('verifikasi',  compact('verified_homestays'));
    }

    public function dashboard(){
        $homestays = Homestay::all();
        $n_belum_verifikasi = 0;
        $n_sudah_verifikasi = 0;
        foreach($homestays as $homestay){
            if($homestay->is_verified == 'belum'){
                $n_belum_verifikasi++;
            }
            if($homestay->is_verified == 'sudah'){
                $n_sudah_verifikasi++;
            }
        }
        return view('dashboard', compact('n_belum_verifikasi', 'n_sudah_verifikasi'));
    }
    public function terima($id){
        $homestay = Homestay::find($id);
        $homestay->update([
            'is_verified' => 'sudah',
        ]);
        return redirect('/verifikasiyes');
    }
}
