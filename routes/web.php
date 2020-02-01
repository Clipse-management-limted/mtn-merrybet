<?php
if(version_compare(PHP_VERSION, '7.2.0', '>=')) {
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
}
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

// Route::resource('/validate', 'TaskController');

Route::get('/clear', function() {

   Artisan::call('cache:clear');
   Artisan::call('config:clear');
   Artisan::call('config:cache');
   Artisan::call('view:clear');

   return "Cleared!";

});
Route::get('/', 'HomeController@index');
Route::get('dashboard', 'HomeController@dashboard');



Route::get('/validate', 'TicketController@val')->name('validate');
Route::post('/questmtncos','HomeController@questmtncos')->name('questmtncos');
Route::post('/send_mail_info','HomeController@tEmail')->name('send_mail_info');
Route::post('/send_mail','HomeController@tEmail')->name('send_mail');
Route::get('/lucks', 'TicketController@lucks')->name('lucks');
Route::get('/won', 'TicketController@won')->name('won');
Route::get('/report', 'MtncotumerController@report')->name('report');
Route::get('/reg', 'MtncotumerController@reg')->name('reg');
Route::get('/total', 'MtncotumerController@total');
Route::get('stock/chart','MtncotumerController@chart');
Route::get('chart/{id}','MtncotumerController@chart2');

Route::get('cregister', 'HomeController@cregister');
Route::get('Raffle', 'HomeController@Raffle');
Route::get('Temail', 'HomeController@Ticketemail');
Route::get('vusers', 'HomeController@Ticketvusers')->name('vusers');
Route::get('valmT', 'HomeController@TicketvalmT')->name('valmT');
Route::post('/TCemail','HomeController@sendbulkEmail')->name('TCemail');
Route::post('/generate_qrcode','MtncotumerController@generate_qrcode')->name('generate_qrcode');
Route::post('/mtncos2','MtncotumerController@sendmtncosEmail2')->name('mtncos2');
Route::post('/mtncos','MtncotumerController@sendmtncosEmail')->name('mtncos');
Route::get('v', 'MtncotumerController@checkin')->name('v');
Route::get('iv', 'MtncotumerController@iv')->name('iv');
Route::get('iv2', 'MtncotumerController@iv2')->name('iv2');
Route::get('self', 'MtncotumerController@self')->name('self');
Route::get('aa', 'MtncotumerController@attenance_activi')->name('aa');
Route::post('/valcheching','HomeController@valcheching')->name('valcheching');
Route::post('/valchechingiv2','HomeController@valchechingiv2')->name('valchechingiv2');
Route::post('/valQrcode','HomeController@validateQrcode')->name('valQrcode');
Route::post('/valMQrcode','HomeController@validateMQrcode')->name('valMQrcode');
Route::post('/scanQrcode','HomeController@validatescanQrcode')->name('scanQrcode');
Route::post('/scanroom','HomeController@validatescanroom')->name('scanroom');
Route::post('/fetchac','MtncotumerController@fetchac')->name('fetchac');
// Route::post('/total','MtncotumerController@total')->name('total');
Route::post('/fetreport','MtncotumerController@fetreport')->name('fetreport');
Route::post('/creg','HomeController@creg')->name('creg');
Route::post('/creg','HomeController@creg2')->name('creg2');
Route::post('/create_activi','HomeController@create_activi')->name('create_activi');

//Route::get('vendor', 'ProductsController@index');

Route::get('topup', 'ClientsController@topup');
Route::post('/top','ClientsController@ctop')->name('top');

Route::get('cart', 'ProductsController@cart');
Route::get('sq', 'HomeController@sq')->name('sq');
Route::get('room', 'HomeController@room')->name('room');

Route::get('add-to-cart/{id}', 'ProductsController@addToCart');

Route::patch('update-cart', 'ProductsController@update');

Route::delete('remove-from-cart', 'ProductsController@remove');

Auth::routes();
Route::get('/hom', 'HomeController@index2')->name('hom');

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware'=>'auth'], function () {
	Route::get('permissions-all-users',
  ['middleware'=>'check-permission:staff|administrator|customer',
  'uses'=>'HomeController@allUsers'
]);
	Route::get('permissions-admin-administrator',
  ['middleware'=>'check-permission:administrator|staff',
  'uses'=>'HomeController@adminSuperadmin'
]);
	Route::get('permissions-administrator',
  ['middleware'=>'check-permission:superadmin',
  'uses'=>'HomeController@superadmin'
]);
Route::get('permissions-staff',
['middleware'=>'check-permission:staff',
'uses'=>'HomeController@superadmin'
]);

Route::get('valguest',['uses'=>'ClientAccountsController@valguestDownload'
])->name('valguest');

Route::get('vendor',['middleware'=>'check-permission:customer','uses'=>'ProductsController@index']);
Route::post('/send_mail','ClientAccountsController@sendbulkEmail')->name('send_mail');


Route::get('data',['middleware'=>'check-permission:administrator|staff','uses'=>'ClientAccountsController@DataDownload'
])->name('data');

Route::get('attend',['middleware'=>'check-permission:administrator|staff','uses'=>'ClientAccountsController@DataattendDownload'
])->name('attend');

Route::get('tickets',['middleware'=>'check-permission:administrator|staff','uses'=>'ClientAccountsController@ticketsDownload'
])->name('tickets');



});
