<?php

use iamraghavan\CountryStateCity\Models\Country;
use iamraghavan\CountryStateCity\Models\State;
use iamraghavan\CountryStateCity\Models\City;

if (!function_exists('country_select')) {
    function country_select()
    {
        $countries = Country::all();
        return view('vendor.countrystatecity.select', [
            'options' => $countries,
            'type' => 'country'
        ])->render();
    }
}

if (!function_exists('state_select')) {
    function state_select($countryId)
    {
        $states = State::where('country_id', $countryId)->get();
        return view('vendor.countrystatecity.select', [
            'options' => $states,
            'type' => 'state'
        ])->render();
    }
}

if (!function_exists('city_select')) {
    function city_select($stateId)
    {
        $cities = City::where('state_id', $stateId)->get();
        return view('vendor.countrystatecity.select', [
            'options' => $cities,
            'type' => 'city'
        ])->render();
    }
}
