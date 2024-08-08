<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                           => 'ID',
            'id_helper'                    => ' ',
            'name'                         => 'Name',
            'name_helper'                  => ' ',
            'email'                        => 'Email',
            'email_helper'                 => ' ',
            'email_verified_at'            => 'Email verified at',
            'email_verified_at_helper'     => ' ',
            'password'                     => 'Password',
            'password_helper'              => ' ',
            'roles'                        => 'Roles',
            'roles_helper'                 => ' ',
            'remember_token'               => 'Remember Token',
            'remember_token_helper'        => ' ',
            'created_at'                   => 'Created at',
            'created_at_helper'            => ' ',
            'updated_at'                   => 'Updated at',
            'updated_at_helper'            => ' ',
            'deleted_at'                   => 'Deleted at',
            'deleted_at_helper'            => ' ',
            'street_address'               => 'Street Address',
            'street_address_helper'        => ' ',
            'city'                         => 'City',
            'city_helper'                  => ' ',
            'state'                        => 'State',
            'state_helper'                 => ' ',
            'zip_code'                     => 'Zip Code',
            'zip_code_helper'              => ' ',
            'verified'                     => 'Verified',
            'verified_helper'              => ' ',
            'verified_at'                  => 'Verified at',
            'verified_at_helper'           => ' ',
            'verification_token'           => 'Verification token',
            'verification_token_helper'    => ' ',
            'two_factor'                   => 'Two-Factor Auth',
            'two_factor_helper'            => ' ',
            'two_factor_code'              => 'Two-factor code',
            'two_factor_code_helper'       => ' ',
            'two_factor_expires_at'        => 'Two-factor expires at',
            'two_factor_expires_at_helper' => ' ',
        ],
    ],
    'pet' => [
        'title'          => 'Pets',
        'title_singular' => 'Pet',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'photos'                 => 'Photos',
            'photos_helper'          => ' ',
            'name'                   => 'Name',
            'name_helper'            => ' ',
            'breed'                  => 'Breed',
            'breed_helper'           => ' ',
            'size'                   => 'What size are your pet (lbs)?',
            'size_helper'            => ' ',
            'age'                    => 'How old is your pet?',
            'age_helper'             => ' ',
            'gets_along_with'        => 'Gets Along With',
            'gets_along_with_helper' => ' ',
            'is_immunized'           => 'Is Immunized?',
            'is_immunized_helper'    => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'created_by'             => 'Created By',
            'created_by_helper'      => ' ',
        ],
    ],
    'requestCare' => [
        'title'          => 'Request Care',
        'title_singular' => 'Request Care',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'zip_code'           => 'Zip Code',
            'zip_code_helper'    => ' ',
            'details'            => 'Details',
            'details_helper'     => ' ',
            'start_date'         => 'Start Date',
            'start_date_helper'  => ' ',
            'start_time'         => 'Start Time',
            'start_time_helper'  => ' ',
            'end_date'           => 'End Date',
            'end_date_helper'    => ' ',
            'end_time'           => 'End Time',
            'end_time_helper'    => ' ',
            'booked_by'          => 'Booked By',
            'booked_by_helper'   => ' ',
            'credits'            => 'Credits',
            'credits_helper'     => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'closed'             => 'Closed',
            'closed_helper'      => ' ',
            'user_rating'        => 'User Rating',
            'user_rating_helper' => ' ',
            'user_review'        => 'User Review',
            'user_review_helper' => ' ',
            'pet'                => 'Pet',
            'pet_helper'         => ' ',
            'pet_rating'         => 'Pet Rating',
            'pet_rating_helper'  => ' ',
            'pet_review'         => 'Pet Review',
            'pet_review_helper'  => ' ',
            'created_by'         => 'Created By',
            'created_by_helper'  => ' ',
        ],
    ],
    'messageLog' => [
        'title'          => 'Message Log',
        'title_singular' => 'Message Log',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
            'message'           => 'Message',
            'message_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'credit' => [
        'title'          => 'Credits',
        'title_singular' => 'Credit',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'points'            => 'Points',
            'points_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'user'              => 'User',
            'user_helper'       => ' ',
        ],
    ],
    'payment' => [
        'title'          => 'Payments',
        'title_singular' => 'Payment',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'stripe_transaction'        => 'Stripe Transaction',
            'stripe_transaction_helper' => ' ',
            'amount'                    => 'Amount',
            'amount_helper'             => ' ',
            'package'                   => 'Package',
            'package_helper'            => ' ',
            'email'                     => 'Email',
            'email_helper'              => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
        ],
    ],
    'location' => [
        'title'          => 'Locations',
        'title_singular' => 'Location',
        'fields'         => [
            'id'                                  => 'ID',
            'id_helper'                           => ' ',
            'name'                                => 'Name',
            'name_helper'                         => ' ',
            'zip_code'                            => 'Zip Code',
            'zip_code_helper'                     => ' ',
            'official_usps_city_name'             => 'Official USPS City Name',
            'official_usps_city_name_helper'      => ' ',
            'official_usps_state_code'            => 'Official USPS State Code',
            'official_usps_state_code_helper'     => ' ',
            'official_state_name'                 => 'Official State Name',
            'official_state_name_helper'          => ' ',
            'primary_official_county_code'        => 'Primary Official County Code',
            'primary_official_county_code_helper' => ' ',
            'primary_official_county_name'        => 'Primary Official County Name',
            'primary_official_county_name_helper' => ' ',
            'official_county_code'                => 'Official County Code',
            'official_county_code_helper'         => ' ',
            'timezone'                            => 'Timezone',
            'timezone_helper'                     => ' ',
            'geo_point'                           => 'Geo Point',
            'geo_point_helper'                    => ' ',
            'created_at'                          => 'Created at',
            'created_at_helper'                   => ' ',
            'updated_at'                          => 'Updated at',
            'updated_at_helper'                   => ' ',
            'deleted_at'                          => 'Deleted at',
            'deleted_at_helper'                   => ' ',
        ],
    ],
    'appSetting' => [
        'title'          => 'App Settings',
        'title_singular' => 'App Setting',
    ],
    'userAlert' => [
        'title'          => 'User Alerts',
        'title_singular' => 'User Alert',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'alert_text'        => 'Alert Text',
            'alert_text_helper' => ' ',
            'alert_link'        => 'Alert Link',
            'alert_link_helper' => ' ',
            'user'              => 'Users',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
        ],
    ],

];
