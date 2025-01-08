<?php

namespace iamraghavan\CountryStateCity\Http\Controllers;

use Illuminate\Http\Request;
use iamraghavan\CountryStateCity\Models\Country;
use iamraghavan\CountryStateCity\Models\State;
use iamraghavan\CountryStateCity\Models\City;
use Illuminate\Routing\Controller;

class ApiController extends Controller
{
    public function countries(Request $request)
    {
        // Check if pagination parameter is set, and use paginate if true
        if ($request->has('paginate') && $request->paginate == 'false') {
            return Country::all();  // Return all countries if no pagination is needed
        }

        // Default: Paginate countries
        return Country::paginate(config('countrystatecity.pagination'));
    }

    public function states(Request $request, $country_id)
    {
        // Check if pagination parameter is set, and use paginate if true
        if ($request->has('paginate') && $request->paginate == 'false') {
            return State::where('country_id', $country_id)->get();  // Return all states without pagination
        }

        // Default: Paginate states
        return State::where('country_id', $country_id)
            ->paginate(config('countrystatecity.pagination'));
    }

    public function cities(Request $request, $state_id)
    {
        // Check if pagination parameter is set, and use paginate if true
        if ($request->has('paginate') && $request->paginate == 'false') {
            return City::where('state_id', $state_id)->get();  // Return all cities without pagination
        }

        // Default: Paginate cities
        return City::where('state_id', $state_id)
            ->paginate(config('countrystatecity.pagination'));
    }
}
