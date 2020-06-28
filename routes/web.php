<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Homestay;
Route::get('/', function () {
    $homestays = Homestay::all();
    $homestay_verified = array();
    foreach($homestays as $h){
        if($h->is_verified == 'sudah'){
            $homestay_verified[] = $h;
        }
    }

    return view('landing-page', compact('homestay_verified'));
});
Route::get('/index', function () {
    return view('index');
});

Route::get('/verifikasi', 'VerificationController@verified');

Route::get('/verifikasiyes', function () {
    return view('verifikasiyes');
} );
Route::get('/dashboard', 'VerificationController@dashboard');
Route::post('/homestay/terima/{homestay}', 'VerificationController@terima' );

Route::get('/verifikasitolak', function () {
    return view('verifikasitolak');
} );

Route::get('/listings', function () {
    return view('listings');
});
Route::get('/login-old', function () {
    return view('login');
});
Route::get('/property-single', function () {
    return view('property-single');
});
Route::get('/register-old', function () {
    return view('register');
});

Route::get('/showuser', function () {
    return view('showuser');
});


Route::get('/verifikasiyes', function () {
    return view('verifikasiyes');
});

Route::get('/verifikasibelum', function () {
    return view('verifikasibelum');
});

Route::get('/upload', 'UploadController@upload');
Route::post('/upload/proses', 'UploadController@proses_upload');

Route::get('showuser', function () {

    $pengguna = DB::table('users')->get();

    return view(['users' => $user]);
});



Route::get('/homestay', 'DashboardController@index');
Route::get('/homestay/create', 'DashboardController@createHomestay');
Route::post('/homestay/create', 'DashboardController@storeHomestay');
Route::get('/createverif','VerifikasiController@createHomestayVerif');
Route::post('createverif','VerifikasiController@storeHomestayVerif');
Route::get('/homestay/edit/{homestay}', 'DashboardController@edit');
Route::post('/homestay/edit/{homestay}', 'DashboardController@update');
Route::delete('/homestay/edit/{homestay}', 'DashboardController@destroy');
Route::get('/showuser', 'DashboardController@showuser')->name('lihatdata');
Route::get('/verifikasiyes','DashboardController@lihatverif');
Route::get('/verifikasiyes/hapus/{id}','DashboardController@hapus');
Route::get('/verifikasibelum','DashboardController@lihatlistverif');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/terlaris',function(){
    return view ('MIS/terlaris');
});
