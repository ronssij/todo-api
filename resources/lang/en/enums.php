<?php

use App\Enums\ErrorCodes;

return [

    ErrorCodes::class => [
        ErrorCodes::UNVERIFIED_EMAIL => 'Email is not verified.',
        ErrorCodes::UNVERIFIED_PHONE_NUMBER => 'Phone number is not verified.',
        ErrorCodes::UNVERIFIED_ACCOUNT => 'User account is not verified.',
        ErrorCodes::INVALID_CREDENTIALS => 'The password you entered is incorrect. Please try again.',
        ErrorCodes::INVALID_USERNAME => 'We couldn\'t find any records that matches your username.',
        ErrorCodes::INVALID_PASSWORD => 'Your password did not match on our records.',
        ErrorCodes::USERNAME_NOT_FOUND => 'We couldn\'t find any records that matches your username.',
        ErrorCodes::EMAIL_NOT_FOUND => 'We couldn\'t find any records that matches your email.',
        ErrorCodes::MAINTENANCE_MODE => "The MWU App is undergoing scheduled maintenance. \n\nWe are making exciting updates to our nutrition experience, and can’t wait to share these with you! \n\nIn the meantime, you can keep using all other features of the App as normal."
    ],
];
