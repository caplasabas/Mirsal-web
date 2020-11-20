<?php

namespace App\Listeners;

use App\Events\RatingCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Model\Rating;
use App\User;

class RatingCreatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RatingCreated  $event
     * @return void
     */
    public function handle(RatingCreated $event)
    {
        $rated_user_id =  $event->rating->rated_user_id;
        $summaryRating = 0;

        $ratings = Rating::where("rated_user_id", $rated_user_id);
        if(!$ratings->get()->isEmpty()){
            $arr_val = $ratings->pluck('star_rating')->all();
            $count = sizeof($arr_val);
            $sum = array_sum($arr_val);
            $summaryRating = $sum / $count;
        }

        $user = User::find($rated_user_id);
        $user->summary_rating = $summaryRating;
        $user->save();
    }
}
