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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('createpdfs', 'CreatePDFController');

//Route::post('createpdfs', 'CreatePDFController@edit')->name('createpdf.edit');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('createpdf', 'CreatePDFController@create')->name('createpdf.create');

Route::post('createpdf', 'CreatePDFController@store')->name('createpdf.store');

Route::get('createpdf/list', 'CreatePDFController@index')->name('createpdf.index');

Route::get('/downloadPDF/{id}', 'CreatePDFController@downloadPDF');

Route::get('pdf_form', 'PdfController@pdfForm');

Route::get('pdf_download', 'PdfController@pdfDownload');

Route::get('/dynamic_pdf', 'DynamicPDFController@index');

Route::get('/dynamic_pdf/pdf', 'DynamicPDFController@pdf');

Route::get('/import_csv', 'ImportController@getImport')->name('import');

Route::post('/import_parse', 'ImportController@parseImport')->name('import_parse');

Route::post('/import_process', 'ImportController@processImport')->name('import_process');
