<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class RealtorListingController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }

    public function index(Request $request)
    {
        $filters = [
            'deleted' => $request->boolean('deleted'),
            ...$request->only(['by', 'order'])
        ];

        return inertia('Realtor/Index', [
            'filters' => $filters,
            'listings' => $request->user()->listings()->filter($filters)->paginate(10)->withQueryString(),
        ]);
    }

    public function destroy(Listing $listing)
    {
        $listing->deleteOrFail();

        return redirect()->back()->with('success', 'Listing was deleted.');
    }
}
