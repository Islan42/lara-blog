<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Model;
use MailchimpMarketing\ApiClient;
use App\Services\Newsletter;
use App\Services\MailchimpNewsletter;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
      app()->bind(Newsletter::class, function(){
        $client = new ApiClient();
        $client->setConfig([
          'apiKey' => config('services.mailchimp.key'),
          'server' => config('services.mailchimp.prefix'),
        ]);        
        return new MailchimpNewsletter($client);
      });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
      Model::unguard();
      
      Gate::define('admin', function(User $user){
        return $user->username === 'teste';
      });
    }
}
