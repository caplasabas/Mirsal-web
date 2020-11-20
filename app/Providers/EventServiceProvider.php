<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Events\OnRegister' => [
            'App\Listeners\SendOTPVerificationSMS',
        ],
        'App\Events\WhenUserDoSomething' => [
            'App\Listeners\SendExpoNotification',
        ],
        'App\Events\VetOfferSaving' => [
            'App\Listeners\VetOfferSavingListener',
        ],
        'App\Events\VetOfferCreated' => [
            'App\Listeners\VetOfferCreatedListener',
        ],
        'App\Events\DriverOfferSaving' => [
            'App\Listeners\DriverOfferSavingListener',
        ],
        'App\Events\DriverOfferCreated' => [
            'App\Listeners\DriverOfferCreatedListener',
        ],
        'App\Events\ClientOfferCreated' => [
            'App\Listeners\ClientOfferCreatedListener',
        ],
        'App\Events\ClientOfferSaving' => [
            'App\Listeners\ClientOfferSavingListener',
        ],
        'App\Events\MessageCreated' => [
            'App\Listeners\MessageCreatedListener',
        ],

        'App\Events\VetRequestSaving' => [
            'App\Listeners\VetRequestSavingListener',
        ],
        'App\Events\DriverRequestSaving' => [
            'App\Listeners\DriverRequestSavingListener',
        ],

        'App\Events\VeterinarianAccepted' => [
            'App\Listeners\VeterinarianAcceptedListener',
        ],
        
        'App\Events\RatingCreated' => [
            'App\Listeners\RatingCreatedListener',
        ],
        
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
