<?php return [
    'type' => 'function',
    'function' => [
        'name' => 'predict_age_by_name',
        'description' => "Guess person age from their name.",
        'parameters' => [
            'type' => 'object',
            'properties' => [
                'name' => ['type' => 'string', 'description' => 'Name of person we wish to guess the age for'],
            ],
            'required' => ['name'],
        ]
    ]
];
