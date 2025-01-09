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
        $countries = Country::all();
        return response()->json($countries);
    }

    public function states(Request $request, $country_id)
    {
        $states = State::where('country_id', $country_id)->get();
        return response()->json($states);
    }

    public function cities(Request $request, $state_id)
    {
        $cities = City::where('state_id', $state_id)->get();
        return response()->json($cities);
    }
}
