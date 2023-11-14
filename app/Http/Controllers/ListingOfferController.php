<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Offer;
use App\Notifications\OfferMade;
use Illuminate\Http\Request;

class ListingOfferController extends Controller
{
    public function store(Listing $listing, Request $request)
    {
        $this->authorize('view', $listing);

        $data = $request->validate([
            'amount' => 'required|integer|min:1|max:999999999',
        ]);

        $offer = Offer::query()->make($data)->bidder()->associate($request->user());
        $listing->offers()->save($offer);

        $listing->owner->notify(new OfferMade($offer));

        return redirect()->back()->with('success', 'Offer was made.');
    }
}
