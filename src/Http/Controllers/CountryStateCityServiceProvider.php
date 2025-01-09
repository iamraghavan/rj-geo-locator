<?php

namespace iamraghavan\CountryStateCity\Http\Controllers;

use Illuminate\Http\Request;
use iamraghavan\CountryStateCity\Models\Country;
use iamraghavan\CountryStateCity\Models\State;
use iamraghavan\CountryStateCity\Models\City;

class CountryStateCityController extends Controller
{
    public function index(Request $request)
    {
        $selectedCountryId = $request->input('country');
        $selectedStateId = $request->input('state');
        $selectedCityId = $request->input('city');

        $countriesDropdown = country_select($selectedCountryId);
        $statesDropdown = $selectedCountryId ? state_select($selectedCountryId, $selectedStateId) : '';
        $citiesDropdown = $selectedStateId ? city_select($selectedStateId, $selectedCityId) : '';

        return view('your-view-file', compact('countriesDropdown', 'statesDropdown', 'citiesDropdown'));
    }
}
