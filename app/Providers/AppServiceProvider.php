<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Auth;
use View;
use App\Certificate;
use App\Task;
use App\Notification;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $user = Auth::user();
        $globalArray=[];
        $globalArray['pCertificates'] = Certificate::where('approved',-1)->groupBy('user_id')->get();
       
        $globalArray['pTasks'] = Notification::where('type_of_notification','new-task')->where('recipient_id','0')->where('is_read','0')->get();

        $globalArray['pBids'] = Notification::where('type_of_notification','bid')->where('recipient_id',$user['id'])->where('is_read','0')->get();
        
        view::share('globalData',$globalArray);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
