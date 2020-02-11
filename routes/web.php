<?php


// My routes

//Route::resource('/kalendar', 'CalendarController');


// Route::get('/kalendar', function(){ return view('pages.kalendar'); });

// Route::post('/kalendar', 'CalendarController@send');
// Route::get('/kalendar', 'CalendarController@index');
// Route::post('/kalendar', 'CalendarController@store')->name('kalendar.store');

// Route::post('/kalendar', 'CalendarController@send')->name('kalendar.send');;
Route::get('/kalendar', 'CalendarController@index')->name('kalendar.index');
// Route::post('/kalendar', 'CalendarController@store')->name('kalendar.store');



Route::post('/kalendar-send', 'CalendarController@send')->name('kalendar.send');
Route::post('/kalendar-store', 'CalendarController@store')->name('kalendar.store');
Route::post('/kalendar-delete', 'CalendarController@deleteJob')->name('kalendar.delete');

// My routes



Route::group(['middleware' => 'eventOnly'], function(){

    /* Temprorary static*/
    Route::get('/', function () { return view('pages.home'); })->name('home');

    Route::get('/mynote', function () { return view('pages.mynote'); })->name('mynote');
    //Route::get('/kalendar', function(){return view('pages.kalendar');})->name('kalendar');

    /* Dynamic and pages */
    Route::get('/joblist', 'JobsController@index')->name('joblist');
    Route::post('/joblist', 'JobsController@createJobCategory');
    Route::get('/guests', 'GuestsController@index')->name('visitors_list');


    /* Ajax methods */

    Route::group(['prefix' => 'ajax'], function() {

        //JOBS
        Route::post('/swapJobs', 'JobsController@swapJobs');

        Route::post('/getJobData', 'JobsController@getJob');
        Route::post('/saveJobData', 'JobsController@saveJob');

        Route::post('/getNewJobData', 'JobsController@getNewJobData');
        Route::post('/createNewJob', 'JobsController@createNewJob');

        Route::post('/deleteJob', 'JobsController@deleteJob');
        Route::post('/deleteJobOnly', 'JobsController@deleteJobOnly');
        Route::post('/sendCalendarOnly', 'JobsController@sendCalendarOnly');
        Route::post('/setJobDone', 'JobsController@setJobDone');
        Route::post('/setJobNotDone', 'JobsController@setJobNotDone');

        Route::post('/getJobCards', 'JobsController@getJobCards');

        Route::post('/deleteJobCategory', 'JobsController@deleteJobCategory');

        //GUESTS
        Route::get('/getGuestNumbers', 'GuestsController@getGuestNumbers');
        Route::post('/setGuest', 'GuestsController@setGuest');

        //GUESTS CONTACTS

        Route::get('/getGuestContacts', 'GuestsController@getGuestContacts');
        Route::post('/updateGuestContacts', 'GuestsController@updateGuestContacts');
    });

    

});

Route::group(['middleware' => 'noEventOnly'], function(){
    Route::get('/create_wedding', 'WeddingController@getCreateWeddingPage')->name('wedding-create');
    Route::post('/create_wedding', 'WeddingController@postCreateWeddingPage');
});

/* Auth routes */

Route::group(['middleware' => 'guest'], function(){

    /*Route::get('/login', 'Auth\AuthController@get')*/

    Route::get('/register', 'Auth\AuthController@getRegisterPage')->name('register');
    Route::get('/login', 'Auth\AuthController@getLoginPage')->name('login');

    Route::get('/choose-role', function(){
        return view('auth.choose-role');
    })->name('choose-role');

    Route::get('/recovery', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('recovery');
    Route::post('/recovery', 'Auth\ForgotPasswordController@sendResetLinkEmail');

    Route::get('/submitRecovery', 'Auth\ResetPasswordController@showResetForm')->name('new_password');
    Route::post('/submitRecovery', 'Auth\ResetPasswordController@reset');

    Route::post('/register', 'Auth\AuthController@postRegisterPage')->name('post-register');
    Route::post('/login', 'Auth\AuthController@postLoginPage')->name('post-login');

});

Route::get('/logout', 'Auth\AuthController@logout')->name('logout');

/* End of auth routes */



