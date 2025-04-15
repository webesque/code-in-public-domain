<?php return [
    'type' => 'function',
    'function' => [
        'name' => 'is_millennial',
        'description' => "Deducts based on age if someone is a millennial.",
        'parameters' => [
            'type' => 'object',
            'properties' => [
                'age' => ['type' => 'number', 'description' => 'Age'],
            ],
            'required' => ['age'],
        ]
    ]
];
