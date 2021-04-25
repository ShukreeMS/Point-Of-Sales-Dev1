<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Field: attribute must be accepted.',
    'active_url' => 'Field: attribute is not a valid URL.',
    'after' => 'Field: attribute must be after: date.',
    'after_or_equal' => 'Field: attribute must be after or equal to date: date.',
    'alpha' => 'Fill: attribute can only contain letters.',
    'alpha_dash' => 'Fill in: attributes can only contain letters, numbers, and dashes.',
    'alpha_num' => 'Fill: attribute can only contain letters and numbers.',
    'array' => 'Field: attribute must be an array.',
    'before' => 'Field: attribute must be a date prior to the date: date.',
    'before_or_equal' => 'Field: attribute must be a date before or equal to date: date.',
    'between' => [
        'numeric' => 'Field: attribute must be between: min and: max.',
        'file' => 'The field: attribute must be between: min and: max kilobytes.',
        'string' => 'The field: attribute must be between: min and: max characters.',
        'array' => 'The field: attribute must exist between: min and: max item.',
    ],
    'boolean' => 'Field: attribute field must be true or false.',
    'confirmed' => 'Field: confirmation attribute does not match.',
    'date' => 'Field: attribute is not a valid date.',
    'date_equals' => 'Field: attribute must be the same as date: date.',
    'date_format' => 'Field: attribute does not match format: format.',
    'different' => 'Fields: attribute and: other must be different.',
    'digits' => 'Field: attribute must be a number: digits.',
    'digits_between' => 'Field: attribute must be between number: min and number: max.',
    'dimensions' => 'Field: attribute has an invalid image dimension.',
    'distinct' => 'Field: attribute field has duplicate values.',
    'email' => 'Field: attribute must be a valid e-mail address.',
    'ends_with' => 'Field: attribute must end with one of the following:: values',
    'exists' => 'The field: the selected attribute is invalid.',
    'file' => 'Field: attribute must be a file.',
    'filled' => 'Field: attribute field must have a value.',
    'gt' => [
        'numeric' => 'Field: attribute must be greater than: value.',
        'file' => 'Field: attribute must be greater than: value kilobytes.',
        'string' => 'Field: attribute must be greater than: character value.',
        'array' => 'Field: attribute must have more than: value item.',
    ],
    'gte' => [
        'numeric' => 'Field: attribute must be greater than or equal to: value.',
        'file' => 'Field: attribute must be greater than or equal to: value kilobytes.',
        'string' => 'Field: attribute must be greater than or equal to: character value.',
        'array' => 'Field: attribute must have: item value or more.',
    ],
    'image' => 'Field: attribute must be an image.',
    'in' => 'Field: the selected attribute is invalid.',
    'in_array' => 'Field: attribute field does not exist in: other.',
    'integer' => 'Field: attribute must be an integer.',
    'ip' => 'Field: attribute must be valid with IP address.',
    'ipv4' => 'Field: attribute must be valid with IPv4 address.',
    'ipv6' => 'Field: attribute must be valid with IPv6 address.',
    'json' => 'Field: attribute must be valid with JSON string.',
    'lt' => [
        'numeric' => 'Field: attribute must be less than: value.',
        'file' => 'Field: attribute must be less than: value kilobytes.',
        'string' => 'Field: attribute must be less than: character value.',
        'array' => 'Field: attribute must be less than: value item.',
    ],
    'lte' => [
        'numeric' => 'Field: attribute must be less than or equal to: value.',
        'file' => 'Field: attribute must be less than or equal to: value kilobytes.',
        'string' => 'Field: attribute must be less than or equal to: character value.',
        'array' => 'Field: attribute should not be more than: value item.',
    ],
    'max' => [
        'numeric' => 'Field: attribute should not be greater than: max.',
        'file' => 'Field: attribute should be greater than: max kilobytes.',
        'string' => 'Field: attribute should be greater than: max character.',
        'array' => 'Field: attribute should have more than: max item.',
    ],
    'mimes' => 'Field: attribute must be a file of type:: values.',
    'mimetypes' => 'Field: attribute must be a file of type:: values.',
    'min' => [
        'numeric' => 'Field: attribute must be at least: min.',
        'file' => 'Field: attribute must be at least: min kilobytes.',
        'string' => 'Field: attribute must be at least: min character.',
        'array' => 'Field: minimum attribute must be: min item.',
    ],
    'not_in' => 'Field: the selected attribute is invalid.',
    'not_regex' => 'Field: invalid format attribute.',
    'numeric' => 'Field: attribute is a number.',
    'password' => 'Incorrect password field.',
    'present' => 'Field: attribute field must exist.',
    'regex' => 'Field: invalid format attribute.',
    'required' => 'Input for: attribute field is required.',
    'required_if' => 'Field: attribute field is required if: other is: value.',
    'required_unless' => 'Field: attribute field is required unless: other is in: values.',
    'required_with' => 'Field: attribute field is required if there are: values.',
    'required_with_all' => 'Field: attribute field is required if there are: values.',
    'required_without' => 'Field: attribute field is required if there is no: values.',
    'required_without_all' => 'Field: attribute field is required if there are no: existing values.',
    'same' => 'Fields: attribute and: other must match.',
    'size' => [
        'numeric' => 'Field: attribute must have size: size.',
        'file' => 'Field: attribute must be size: kilobytes size.',
        'string' => 'Field: attribute must have size: character size.',
        'array' => 'Field: attribute must contain: item size.',
    ],
    'starts_with' => 'Field: attribute must start with one of the following:: values',
    'string' => 'Field: attribute must be a string.',
    'timezone' => 'Field: attribute must be a valid timezone.',
    'unique' => 'Field: attribute already exists.',
    'uploaded' => 'Field: attribute failed to upload.',
    'url' => 'Field: invalid format attribute.',
    'uuid' => 'Field: attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
