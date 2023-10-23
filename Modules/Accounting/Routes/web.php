<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Modules\FormBuilder\Http\Controllers\FormBuilderController;
use Modules\Accounting\Http\Controllers\ChartOfAccountController;
use Modules\Accounting\Http\Controllers\ChartOfAccountTypeController;
use Modules\Accounting\Http\Controllers\ChartOfAccountSubTypeController;
use Modules\Accounting\Http\Controllers\BankAccountController;
use Modules\Accounting\Http\Controllers\BankTransferController;
use Modules\Accounting\Http\Controllers\ProposalController;
use Modules\Accounting\Http\Controllers\ProductServiceController;
use Modules\Accounting\Http\Controllers\ProductServiceCategoryController;
use Modules\Accounting\Http\Controllers\CustomFieldController;
use Modules\Accounting\Http\Controllers\TaxController;

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

/* Route::prefix('accounting')->group(function() {
    Route::get('/', 'AccountingController@index');
}); */
Route::group(
    [
        'middleware' => [
            'auth',
            /* 'XSS',
            'revalidate', */
        ],
    ], function ()
{
    Route::resource('bank-account', BankAccountController::class);
}
);
Route::group(
    [
        'middleware' => [
            'auth',
           /*  'XSS',
            'revalidate', */
        ],
    ], function ()
{
    //Route::get('bank-transfer/index', [BankTransferController::class, 'index'])->name('bank-transfer.index');
    Route::resource('bank-transfer', BankTransferController::class);
}
);

Route::resource('custom-field', CustomFieldController::class)->middleware(['auth']);

Route::post('chart-of-account/subtype', [ChartOfAccountController::class, 'getSubType'])->name('charofAccount.subType')->middleware(['auth']);
//Route::post('chart-of-account/store', [ChartOfAccountController::class, 'getSubType'])->name('charofAccount.subType')->middleware(['auth']);


Route::resource('chart-of-account', ChartOfAccountController::class)->middleware(['auth']);
Route::resource('chart-of-account-type', ChartOfAccountTypeController::class)->middleware(['auth']);
Route::resource('chart-of-account-subtype', ChartOfAccountSubTypeController::class)->middleware(['auth']);

Route::group(
    [
        'middleware' => [
            'auth',
        ],
    ], function (){
    Route::get('proposal/{id}/status/change', [ProposalController::class, 'statusChange'])->name('proposal.status.change');
    Route::get('proposal/{id}/convert', [ProposalController::class, 'convert'])->name('proposal.convert');
    Route::get('proposal/{id}/duplicate', [ProposalController::class, 'duplicate'])->name('proposal.duplicate');
    Route::post('proposal/product/destroy', [ProposalController::class, 'productDestroy'])->name('proposal.product.destroy');
    Route::post('proposal/customer', [ProposalController::class, 'customer'])->name('proposal.customer');
    Route::post('proposal/product', [ProposalController::class, 'product'])->name('proposal.product');
    Route::get('proposal/items', [ProposalController::class, 'items'])->name('proposal.items');
    Route::get('proposal/{id}/sent', [ProposalController::class, 'sent'])->name('proposal.sent');
    Route::get('proposal/{id}/resent', [ProposalController::class, 'resent'])->name('proposal.resent');
    Route::resource('proposal', ProposalController::class);
    Route::get('proposal/create/{cid}', [ProposalController::class, 'create'])->name('proposal.create');

}
);

Route::get('/proposal/preview/{template}/{color}', [ProposalController::class, 'previewProposal'])->name('proposal.preview');

Route::post('/proposal/template/setting', [ProposalController::class, 'saveProposalTemplateSettings'])->name('proposal.template.setting');
Route::get('/customer/proposal/{id}/', [ProposalController::class, 'invoiceLink'])->name('proposal.link.copy');
Route::get('proposal/pdf/{id}', [ProposalController::class, 'proposal'])->name('proposal.pdf')->middleware(['auth']);
Route::get('export/proposal', [ProposalController::class, 'export'])->name('proposal.export');

Route::resource('product-category', ProductServiceCategoryController::class)->middleware(['auth']);
Route::resource('taxes', TaxController::class)->middleware(['auth']);
Route::resource('product-unit', ProductServiceUnitController::class)->middleware(['auth']);

Route::post('product-category/getaccount', [ProductServiceCategoryController::class, 'getAccount'])->name('productServiceCategory.getaccount')->middleware(['auth']);

Route::get('productservice/index', [ProductServiceController::class, 'index'])->name('productservice.index');
Route::get('productservice/{id}/detail', [ProductServiceController::class, 'warehouseDetail'])->name('productservice.detail');
Route::post('empty-cart', [ProductServiceController::class, 'emptyCart'])->middleware(['auth']);
Route::post('warehouse-empty-cart', [ProductServiceController::class, 'warehouseemptyCart'])->name('warehouse-empty-cart')->middleware(['auth']);
Route::resource('productservice', ProductServiceController::class)->middleware(['auth']);
Route::get('export/productservice', [ProductServiceController::class, 'export'])->name('productservice.export');
Route::get('import/productservice/file', [ProductServiceController::class, 'importFile'])->name('productservice.file.import');
Route::post('import/productservice', [ProductServiceController::class, 'import'])->name('productservice.import');
Route::get('product-categories', [ProductServiceCategoryController::class, 'getProductCategories'])->name('product.categories')->middleware(['auth']);
Route::get('add-to-cart/{id}/{session}', [ProductServiceController::class, 'addToCart'])->middleware(['auth']);
Route::patch('update-cart', [ProductServiceController::class, 'updateCart'])->middleware(['auth']);
Route::delete('remove-from-cart', [ProductServiceController::class, 'removeFromCart'])->middleware(['auth']);
Route::get('name-search-products', [ProductServiceCategoryController::class, 'searchProductsByName'])->name('name.search.products')->middleware(['auth']);
Route::get('search-products', [ProductServiceController::class, 'searchProducts'])->name('search.products')->middleware(['auth']);
