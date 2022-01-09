<?php

namespace App\Observers;

use App\Models\Api\Tours\Tour;
use Illuminate\Support\Facades\Storage;

class TourObserver
{
    /**
     * Handle the Tour "created" event.
     *
     * @param  \App\Models\Tour  $tour
     * @return void
     */
    public function created(Tour $tour)
    {
        //
    }

    /**
     * Handle the Tour "updated" event.
     *
     * @param  \App\Models\Tour  $tour
     * @return void
     */
    public function updated(Tour $tour)
    {
        // if($tour->image){

        //     Storage::delete($tour->image);

        // }
    }

    // /**
    //  * Handle the Tour "updated" event.
    //  *
    //  * @param  \App\Models\Tour  $tour
    //  * @return void
    //  */
    // public function updating(Tour $tour)
    // {
    //     if($tour->image){

    //         Storage::delete($tour->image);

    //     }
    // }

    /**
     * Handle the Tour "deleting" event.
     *
     * @param  \App\Models\Tour  $tour
     * @return void
     */
    public function deleting(Tour $tour)
    {
        if($tour->image){

            Storage::delete($tour->image);

        }
    }

    /**
     * Handle the Tour "deleted" event.
     *
     * @param  \App\Models\Tour  $tour
     * @return void
     */
    public function deleted(Tour $tour)
    {
        //
    }

    /**
     * Handle the Tour "restored" event.
     *
     * @param  \App\Models\Tour  $tour
     * @return void
     */
    public function restored(Tour $tour)
    {
        //
    }

    /**
     * Handle the Tour "force deleted" event.
     *
     * @param  \App\Models\Tour  $tour
     * @return void
     */
    public function forceDeleted(Tour $tour)
    {
        //
    }
}
