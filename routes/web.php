<?php

use Illuminate\Support\Facades\Route;

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



Route::group(['middleware' => 'userpegawai'], function () {
	Route::get('/batalkonsum/{id_peminjaman}/{id_ruang}/{tanggal}/{waktu}', ['as' => 'pegawai.ubahkonsumsi', 'uses' => 'App\Http\Controllers\UserController@hapusKonsumsi']);
	Route::get('/ubahpesanankonsumsi/{id_ruang}/{tanggal}/{waktu}/{id_peminjaman}', ['as' => 'pegawai.ubahkonsumsi', 'uses' => 'App\Http\Controllers\UserController@formUbahKonsumsi']);
	Route::post('/ubahKonsum/{id_peminjaman}/{tanggal}/{id_ruang}/{waktu}', ['as' => 'pegawai.ubahkonsumsi', 'uses' => 'App\Http\Controllers\UserController@ubahKonsumsi']);
	Route::get('/cetak_pdf_user/{tglawal}/{tglakhir}/{gedung}', 'App\Http\Controllers\CetakController@usercetakRuangan')->name('cetak_pdf_user');
	Route::post('/showRekap', ['as' => 'pegawai.rekapruangan', 'uses' => 'App\Http\Controllers\UserController@showRekap']);
	Route::get('/rekapruang', ['as' => 'pegawai.rekapruangan', 'uses' => 'App\Http\Controllers\UserController@filterRekap']);
	Route::get('/homeuser', ['as' => 'pegawai.home', 'uses' => 'App\Http\Controllers\UserController@homeUser']);
	Route::get('/daftargedung', ['as' => 'pegawai.gedung', 'uses' => 'App\Http\Controllers\UserController@showGedung']);
	Route::get('/cariRuangan', ['as' => 'pegawai.bookruanganresult', 'uses' => 'App\Http\Controllers\UserController@findRoom']);
	Route::get('/daftarruangan/{gedungfilter}', ['as' => 'pegawai.ruang', 'uses' => 'App\Http\Controllers\UserController@showRuang']);
	Route::post('/daftarruangan/{gedungfilter}', ['as' => 'pegawai.ruang', 'uses' => 'App\Http\Controllers\UserController@showRuang']);
	Route::post('/validatejadwalruang', ['as' => 'pegawai.jadwalruanguser', 'uses' => 'App\Http\Controllers\UserController@validateJadwal']);
	Route::post('/userBook/{id_ruang}/{approve}', ['as' => 'pegawai.prosesbooking', 'uses' => 'App\Http\Controllers\UserController@bookRuang']);
	Route::get('/validatejadwalruang', ['as' => 'pegawai.jadwalruanguser', 'uses' => 'App\Http\Controllers\UserController@validateJadwal']);
	Route::get('/jadwalruang', ['as' => 'pegawai.jadwalruanguser', 'uses' => 'App\Http\Controllers\UserController@showJadwal']);
	Route::get('/jadwalruang/{id_ruang}/{tanggal}', ['as' => 'pegawai.jadwalruanguser', 'uses' => 'App\Http\Controllers\UserController@showJadwalFilter']);
	Route::get('/mybooking', ['as' => 'pegawai.bookinguser', 'uses' => 'App\Http\Controllers\UserController@showBooking']);
	Route::get('/pesanruang', ['as' => 'pegawai.pemesanan', 'uses' => 'App\Http\Controllers\UserController@bookForm']);
	Route::get('/myprofile', ['as' => 'pegawai.editprofile', 'uses' => 'App\Http\Controllers\UserController@editProfile']);
	Route::get('/prosespesan/{id_ruang}/{wktawal}/{wktakhir}/{tanggal}', ['as' => 'pegawai.prosesbooking', 'uses' => 'App\Http\Controllers\UserController@konsumsiForm']);
	Route::get('/pesanjadwal/{id_ruang}/{wktawal}/{wktakhir}/{tanggal}', ['as' => 'pegawai.prosesbooking', 'uses' => 'App\Http\Controllers\UserController@jadwalForm']);
});


Auth::routes();

Auth::routes();

Route::group(['middleware' => 'master'], function () {
	Route::post('/showLaporanMaster', ['as' => 'master.laporan', 'uses' => 'App\Http\Controllers\CetakController@filterlaporanmastershow']);
	Route::post('/showLaporanMasterKonsumsi', ['as' => 'master.laporankonsumsi', 'uses' => 'App\Http\Controllers\CetakController@filterlaporankonsumsishow']);
	Route::get('showPerusahaan', ['as' => 'master.perusahaan', 'uses' => 'App\Http\Controllers\MasterController@showPerusahaan']);
	Route::get('showGedungMaster', ['as' => 'master.gedung', 'uses' => 'App\Http\Controllers\MasterController@showGedung']);
	Route::get('showRuangMaster', ['as' => 'master.ruang', 'uses' => 'App\Http\Controllers\MasterController@showRuang']);
	Route::get('showPegawaiMaster', ['as' => 'master.pegawai', 'uses' => 'App\Http\Controllers\MasterController@showPegawai']);
	Route::get('showPeminjamanMaster', ['as' => 'master.peminjaman', 'uses' => 'App\Http\Controllers\MasterController@showPeminjaman']);
	Route::get('showKonsumsi', ['as' => 'master.konsumsi', 'uses' => 'App\Http\Controllers\MasterController@showKonsumsi']);
	Route::get('showJadwalKonsumsi', ['as' => 'master.jadwalkonsumsi',	 'uses' => 'App\Http\Controllers\MasterController@showJadwalKonsumsi']);
	Route::post('addperusahaan', [App\Http\Controllers\DatamasterController::class, 'addPerusahaan']);
	Route::get('deleteperusahaan/{id_perusahaaan}', [App\Http\Controllers\DatamasterController::class, 'deletePerusahaan']);
	Route::get('ubahperusahaan/{id_perusahaan}', ['as' => 'master.perusahaan', 'uses' => 'App\Http\Controllers\MasterController@ubahPerusahaan']);
	Route::get('/laporanMaster', ['as' => 'master.laporan', 'uses' => 'App\Http\Controllers\CetakController@filterlaporanmaster']);
	Route::get('/laporanMasterKonsumsi', ['as' => 'master.laporankonsumsi', 'uses' => 'App\Http\Controllers\CetakController@filterlaporankonsumsi']);
	Route::get('/cetak_pdf_tgl_master/{tglawal}/{tglakhir}/{perusahaan}', 'App\Http\Controllers\CetakController@cetakRuanganMaster')->name('cetak_pdf_tgl_master');
	Route::get('/cetak_konsumsi/{tglawal}/{tglakhir}/{perusahaan}', 'App\Http\Controllers\CetakController@cetakKonsumsiMaster')->name('cetak_konsumsi');
	Route::post('changeperusahaan/{id_perusahaaan}', [App\Http\Controllers\DatamasterController::class, 'ubahPerusahaan']);
	Route::get('addgedungmaster', ['as' => 'master.addgedung', 'uses' => 'App\Http\Controllers\MasterController@addGedung']);
	Route::post('tambahgedungmaster', [App\Http\Controllers\DatamasterController::class, 'addGedung']);
	Route::get('deletegedungmaster/{id_gedung}', [App\Http\Controllers\DatamasterController::class, 'deleteGedung']);
	Route::get('ubahgedungmaster/{id_gedung}', ['as' => 'master.ubahgedung', 'uses' => 'App\Http\Controllers\MasterController@ubahGedung']);
	Route::post('editgedungmaster/{id_gedung}', [App\Http\Controllers\DatamasterController::class, 'editGedung']);
	Route::get('deleteruangmaster/{id_gedung}', [App\Http\Controllers\DatamasterController::class, 'deleteRuang']);
	Route::get('addruanganmaster', ['as' => 'master.ruang', 'uses' => 'App\Http\Controllers\MasterController@addRuangan']);
	Route::get('ubahruangmaster/{id_ruang}/{id_perusahaan}', ['as' => 'master.ruang', 'uses' => 'App\Http\Controllers\MasterController@ubahRuangan']);
	Route::post('editruangmaster/{id_ruang}', [App\Http\Controllers\DatamasterController::class, 'editRuang']);
	Route::get('addpegawai', ['as' => 'master.pegawai', 'uses' => 'App\Http\Controllers\MasterController@addPegawai']);
	Route::get('deleteuser/{id}', [App\Http\Controllers\DatamasterController::class, 'deleteUser']);
	Route::get('deletekonsumsimaster/{id}', [App\Http\Controllers\DatamasterController::class, 'deleteKonsumsi']);
	Route::post('addadminmaster', [App\Http\Controllers\DatamasterController::class, 'addAdmin']);
});

Route::group(['middleware' => 'konsumsi'], function () {
	Route::get('showKonsumsii', ['as' => 'pages.konsumsi', 'uses' => 'App\Http\Controllers\PageController@showKonsumsi']);
	Route::get('showJadwalKonsumsii', ['as' => 'pages.jadwalkonsumsi',	 'uses' => 'App\Http\Controllers\PageController@showJadwalKonsumsi']);
	Route::get('/laporanKonsumsi', ['as' => 'pages.laporankonsumsi', 'uses' => 'App\Http\Controllers\CetakController@filterlaporankonsumsii']);
	Route::get('/cetak_konsumsi_msk/{tglawal}/{tglakhir}/{id_gedung}', 'App\Http\Controllers\CetakController@cetakKonsumsi')->name('cetak_konsumsi');
	Route::post('tambahmakanan', [App\Http\Controllers\DataController::class, 'tambahMakanan']);
	Route::post('tambahminuman', [App\Http\Controllers\DataController::class, 'tambahMinuman']);
	Route::post('ubahkonsumsi/{id}', [App\Http\Controllers\DataController::class, 'ubahKonsumsi']);
	Route::post('/laporanKonsumsishow', ['as' => 'pages.laporankonsumsi', 'uses' => 'App\Http\Controllers\CetakController@filterlaporankonsumsiishow']);
	Route::get('deletekonsumsi/{id}', [App\Http\Controllers\DataController::class, 'deleteKonsumsi']);
});
Route::group(['middleware' => 'loggedin'], function () {
	Route::get('/', ['uses' => 'App\Http\Controllers\HomeController@base']);
});
Auth::routes();
Route::get('/profileuser', function () {
	return view('pegawai.profile');
});
Auth::routes();
Route::get('/welcome', function () {
	return view('welcome');
});

//Metronic

Auth::routes();


Auth::routes();


Auth::routes();

Route::get('home', 'App\Http\Controllers\HomeController@index')->name('dashboard');
Route::get('/master', 'App\Http\Controllers\HomeController@master')->name('dashboard');

Route::get('home', 'App\Http\Controllers\HomeController@index')->name('dashboard');

Route::group(['middleware' => 'ruang'], function () {
	Route::post('addgedungadmin/{id_perusahaan}', [App\Http\Controllers\DataController::class, 'addGedung']);
	Route::post('deletegedung/{id_gedung}/{id_perusahaan}', [App\Http\Controllers\DataController::class, 'deleteGedung']);
	Route::get('deletegedung/{id_gedung}/{id_perusahaan}', [App\Http\Controllers\DataController::class, 'deleteGedung']);
	Route::get('ubahgedung/{id_gedung}', ['as' => 'pages.gedung', 'uses' => 'App\Http\Controllers\PageController@ubahGedung']);
	Route::post('editgedungadmin/{id_gedung}/{id_perusahaan}', [App\Http\Controllers\DataController::class, 'ubahGedung']);
	Route::get('addruangan/{id_perusahaan}', ['as' => 'pages.ruang', 'uses' => 'App\Http\Controllers\PageController@addRuangPage']);
	Route::get('addruangan/{id_gedung}', ['as' => 'pages.ruang', 'uses' => 'App\Http\Controllers\PageController@ajax']);
	Route::post('addruangadmin/{id_perusahaan}', [App\Http\Controllers\DataController::class, 'addRuang']);
	Route::get('deleteruang/{id_ruang}/{id_perusahaan}', [App\Http\Controllers\DataController::class, 'deleteRuang']);
	Route::get('ubahruang/{id_ruang}/{id_perusahaan}', ['as' => 'pages.ruang', 'uses' => 'App\Http\Controllers\PageController@ubahRuangan']);
	Route::get('showGedung/{id_perusahaan}', ['as' => 'pages.gedung', 'uses' => 'App\Http\Controllers\PageController@showGedung']);
	Route::get('showRuang/{id_perusahaan}', ['as' => 'pages.ruang', 'uses' => 'App\Http\Controllers\PageController@showRuang']);
	Route::post('editruang/{id_ruang}/{id_perusahaan}', [App\Http\Controllers\DataController::class, 'editRuang']);
	Route::get('terimabook/{id_peminjaman}', [App\Http\Controllers\DataController::class, 'terimaBook']);
	Route::get('tolakbook/{id_peminjaman}', [App\Http\Controllers\DataController::class, 'tolakBook']);
	Route::get('/frekuensiruangan', ['as' => 'pages.frekuensiruangan', 'uses' => 'App\Http\Controllers\PageController@showFrek']);
	Route::post('/showdatafrek', ['as' => 'pages.frekuensiruangan', 'uses' => 'App\Http\Controllers\PageController@showDataFrek']);
});


Route::group(['middleware' => 'user'], function () {
	Route::get('addpegawai/{id_perusahaan}', ['as' => 'pages.pegawai', 'uses' => 'App\Http\Controllers\PageController@addPegawai']);
	Route::post('addadmin/{id_perusahaan}', [App\Http\Controllers\DataController::class, 'addAdmin']);
	Route::post('addpegawaibaru/{id_perusahaan}', [App\Http\Controllers\DataController::class, 'addPegawai']);
	Route::get('deleteuser/{id}/{id_perusahaan}', [App\Http\Controllers\DataController::class, 'deletePegawai']);
	Route::get('ubahuser/{id}/{id_perusahaan}', ['as' => 'pages.pegawai', 'uses' => 'App\Http\Controllers\PageController@ubahPegawai']);
	Route::get('ubahadmin/{id}/{id_perusahaan}', ['as' => 'pages.pegawai', 'uses' => 'App\Http\Controllers\PageController@ubahAdmin']);
	Route::post('editpegawai/{id}/{id_perusahaan}', [App\Http\Controllers\DataController::class, 'ubahPegawai']);
	Route::post('ubahms/{id}/{id_perusahaan}', [App\Http\Controllers\DataController::class, 'ubahAdmin']);
	Route::get('ubahpassworduser/{id}/{id_perusahaan}', ['as' => 'pages.pegawai', 'uses' => 'App\Http\Controllers\PageController@ubahPasswordUser']);
	Route::get('showPegawai/{id_perusahaan}', ['as' => 'pages.pegawai', 'uses' => 'App\Http\Controllers\PageController@showPegawai']);
	Route::post('tambahdepartemen/{id_perusahaan}', [App\Http\Controllers\DataController::class, 'addDepartemen']);
	Route::get('deleteDepartemen/{id_departemen}/{id_perusahaan}', [App\Http\Controllers\DataController::class, 'deleteDepartemen']);
	Route::get('ubahDepartemen/{id_departemen}', ['as' => 'pages.pegawai', 'uses' => 'App\Http\Controllers\PageController@ubahDepartemen']);
	Route::post('editdepartemen/{id_departemen}/{id_perusahaan}', [App\Http\Controllers\DataController::class, 'editDepartemen']);
});


Route::post('batalpinjam/{id}', [App\Http\Controllers\UserController::class, 'batalPinjam']);

Route::get('deletejadwal/{id_peminjaman}/{id_perusahaan}', [App\Http\Controllers\DataController::class, 'deletejadwal']);
Route::get('/laporan/{id_perusahaan}', ['as' => 'pages.laporanruangan', 'uses' => 'App\Http\Controllers\CetakController@filterlaporan']);
Route::get('/cetak_pdf_tgl/{tglawal}/{tglakhir}/{gedung}', 'App\Http\Controllers\CetakController@cetakRuangan')->name('cetak_pdf_tgl');


Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::patch('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::patch('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	Route::patch('profile/password/pegawai', ['as' => 'profilepegawai.password', 'uses' => 'App\Http\Controllers\ProfileController@passwordpegawai']);
	Route::patch('profile/password/ubahpegawai', ['as' => 'profilepegawai.ubahpassword', 'uses' => 'App\Http\Controllers\ProfileController@ubahpassworduser']);
	Route::post('/laporanshow', ['as' => 'pages.laporanruangan', 'uses' => 'App\Http\Controllers\CetakController@filterlaporanshow']);
	Route::get('/showDataFrekuensi/{tgl1}/{tgl2}/{gedung}', ['as' => 'pages.laporanruangan', 'uses' => 'App\Http\Controllers\PageController@showDataFrekuensi']);
});
Auth::routes();
Route::group(['middleware' => 'auth'], function () {
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'App\Http\Controllers\PageController@index']);
});
Auth::routes();
Route::group(['middleware' => 'auth'], function () {
	Route::get('showPeminjaman/{id_perusahaan}', ['as' => 'pages.jadwal', 'uses' => 'App\Http\Controllers\PageController@showPeminjaman']);
});
Auth::routes();
