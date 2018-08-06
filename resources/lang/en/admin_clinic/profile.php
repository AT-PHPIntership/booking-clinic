<?php

return [
    'show' => [
        'title' => 'Profile',
        'heading' => 'Clinic detail',
    ],
    'edit' => [
        'clinic' => [
            'heading' => 'Update a clinic',
            'confirm' => 'Are you sure ?'
        ],
        'admin' => [
            'heading' => 'Update admin information',
        ]
    ],
    'fields' => [
        'clinic' => [
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'address' => 'Address',
            'description' => 'Description',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'created_at' => 'Created at',
            'updated_at' => 'Updated at',
            'clinic_type' => 'Clinic Type',
            'image' => 'Image',
            'slug' => 'Slug',
        ],
        'admin' => [
            'current_password' => 'Current password',
            'new_password' => 'New password',
            'confirm_password' => 'Confirm password'
        ]

    ],
    'update' => [
        'success' => [
            'clinic' => 'The clinic information has been updated.',
            'admin' => 'The admin information has been updated.',
        ]
    ],
];
