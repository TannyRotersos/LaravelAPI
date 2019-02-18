<?php

namespace App\Providers;

use Laravel\Passport\Passport;
use App\Models\Passport\Client;
use App\Models\Passport\AuthCode;
use App\Models\Passport\TokenModel;
use App\Models\Passport\PersonalAccessClient;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
       
        $this->registerPolicies();

        Passport::routes();
          Passport::loadKeysFrom('/secret-keys/oauth');
        //

          Passport::useClientModel(Client::class);
    Passport::useTokenModel(TokenModel::class);
    Passport::useAuthCodeModel(AuthCode::class);
    Passport::usePersonalAccessClientModel(PersonalAccessClient::class);
    }
}
