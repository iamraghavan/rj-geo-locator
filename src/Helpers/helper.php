<?php

use iamraghavan\CountryStateCity\Models\Country;
use iamraghavan\CountryStateCity\Models\State;
use iamraghavan\CountryStateCity\Models\City;

if (!function_exists('country_select')) {
    function country_select($selectedCountryId = null)
    {
        $countries = Country::all();
        return view('vendor.countrystatecity.Resources.views.select', [
            'options' => $countries,
            'type' => 'country',
            'selectedId' => $selectedCountryId
        ])->render();
    }
}

if (!function_exists('state_select')) {
    function state_select($countryId, $selectedStateId = null)
    {
        $states = State::where('country_id', $countryId)->get();
        return view('vendor.countrystatecity.Resources.views.select', [
            'options' => $states,
            'type' => 'state',
            'selectedId' => $selectedStateId
        ])->render();
    }
}

if (!function_exists('city_select')) {
    function city_select($stateId, $selectedCityId = null)
    {
        $cities = City::where('state_id', $stateId)->get();
        return view('vendor.countrystatecity.Resources.views.select', [
            'options' => $cities,
            'type' => 'city',
            'selectedId' => $selectedCityId
        ])->render();
    }
}
