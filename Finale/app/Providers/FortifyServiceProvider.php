<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

       Fortify::registerView(function() {
        return view(view:'auth.login');
         });

         Fortify::registerView(function() {
            return view(view:'auth.register');
             });
            
             Fortify::resetPasswordView (function ($request) {
                return view('auth.reset-password', ['request' => $request]);
             });
             Fortify::verifyEmailView (function () {
                return view('auth.forgot-password');
             });
            
             Fortify::verifyEmailView (function () {
                return view('auth.verify-email');
             });
             Fortify::twoFactorChallengeView(function() {
                return view('auth.two-factor-challenge');
            });
    }
}
