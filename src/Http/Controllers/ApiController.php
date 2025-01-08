<?php

namespace iamraghavan\CountryStateCity\Http\Controllers;

use Illuminate\Http\Request;
use iamraghavan\CountryStateCity\Models\Country;
use iamraghavan\CountryStateCity\Models\State;
use iamraghavan\CountryStateCity\Models\City;
use Illuminate\Routing\Controller;
// Ragahvan Jeeva
class ApiController extends Controller
{
    // Fetch all countries without pagination
    public function countries(Request $request)
    {
        $countries = Country::all(); // Fetch all countries without pagination

        return response()->json($countries);
    }

    // Fetch states based on selected country without pagination
    public function states(Request $request, $country_id)
    {
        $states = State::where('country_id', $country_id)->get(); // Fetch all states of the country without pagination

        return response()->json($states);
    }

    // Fetch cities based on selected state without pagination
    public function cities(Request $request, $state_id)
    {
        $cities = City::where('state_id', $state_id)->get(); // Fetch all cities of the state without pagination

        return response()->json($cities);
    }
}
