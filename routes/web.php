<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

Route::get('/', [AuthController::class, 'showFormLogin'])->name('login');
Route::get('login', [AuthController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthController::class, 'login']);
// Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
// Route::post('register', [AuthController::class, 'register']);

Route::group(['middleware' => 'auth'], function () {

    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');

    Route::prefix('strategic_direction')->group(function () {
        Route::get('/', 'StrategicDirectionController@index');
        Route::get('/create', 'StrategicDirectionController@create');
        Route::post('/store', 'StrategicDirectionController@store');
        Route::get('/edit/{id}', 'StrategicDirectionController@edit');
        Route::post('/update/{id}', 'StrategicDirectionController@update');
        Route::get('/destroy/{id}', 'StrategicDirectionController@destroy');
    });

    Route::prefix('strategic_priority')->group(function () {
        Route::get('/', 'StrategicPriorityController@index');
        Route::get('/create', 'StrategicPriorityController@create');
        Route::post('/store', 'StrategicPriorityController@store');
        Route::get('/edit/{id}', 'StrategicPriorityController@edit');
        Route::post('/update/{id}', 'StrategicPriorityController@update');
        Route::get('/destroy/{id}', 'StrategicPriorityController@destroy');
        Route::post('/finddetail', 'StrategicPriorityController@finddetail');
    });
    
    Route::prefix('activity_division')->group(function () {
        Route::get('/', 'ActivityDivisionController@index');
        Route::get('/create', 'ActivityDivisionController@create');
        Route::post('/store', 'ActivityDivisionController@store');
        Route::get('/edit/{id}', 'ActivityDivisionController@edit');
        Route::post('/update/{id}', 'ActivityDivisionController@update');
        Route::get('/destroy/{id}', 'ActivityDivisionController@destroy');
        Route::post('/finddetail', 'ActivityDivisionController@finddetail');
    });

    Route::prefix('master')->group(function () {

        Route::prefix('division')->group(function () {
            Route::get('/', 'DivisionController@index');
            Route::get('/create', 'DivisionController@create');
            Route::post('/store', 'DivisionController@store');
            Route::get('/edit/{id}', 'DivisionController@edit');
            Route::post('/update/{id}', 'DivisionController@update');
            Route::get('/destroy/{id}', 'DivisionController@destroy');
        });

        Route::prefix('departemen')->group(function () {
            Route::get('/', 'DepartemenController@index');
            Route::get('/create', 'DepartemenController@create');
            Route::post('/store', 'DepartemenController@store');
            Route::get('/edit/{id}', 'DepartemenController@edit');
            Route::post('/update/{id}', 'DepartemenController@update');
            Route::get('/destroy/{id}', 'DepartemenController@destroy');
        });

        Route::prefix('city')->group(function () {
            Route::get('/', 'CityController@index');
            Route::get('/create', 'CityController@create');
            Route::post('/store', 'CityController@store');
            Route::get('/edit/{id}', 'CityController@edit');
            Route::post('/update/{id}', 'CityController@update');
            Route::get('/destroy/{id}', 'CityController@destroy');
            Route::post('/findcountry', 'CityController@findcountry');
        });

        Route::prefix('currency')->group(function () {
            Route::get('/', 'CurrencyController@index');
            Route::get('/create', 'CurrencyController@create');
            Route::post('/store', 'CurrencyController@store');
            Route::get('/edit/{id}', 'CurrencyController@edit');
            Route::post('/update/{id}', 'CurrencyController@update');
            Route::get('/destroy/{id}', 'CurrencyController@destroy');
        });

        Route::prefix('gender')->group(function () {
            Route::get('/', 'GenderController@index');
            Route::get('/create', 'GenderController@create');
            Route::post('/store', 'GenderController@store');
            Route::get('/edit/{id}', 'GenderController@edit');
            Route::post('/update/{id}', 'GenderController@update');
            Route::get('/destroy/{id}', 'GenderController@destroy');
        });

        Route::prefix('messagetype')->group(function () {
            Route::get('/', 'MessageTypeController@index');
            Route::get('/create', 'MessageTypeController@create');
            Route::post('/store', 'MessageTypeController@store');
            Route::get('/edit/{id}', 'MessageTypeController@edit');
            Route::post('/update/{id}', 'MessageTypeController@update');
            Route::get('/destroy/{id}', 'MessageTypeController@destroy');
        });

        Route::prefix('nameprefix')->group(function () {
            Route::get('/', 'NamePrefixController@index');
            Route::get('/create', 'NamePrefixController@create');
            Route::post('/store', 'NamePrefixController@store');
            Route::get('/edit/{id}', 'NamePrefixController@edit');
            Route::post('/update/{id}', 'NamePrefixController@update');
            Route::get('/destroy/{id}', 'NamePrefixController@destroy');
        });

        Route::prefix('religion')->group(function () {
            Route::get('/', 'ReligionController@index');
            Route::get('/create', 'ReligionController@create');
            Route::post('/store', 'ReligionController@store');
            Route::get('/edit/{id}', 'ReligionController@edit');
            Route::post('/update/{id}', 'ReligionController@update');
            Route::get('/destroy/{id}', 'ReligionController@destroy');
        });

        Route::prefix('status')->group(function () {
            Route::get('/', 'StatusController@index');
            Route::get('/create', 'StatusController@create');
            Route::post('/store', 'StatusController@store');
            Route::get('/edit/{id}', 'StatusController@edit');
            Route::post('/update/{id}', 'StatusController@update');
            Route::get('/destroy/{id}', 'StatusController@destroy');
        });

        Route::prefix('paymenttype')->group(function () {
            Route::get('/', 'PaymentTypeController@index');
            Route::get('/create', 'PaymentTypeController@create');
            Route::post('/store', 'PaymentTypeController@store');
            Route::get('/edit/{id}', 'PaymentTypeController@edit');
            Route::post('/update/{id}', 'PaymentTypeController@update');
            Route::get('/destroy/{id}', 'PaymentTypeController@destroy');
        });

        Route::prefix('picturecategory')->group(function () {
            Route::get('/', 'PictureCategoryController@index');
            Route::get('/create', 'PictureCategoryController@create');
            Route::post('/store', 'PictureCategoryController@store');
            Route::get('/edit/{id}', 'PictureCategoryController@edit');
            Route::post('/update/{id}', 'PictureCategoryController@update');
            Route::get('/destroy/{id}', 'PictureCategoryController@destroy');
        });

        Route::prefix('referralsource')->group(function () {
            Route::get('/', 'ReferralSourceController@index');
            Route::get('/create', 'ReferralSourceController@create');
            Route::post('/store', 'ReferralSourceController@store');
            Route::get('/edit/{id}', 'ReferralSourceController@edit');
            Route::post('/update/{id}', 'ReferralSourceController@update');
            Route::get('/destroy/{id}', 'ReferralSourceController@destroy');
        });

        Route::prefix('modulepackage')->group(function () {
            Route::get('/', 'ModulePackageController@index');
            Route::get('/create', 'ModulePackageController@create');
            Route::post('/store', 'ModulePackageController@store');
            Route::get('/edit/{id}', 'ModulePackageController@edit');
            Route::post('/update/{id}', 'ModulePackageController@update');
            Route::get('/destroy/{id}', 'ModulePackageController@destroy');
        });

        Route::prefix('module')->group(function () {
            Route::get('/', 'ModuleController@index');
            Route::get('/create', 'ModuleController@create');
            Route::post('/store', 'ModuleController@store');
            Route::get('/edit/{id}', 'ModuleController@edit');
            Route::post('/update/{id}', 'ModuleController@update');
            Route::get('/destroy/{id}', 'ModuleController@destroy');
        });

    });

    Route::prefix('user')->group(function () {

        Route::prefix('person')->group(function () {
            Route::get('/', 'PersonController@index');
            Route::get('/create', 'PersonController@create');
            Route::post('/store', 'PersonController@store');
            Route::get('/detail/{id}', 'PersonController@show');
            Route::get('/edit/{id}', 'PersonController@edit');
            Route::post('/update/{id}', 'PersonController@update');
            Route::get('/destroy/{id}', 'PersonController@destroy');
        });

        Route::prefix('usertype')->group(function () {
            Route::get('/', 'UserTypeController@index');
            Route::get('/create', 'UserTypeController@create');
            Route::post('/store', 'UserTypeController@store');
            Route::get('/detail/{id}', 'UserTypeController@show');
            Route::get('/edit/{id}', 'UserTypeController@edit');
            Route::post('/update/{id}', 'UserTypeController@update');
            Route::get('/destroy/{id}', 'UserTypeController@destroy');
        });

        Route::prefix('usertypemodule')->group(function () {
            Route::get('/', 'UserTypeModuleController@index');
            Route::get('/create', 'UserTypeModuleController@create');
            Route::post('/store', 'UserTypeModuleController@store');
            Route::get('/detail/{id}', 'UserTypeModuleController@show');
            Route::get('/edit/{id}', 'UserTypeModuleController@edit');
            Route::post('/update/{id}', 'UserTypeModuleController@update');
            Route::get('/destroy/{id}', 'UserTypeModuleController@destroy');
        });

        Route::prefix('useraccount')->group(function () {
            Route::get('/', 'UserController@index');
            Route::get('/create', 'UserController@create');
            Route::post('/store', 'UserController@store');
            Route::get('/detail/{id}', 'UserController@show');
            Route::get('/edit/{id}', 'UserController@edit');
            Route::post('/update/{id}', 'UserController@update');
            Route::get('/destroy/{id}', 'UserController@destroy');
        });

        Route::prefix('find')->group(function () {
            Route::post('/gender', 'PersonController@findgender');
            Route::post('/provcountry', 'PersonController@findprovcountry');
        });

    });

    Route::prefix('product')->group(function () {

        Route::prefix('product')->group(function () {
            Route::get('/', 'ProductController@index');
            Route::get('/create', 'ProductController@create');
            Route::post('/store', 'ProductController@store');
            Route::get('/detail/{id}', 'ProductController@show');
            Route::get('/edit/{id}', 'ProductController@edit');
            Route::post('/update/{id}', 'ProductController@update');
            Route::get('/destroy/{id}', 'ProductController@destroy');
        });

        Route::prefix('producttype')->group(function () {
            Route::get('/', 'ProductTypeController@index');
            Route::get('/create', 'ProductTypeController@create');
            Route::post('/store', 'ProductTypeController@store');
            Route::get('/edit/{id}', 'ProductTypeController@edit');
            Route::post('/update/{id}', 'ProductTypeController@update');
            Route::get('/destroy/{id}', 'ProductTypeController@destroy');
        });

        Route::prefix('productvouchertype')->group(function () {
            Route::get('/', 'ProductVoucherTypeController@index');
            Route::get('/create', 'ProductVoucherTypeController@create');
            Route::post('/store', 'ProductVoucherTypeController@store');
            Route::get('/edit/{id}', 'ProductVoucherTypeController@edit');
            Route::post('/update/{id}', 'ProductVoucherTypeController@update');
            Route::get('/destroy/{id}', 'ProductVoucherTypeController@destroy');
        });

        Route::prefix('find')->group(function () {
            Route::post('/gender', 'PersonController@findgender');
            Route::post('/provcountry', 'PersonController@findprovcountry');
        });

    });

    Route::prefix('voucher')->group(function () {

        Route::prefix('voucher')->group(function () {
            Route::get('/', 'VoucherController@index');
            Route::get('/create', 'VoucherController@create');
            Route::post('/store', 'VoucherController@store');
            Route::get('/detail/{id}', 'VoucherController@show');
            Route::get('/edit/{id}', 'VoucherController@edit');
            Route::post('/update/{id}', 'VoucherController@update');
            Route::get('/destroy/{id}', 'VoucherController@destroy');
        });

        Route::prefix('vouchertype')->group(function () {
            Route::get('/', 'VoucherTypeController@index');
            Route::get('/create', 'VoucherTypeController@create');
            Route::post('/store', 'VoucherTypeController@store');
            Route::get('/edit/{id}', 'VoucherTypeController@edit');
            Route::post('/update/{id}', 'VoucherTypeController@update');
            Route::get('/destroy/{id}', 'VoucherTypeController@destroy');
        });

        Route::prefix('voucherproducttype')->group(function () {
            Route::get('/', 'VoucherProductTypeController@index');
            Route::get('/create', 'VoucherProductTypeController@create');
            Route::post('/store', 'VoucherProductTypeController@store');
            Route::get('/detail/{id}', 'VoucherProductTypeController@show');
            Route::get('/edit/{id}', 'VoucherProductTypeController@edit');
            Route::post('/update/{id}', 'VoucherProductTypeController@update');
            Route::get('/destroy/{id}', 'VoucherProductTypeController@destroy');
        });

        Route::prefix('vouchertypeproducttype')->group(function () {
            Route::get('/', 'VoucherTypeProductTypeController@index');
            Route::get('/create', 'VoucherTypeProductTypeController@create');
            Route::post('/store', 'VoucherTypeProductTypeController@store');
            Route::get('/detail/{id}', 'VoucherTypeProductTypeController@show');
            Route::get('/edit/{id}', 'VoucherTypeProductTypeController@edit');
            Route::post('/update/{id}', 'VoucherTypeProductTypeController@update');
            Route::get('/destroy/{id}', 'VoucherTypeProductTypeController@destroy');
        });

        Route::prefix('find')->group(function () {
            Route::post('/gender', 'PersonController@findgender');
            Route::post('/provcountry', 'PersonController@findprovcountry');
        });

    });

});