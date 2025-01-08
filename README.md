# RJ Geo Locator

**Package Name**: rj-geo-locator  
**Version**: 1.0.0  
**Author**: Raghavan  
**License**: MIT  
**Packagist URL**: [https://packagist.org/packages/iamraghavan/rj-geo-locator](https://packagist.org/packages/iamraghavan/rj-geo-locator)

## Description

`rj-geo-locator` is a Laravel package that provides dynamic location-based select inputs for **Country**, **State**, and **City**. This package allows developers to populate the location dropdown fields dynamically in forms using data imported from SQL files. It also includes a RESTful API for fetching country, state, and city data with pagination.

This package is designed to simplify the process of integrating location-based data in Laravel applications, including support for multi-level cascading select inputs and an API interface for location data.

## Features

- **Dynamic Location Select Inputs**: Country, State, and City select fields that can be dynamically populated.
- **SQL Import**: Automatically imports country, state, and city data from SQL files into the database.
- **RESTful API**: Provides a paginated API for retrieving countries, states, and cities.
- **Customizable**: Customize class names, IDs, and form attributes for location selects.
- **Laravel Integration**: Easy to integrate and use in Laravel applications.

## Installation

To install the package, follow these steps:

1. **Install via Composer**:

   Run the following command in your Laravel project directory to install the package via Composer:
   ```bash
   composer require iamraghavan/rj-geo-locator
   ```

2. **Publish Configurations and Views**:

   Once the package is installed, publish the configuration and views using the following Artisan command:
   ```bash
   php artisan vendor:publish --tag=rjgeo
   ```

3. **Run the Installation Command**:

   To import the SQL data (for countries, states, and cities) into your database, run the package’s install command:
   ```bash
   php artisan rjgeo:install
   ```

   This will import the data from the `countries.sql`, `states.sql`, and `cities.sql` files into your MySQL database.

## Usage

### Using the Dynamic Select Inputs in Blade Templates

You can use the `country_select()`, `state_select()`, and `city_select()` functions to render dynamic select inputs in your Blade views.

Example:
```php
{!! country_select() !!}
```

This will render a select input for countries. Once a country is selected, the available states will be dynamically loaded, and similarly, selecting a state will load the corresponding cities.

### Example Blade Template

```html
<form action="/submit" method="POST">
    @csrf

    {{-- Country Select --}}
    {!! country_select() !!}

    {{-- State Select (Change dynamically based on the country) --}}
    <div id="state-container"></div>

    {{-- City Select (Change dynamically based on the state) --}}
    <div id="city-container"></div>
    
    <button type="submit">Submit</button>
</form>

<script>
    // Dynamically load states when a country is selected
    document.getElementById('country').addEventListener('change', function () {
        let countryId = this.value;
        axios.get(`/api/states/${countryId}`)
            .then(function (response) {
                // Populate states select dynamically
                document.getElementById('state-container').innerHTML = response.data.html;
            });
    });

    // Dynamically load cities when a state is selected
    document.getElementById('state').addEventListener('change', function () {
        let stateId = this.value;
        axios.get(`/api/cities/${stateId}`)
            .then(function (response) {
                // Populate cities select dynamically
                document.getElementById('city-container').innerHTML = response.data.html;
            });
    });
</script>
```

### Using REST API

The package also provides a RESTful API for fetching country, state, and city data.

#### Get Countries

To get a list of countries, make a GET request:

```
GET /api/countries
```

#### Get States by Country ID

To get states for a given country, make a GET request:

```
GET /api/states/{countryId}
```

#### Get Cities by State ID

To get cities for a given state, make a GET request:

```
GET /api/cities/{stateId}
```

All API responses are paginated.

## Configuration

The package comes with a default configuration file located at `config/rjgeo.php`. You can publish the configuration file using the following Artisan command:

```bash
php artisan vendor:publish --tag=rjgeo
```

### Configuration Options

- **`class_name`**: Customize the class name for the select input fields.
- **`id_name`**: Customize the id attribute for the select input fields.
- **`use_ajax`**: Enable or disable AJAX loading for location data.
- **`api_enabled`**: Enable or disable the REST API for location data.

## Example Configuration

```php
return [
    'class_name' => 'location-select',
    'id_name' => 'location',
    'use_ajax' => true,
    'api_enabled' => true,
];
```

## Contribution

Contributions to this package are welcome! If you want to contribute, please follow the steps below:

1. Fork the repository.
2. Create a new branch.
3. Make your changes and commit them.
4. Submit a pull request with a description of the changes and why they are needed.

## License

This package is open-source and available under the [MIT License](https://opensource.org/licenses/MIT).

## Credits

- **Author**: Raghavan
- **Package**: [iamraghavan/rj-geo-locator](https://packagist.org/packages/iamraghavan/rj-geo-locator)


---
