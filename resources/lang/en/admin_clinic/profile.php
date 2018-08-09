<?php

return [
    'show' => [
        'title' => 'Profile',
        'heading' => 'Clinic detail',
        'link_to_edit' => [
            'clinic' => 'Clinic',
            'account' => 'Admin',
        ]
    ],
    'edit' => [
        'clinic' => [
            'heading' => 'Update a clinic',
            'confirm' => 'Are you sure ?'
        ],
        'admin' => [
            'heading' => 'Update admin information',
            'section' => [
                'password' => 'Change Password',
                'adminname' => 'Change Admin Name',
            ],
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
            'confirm_password' => 'Confirm password',
            'name' => 'Name',
        ]

    ],
    'update' => [
        'success' => [
            'clinic' => 'The clinic information has been updated.',
            'admin' => [
                'password' => 'The admin information has been updated.',
                'name' => 'The admin name has been updated',
            ]
        ],
        'error' => [
            'password' => 'The current password isn\'t correct',
        ]
    ],
];
