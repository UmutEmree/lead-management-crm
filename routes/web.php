<?php


Route::get('/', 'PagesController@home');

Route::get('/proje/{id}', 'PagesController@leads');
Route::get('/proje/{id}/bugun', 'PagesController@leadsToday');
Route::get('/logout', 'PagesController@logout');
Route::post('/add-lead', 'LeadController@store');
Route::put('/status-change/{id}', 'PagesController@change')->name('status-change');
Route::post('/status-filter/{id}', 'PagesController@leadsFilter')->name('status-filter');
Route::post('/date-filter/{id}', 'PagesController@dateFilter')->name('date-filter');
Route::delete('/delete-lead/{id}', 'PagesController@deleteLead')->name('delete-lead');
Auth::routes();

Route::get('/home', 'PagesController@home')->name('home');

Route::prefix('admin')->group(function() {
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('/home', 'AdminController@index')->name('admin.dashboard');
  Route::get('/proje/{id}', 'AdminController@leads');
  Route::get('/markalar', 'AdminController@markalar')->name('admin.markalar');
  Route::get('/marka-olustur', 'AdminController@markaolustur')->name('admin.marka-olustur');
  Route::get('/projeler', 'AdminController@projeler')->name('admin.projeler');
  Route::get('/proje-olustur', 'AdminController@projeolustur')->name('admin.proje-olustur');
  Route::get('/proje-duzenle/{id}', 'AdminController@projeduzenle')->name('admin.proje-duzenle');
  Route::get('/marka-duzenle/{id}', 'AdminController@markaduzenle')->name('admin.marka-duzenle');
  Route::get('/kullanici-duzenle/{id}', 'AdminController@kullaniciduzenle')->name('admin.kullanici-duzenle');
  Route::get('/kullanicilar', 'AdminController@kullanicilar')->name('admin.kullanicilar');
  Route::get('/kullanici-olustur', 'AdminController@kullaniciolustur')->name('admin.kullanici-olustur');

  Route::post('/marka-olustur', 'AdminController@markaolusturPost')->name('admin.marka-olusturPost');
  Route::post('/search', 'AdminController@search')->name('admin.autocomplete.fetch');
  Route::post('/searchDo', 'AdminController@searchDo')->name('admin.searchDo');
  Route::post('/kullanici-olustur', 'AdminController@kullaniciolusturPost')->name('admin.kullanici-olusturPost');
  Route::post('/proje-olustur', 'AdminController@projeolusturPost')->name('admin.proje-olusturPost');
  Route::put('/proje-duzenle/{id}', 'AdminController@projeduzenlePost')->name('admin.proje-duzenlePost');
  Route::put('/marka-duzenle/{id}', 'AdminController@markaduzenlePost')->name('admin.marka-duzenlePost');
  Route::put('/kullanici-duzenle/{id}', 'AdminController@kullaniciduzenlePost')->name('admin.kullanici-duzenlePost');
  Route::delete('/delete-brand/{id}', 'AdminController@deleteBrand')->name('delete-brand');
  Route::delete('/delete-user/{id}', 'AdminController@deleteUser')->name('delete-user');
  Route::delete('/delete-project/{id}', 'AdminController@deleteProject')->name('delete-project');
  Route::delete('/delete-lead/{id}', 'AdminController@deleteLead')->name('delete-lead');
Route::put('/status-change/{id}', 'AdminController@change')->name('status-change');
Route::post('/status-filter/{id}', 'AdminController@leadsFilter')->name('status-filter');
Route::post('/date-filter/{id}', 'AdminController@dateFilter')->name('date-filter');

  	// Auth
  Route::get('/login','AdminAuth\LoginController@showLoginForm')->name('admin.login');
  Route::post('/login','AdminAuth\LoginController@login')->name('admin.loginDo');
  Route::get('/logout', 'AdminController@logout')->name('admin.logout');
});