<?php

namespace App\Providers;

use App\Billing\BankPaymentGateway;
use App\Billing\CreditPaymentGateway;
use App\Billing\PaymentGatewayContract;

use App\Channel;
use App\Http\View\Composers\ChannelsComposer;
use App\Mixins\StrMixins;
use App\PostcardSendingService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PaymentGatewayContract::class, function($app){
            if(request()->has('credit')){
                return new CreditPaymentGateway('EUR');
            }
            return new BankPaymentGateway('EUR');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // option one every single view
        // View::share('channels', Channel::orderBy('name')->get());

        // wildcard
//        View::composer(['post.*', 'channel.*'], function($view){
//           $view->with('channels', Channel::orderBy('name')->get());
//        });
        // third option take aways everything into partials
        View::composer('partials.channels.*', ChannelsComposer::class);

        $this->app->singleton('Postcard', function($app){
            return new PostcardSendingService('pl', 4,6);
        });
        Str::macro('partNumber', function($part){
            return 'AB-'.$part;
        });
        Str::mixin(new StrMixins());
    }
}
