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



Route::get('/about', function () {
    return view('front.about');
});

Route::get('/ustav', function () {
    return view('front.ustav');
});

Route::get('/structure', function () {
    return view('front.structure');
});
 Route::get('/admin', 'HomeController@index')->name('home');
Auth::routes();
Route::prefix('admin')->group(function () {

    Route::get('expertise','Admin\ActivityController@expertise');
    Route::get('view/expertise/{id}','Admin\ActivityController@viewExpertise');
    Route::get('planwork','Admin\ActivityController@planWork');
    Route::get('planwork/remove/{id}','Admin\ActivityController@planWorkRemove');
    Route::get('remove/activities/{id}/{type}','Admin\ActivityController@removeHandler');
    Route::get('projectnpa','Admin\ActivityController@npaProjects');
    Route::get('activites','Admin\ActivityController@activities');
    Route::get('statics','Admin\ActivityController@statics');
    Route::get('/','Admin\ActivityController@statics');
    Route::get('goszakup','Admin\ActivityController@goszakup');
    Route::post('addUploadData','Admin\ActivityController@addUploadData')->name('addUploadData');
    Route::post('updateUploadData','Admin\ActivityController@updateUploadData')->name('updateUploadData');

    Route::post('uploadWorkPlan','Admin\ActivityController@postWorkPlan')->name('uploadWorkPlan');
    Route::get('news','Admin\NewsController@list');
    Route::get('addnews','Admin\NewsController@addNews');
    Route::get('/news/editnews/{id}','Admin\NewsController@editNews')->name('edit_news');;
    Route::post('postAddNews','Admin\NewsController@postAddNews')->name('postAddNews');
    Route::post('/news/editnews/{id}','Admin\NewsController@postUpdateNews')->name('postUpdateNews');
     Route::get('/news/remove/{id}','Admin\NewsController@removeNews')->name('removeNews');

    Route::get('npabase','Admin\ActivityController@NpaBase');
    Route::post('uploadNpaBase','Admin\ActivityController@postNpaBase')->name('uploadNpaBase');
     Route::get('/npabase/remove/{id}','Admin\ActivityController@removeNpaBase')->name('removeNpaBase');


     /* ---- MAP ------- */
    Route::post('addRegion','Admin\MapController@addRegion')->name('addRegion');
    Route::post('addCity','Admin\MapController@addCity')->name('addCity');
    Route::post('addObjects','Admin\MapController@addObjects')->name('addObjects');
    Route::post('updateObjects','Admin\MapController@updateObjects')->name('updateObjects');


    Route::get('map/regions','Admin\MapController@regions');
    Route::get('map/cities','Admin\MapController@cities');
    Route::get('map/objects','Admin\MapController@objects');
    Route::get('map/remove/{id}/{type}','Admin\MapController@removeAll');
    Route::get('map/add_detailsobjects','Admin\MapController@addDetailsObjects');
    Route::post('map/postObjectDetails','Admin\MapController@postObjectDetails')->name('postObjectDetails');
    Route::get('gosservices/','Admin\ActivityController@gosServiceList');
    Route::get('gosservices/{id}','Admin\ActivityController@viewList');
    Route::post('gosservices/add','Admin\ActivityController@addGosUslugi')->name('addGosUslugi');

    Route::get('gosservices/remove/{id}/{type}','Admin\ActivityController@removeGosService');


    /* ---- Vacancies ------- */
     //Route::get('vacancy','Admin\VacancyController@index');
    Route::group(["namespace" => "Admin","prefix" => 'vacancy'],function(){
        Route::get('/','VacancyController@index');
        Route::get('/create','VacancyController@create')->name('create_vacancy');
        Route::post('/create','VacancyController@store')->name('store_vacancy');
        Route::get('/delete/{id}','VacancyController@delete');
        Route::get('/{item}','VacancyController@edit')->name('edit_vacancy');
        Route::post('/{item}','VacancyController@update');
    });
    Route::group(["namespace" => "Admin","prefix" => 'staticpage'],function(){
        Route::get('/','StaticPageController@index');
        Route::get('/create','StaticPageController@create')->name('create_staticpage');
        Route::post('/create','StaticPageController@store')->name('store_staticpage');
        Route::get('/delete/{id}','StaticPageController@delete');
        Route::get('/{item}','StaticPageController@edit')->name('edit_staticpage');
        Route::post('/{item}','StaticPageController@update');
    });

    Route::group(["namespace" => "Admin","prefix" => 'partners'],function(){
        Route::get('/','PartnersController@index');
        Route::get('/create','PartnersController@create')->name('create_partner');
        Route::post('/create','PartnersController@store')->name('store_partner');
        Route::get('/delete/{id}','PartnersController@delete');
        Route::get('/{item}','PartnersController@edit')->name('edit_partner');
        Route::post('/{item}','PartnersController@update');
    });
    Route::group(["namespace" => "Admin","prefix" => 'faqs'],function(){
        Route::get('/','FaqsController@index');
        Route::get('/create','FaqsController@create')->name('create_faq');
        Route::post('/create','FaqsController@store')->name('store_faq');
        Route::get('/delete/{id}','ParFaqsControllertnersController@delete');
        Route::get('/{item}','FaqsController@edit')->name('edit_faq');
        Route::post('/{item}','FaqsController@update');
    });
    Route::group(["namespace" => "Admin","prefix" => 'teams'],function(){
        Route::get('/','TeamsController@index');
        Route::get('/create','TeamsController@create')->name('create_team');
        Route::post('/create','TeamsController@store')->name('store_team');
        Route::get('/delete/{id}','TeamsController@delete');
        Route::get('/{item}','TeamsController@edit')->name('edit_team');
        Route::post('/{item}','TeamsController@update');
    });
    Route::group(["namespace" => "Admin","prefix" => 'slides'],function(){
        Route::get('/','SlidesController@index');
        Route::get('/create','SlidesController@create')->name('create_slide');
        Route::post('/create','SlidesController@store')->name('store_slide');
        Route::get('/delete/{id}','SlidesController@delete');
        Route::get('/{item}','SlidesController@edit')->name('edit_slide');
        Route::post('/{item}','SlidesController@update');
    });




});
 Route::get('/404',function(){
        return view('errors.404',[
            'lang' => app()->getLocale() == 'ru' ? '' : app()->getLocale()
        ]);
    });
Auth::routes();

Route::group(['middleware'=> 'lang_postfix'],function(){

    Route::get('/expertise_type/{lang?}', 'ActivityController@expertise');
    Route::get('/work_plan/{lang?}', 'ActivityController@planWork');
    Route::get('/npa_base/{lang?}', 'ActivityController@npaBase');
    Route::get('/mapview/{id}/{lang?}', 'MapsController@view');
    Route::get('/npa_project/{lang?}', 'ActivityController@npaProjects');
    Route::get('/science_activity/{lang?}', 'ActivityController@scienceActivity');
    Route::get('/goszakup/{lang?}', 'ActivityController@gosZakup');
    Route::get('/statistic/{lang?}', 'ActivityController@analytics');
    Route::get('/news-all/{lang?}', 'NewsController@index');
    Route::get('/news/view/{id}/{lang?}', 'NewsController@view');
    Route::get('/expertise/view/{id}/{lang?}', 'ActivityController@view');
    Route::get('/cert_standart', function () {
        return view('front.cert_standart');
    });
    Route::get('/gos_services/{lang?}', 'ActivityController@gosUslugi');
    Route::get('/staticpage/{slug}/{lang?}','StaticPageController@show');
    Route::get('/vacancy/{lang?}', 'VacancyController@index');
    Route::get('/faqs/{lang?}', 'FaqsController@index');
    Route::get('/{lang?}', 'AboutController@map');
   
    Route::get('/download/{lang}','AllController@download');
});



Route::get('setlocale/{lang}', function ($lang) {


    $referer = Redirect::back()->getTargetUrl(); //URL предыдущей страницы
    $parse_url = parse_url($referer, PHP_URL_PATH); //URI предыдущей страницы
    //разбиваем на массив по разделителю
    $segments = explode('/', $parse_url);

    //Если URL (где нажали на переключение языка) содержал корректную метку языка
    if (in_array($segments[count($segments)-1], ['en','ru','kk'])) {
        unset($segments[count($segments)-1]); //удаляем метку
    }
   //return dump($segments);

    if($segments[0] == '' and  isset($segments[1]) and $segments[1]=='')
        unset($segments[1]);
    //Добавляем метку языка в URL (если выбран не язык по-умолчанию)
    //array_splice($segments, count($segments)-1, 0, $lang);

    if($lang !== 'ru')
        $segments[] = $lang;



    //формируем полный URL
    $url = Request::root().implode("/", $segments);

    //если были еще GET-параметры - добавляем их
    if(parse_url($referer, PHP_URL_QUERY)){
        $url = $url.'?'. parse_url($referer, PHP_URL_QUERY);
    }
    \App::setlocale($lang);
    return redirect($url); //Перенаправляем назад на ту же страницу

})->name('setlocale');


