<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\HardwareController;
use App\Http\Controllers\UnitController;        
use App\Http\Controllers\MenuController;
use App\Http\Controllers\IpController;
use App\Http\Controllers\KerusakanController;
use App\Http\Controllers\MutasiController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\DashboardController;    

use App\Models\Hardware;
use Barryvdh\DomPDF\Facade\Pdf;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// Dashboard untuk semua user (akan di-redirect berdasarkan role di controller)
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Optional: Route khusus admin jika ingin URL berbeda
Route::middleware(['auth', 'role:super-admin|admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('permissions', PermissionController::class);

Route::get('menu/{kd_barang}', [App\Http\Controllers\MenuController::class, 'index']);
Route::get('kerusakan/create/{id}', [App\Http\Controllers\KerusakanController::class, 'createid']);
Route::post('/kerusakan/storeid', [App\Http\Controllers\KerusakanController::class, 'storeid'])->name('kerusakan.storeid');

Route::resource('kerusakan', KerusakanController::class);
Route::resource('ip', IpController::class);

Route::middleware('auth')->group(function () {
Route::resource('mutasis', MutasiController::class);
Route::get('mutasis/createid/{id}', [MutasiController::class, 'createid'])->name('mutasi.createid');
});


Route::get('/showqr', function () {
    $kode = Hardware::whereKdBarang($_GET['kode'])->first();
    $qr = base64_encode(QrCode::format('svg')->size(200)->errorCorrection('H')->generate(url('menu') . '/' . $kode->kd_barang));
    $pdf = Pdf::loadView('hardware.showqr', ['kode' => $kode, 'qr' => $qr]);
    return $pdf->stream('invoice.pdf');
});

Route::resource('mutasis', MutasiController::class);

Route::group(['middleware' => ['role:super-admin|admin']], function () {

    Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    Route::get('permissions/{permissionId}/delete', [App\Http\Controllers\PermissionController::class, 'destroy']);

    Route::resource('roles', App\Http\Controllers\RoleController::class);
    Route::get('roles/{roleId}/delete', [App\Http\Controllers\RoleController::class, 'destroy']);
    Route::get('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class, 'givePermissionToRole']);

    Route::resource('users', App\Http\Controllers\UserController::class);
    Route::get('users/{userId}/delete', [App\Http\Controllers\UserController::class, 'destroy']);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('hardware', HardwareController::class);
});

Route::middleware('auth')->prefix('notifikasi')->name('notifikasi.')->group(function () {
    Route::get('/',             [NotifikasiController::class, 'index'])->name('index');
    Route::patch('baca-semua', [NotifikasiController::class, 'markAllRead'])->name('bacaSemua');
    Route::patch('{id}/baca',  [NotifikasiController::class, 'markAsRead'])->name('baca');
    Route::delete('{id}',      [NotifikasiController::class, 'destroy'])->name('hapus');
});

Route::resource('units', UnitController::class);

require __DIR__ . '/auth.php';