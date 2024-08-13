use App\Http\Controllers\MerchantController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InvoiceController;

Route::apiResource('merchants', MerchantController::class);
Route::apiResource('menus', MenuController::class);
Route::apiResource('orders', OrderController::class);
Route::apiResource('invoices', InvoiceController::class);

Route::get('/merchants', [MerchantController::class, 'index']);
Route::get('/merchants/{id}', [MerchantController::class, 'show']);
Route::post('/merchants', [MerchantController::class, 'store']);
Route::put('/merchants/{id}', [MerchantController::class, 'update']);
Route::delete('/merchants/{id}', [MerchantController::class, 'destroy']);
