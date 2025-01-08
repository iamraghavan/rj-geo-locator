<?php

namespace iamraghavan\CountryStateCity\Http\Controllers;

use Illuminate\Http\Request;
use iamraghavan\CountryStateCity\Models\Country;
use iamraghavan\CountryStateCity\Models\State;
use iamraghavan\CountryStateCity\Models\City;
use Illuminate\Routing\Controller;  // Add this line to import the Controller class

class ApiController extends Controller
{
    public function countries()
    {
        return Country::paginate(config('countrystatecity.pagination'));
    }

    public function states($country_id)
    {
        return State::where('country_id', $country_id)
            ->paginate(config('countrystatecity.pagination'));
    }

    public function cities($state_id)
    {
        return City::where('state_id', $state_id)
            ->paginate(config('countrystatecity.pagination'));
    }
}
