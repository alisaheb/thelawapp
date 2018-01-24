<?php
Route::get('emailverification', 'UserController@emailverification');

Route::get('resend-code', 'UserController@emailVerifyCode');

Route::get('/', 'TaskController@home');

Route::get('howitworks', function () {
    return view('userpanel.howitworks');
});

Route::get('home',function(){
    return redirect ('/');
});

Route::get('/test-mail', 'UserController@testMail');

Route::get('test-sms', 'UserController@smsTest');

Route::auth();

Route::group(['middleware' => 'auth'], function () {

    Route::get('dashboard', 'UserController@dashboard');

    Route::get('payments', 'PaymentController@payment');

    Route::post('delete_mytask_doc', 'TaskController@delete_mytask_doc');

    Route::get('password', function () {
        return view('userpanel.password');
    });

    Route::get('verification','CertificateController@certificates'); 

    Route::get('messages', 'SettingController@messages');

    Route::post('save_messages', 'SettingController@save_messages');

    Route::get('profile', 'UserController@profileview');

    Route::post('saveprofile', 'UserController@saveprofile');

    Route::get('reviews', 'ReviewsController@index');

    Route::post('ajaxbrowsecase', 'TaskController@ajaxbrowsecase');

    Route::post('regsiterTask', 'TaskController@regsitercomplain');

    Route::get('demo', 'TaskController@find');

    Route::post('numberverification', 'UserController@numberverification');

    Route::post('sendverification', 'UserController@sendverificationcode');

    Route::post('accountdetails', 'UserController@accountdetails');

    Route::post('addskills', 'UserController@addskills');;

    Route::post('saveskills', 'UserController@saveskills');;

    Route::get('skills', 'UserController@skills');

    Route::get('mail', 'UserController@sendEmailReminder');

    Route::post('mytaskajax', 'TaskController@mytaskajax');

    Route::get('mycases', 'TaskController@mytaskslist');

    Route::post('ajaxtask', 'TaskController@mytaskajax');

    Route::post('ajax_save_comment', 'CommentController@ajax_save_comment');
    
    Route::post('uploadimage', 'UserController@uploadimage');
        
    Route::get('upload', 'UserController@upload');

    Route::post('userLogin', 'UserController@userLogin');
    
    Route::post('savedescription', 'UserController@savedescription');

    Route::post('pusher', 'TaskController@realtimechat');
    
    Route::post('pushmessage', 'SettingController@realtime_message');

    Route::get('/logout', 'Auth\LoginController@logout');

    //Route::post('pushauth', 'TaskController@pushauth');
    
    Route::post('acceptoffer', 'BidController@acceptoffer');
    
    Route::post('uploadtaskimages', 'TaskController@uploadtaskimages');
    
    Route::get('profile/{id}', 'UserController@userprofile');
    
    Route::post('headerimage', 'UserController@headerimage');
    
    Route::get('notify', 'NotificationController@notify');
    
    Route::get('readall', 'NotificationController@readall');
    
    Route::get('messagenotify', 'SettingController@messagenotify');

    Route::get('cardverification', 'PaymentController@cardveri');
    
    Route::post('cardverification', 'PaymentController@cardverification');
    
    Route::post('checkcard', 'PaymentController@checkcard');
    
    Route::post('paytoadmin', 'PaymentController@paytoadmin');

    Route::post('billing_address', 'UserController@billing_address');
    
    Route::post('paypalmail', 'UserController@paypalmail');
    
    Route::post('remove_account', 'UserController@remove_account');
    
    Route::post('admin_verification', 'UserController@admin_verification');

    Route::get('payment_history', 'PaymentController@payment_history');;

    Route::get('notifications', 'UserController@notifications');
    
    Route::get('mycase/{slug}', 'TaskController@my_case_slug');

    Route::get('mycase/review/{slug}', 'TaskController@myReview');

    Route::post('mycase/review/{id}', 'TaskController@postMyReview');
    
    Route::get('messages/{id}', 'SettingController@messagesbyid');

    Route::post('resetpassword', 'UserController@resetpassword');

    Route::post('hire','BidController@hire');


    Route::group(['prefix'=>'admin','middleware' => 'admin','namespace' => 'Admin'], function () {

        Route::resource('categories', 'CategoryController');

        Route::get('/', function () { return redirect('admin/dashboard'); });

        Route::get('dashboard', 'UserController@dashboard');

        Route::get('who-we-are', 'SettingController@whoweare');
    
        Route::post('who-we-are', 'SettingController@update');
        
        Route::get('userdetails/{id}', 'UserController@userdetails');

        Route::get('editustask', function () { return view('admin.edit_user'); });

        Route::get('adduser', function () { return view('admin.add_user'); });

        Route::get('homepage', function () { return view('admin.home_content'); });

        Route::get('payments', 'PaymentController@paytoadmin_list');

        Route::get('setting', function () { return view('admin.setting'); });

        Route::get('profile', function () { return view('admin.profile_setting'); });
       
        
        Route::resource('users', 'UserController');
        
        Route::get('tasks', 'TaskController@index');

        Route::get('task/{id}', 'TaskController@show');

        Route::get('task/edit/{id}', 'TaskController@edit');
        
        Route::post('task/update/{id}', 'TaskController@update');

        Route::get('task/delete/{id}', 'TaskController@destroy');
        
        Route::get('activate/{id}', 'UserController@activate');
        
        Route::get('deactivate/{id}', 'UserController@deactivate');

        Route::get('bids', 'BidController@bidlisting');

        Route::get('bids-of/{id}', 'BidController@bidsOf');

        Route::get('admintolawyer', 'PaymentController@pay_to_lawyer_list');
        
        Route::get('clienttoadmin', 'PaymentController@pay_to_admin_list');

        Route::get('pending-certificates','UserController@pendingCertificate');

        Route::get('pending-tasks','TaskController@pendingTasks');

        Route::resource('announcements','AnnouncementController');

        Route::get('logout',function(){Auth::logout(); return redirect('/');});
 
        Route::get('logout', 'Controller@adminLogout');

    });


    Route::group(['middleware' => 'lawyer'], function () {

        Route::get('add-certificate', 'CertificateController@create');

        Route::post('add-certificate', 'CertificateController@store');

        Route::get('portfolio', 'UserController@portfolio');

        Route::post('portfolio_save', 'UserController@portfolio_save');

        Route::post('resume_save', 'UserController@resume_save');

        Route::post('delete_portfolio', 'UserController@delete_portfolio');

        Route::get('case/{slug}', 'TaskController@get_taskby_slug');

        Route::get('cases', 'TaskController@browsecase');

        Route::get('make-offer/{slug}', 'BidController@makeOffer');

        Route::post('make-offer', 'BidController@storeOffer');
    
    });
});