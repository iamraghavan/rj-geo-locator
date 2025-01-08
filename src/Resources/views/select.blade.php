<select name="{{ config('countrystatecity.select.name_prefix') . $type }}" 
        id="{{ config('countrystatecity.select.id_prefix') . $type }}" 
        class="{{ config('countrystatecity.select.class') }}">
    <option value="">Select {{ ucfirst($type) }}</option>
    @foreach ($options as $option)
        <option value="{{ $option->id }}">{{ $option->name }}</option>
    @endforeach
</select>
