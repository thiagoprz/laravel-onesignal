# Laravel One Signal Package

## Installation
Install with composer:

`composer require thiagoprz/laravel-onesignal`

### Publish configuration
`php artisan vendor:publish --provider=Thiagoprz\Onesignal\OnesignalServiceProvider`


### Roadmap
- Implement every method present on [One Signal API](https://documentation.onesignal.com/reference/create-notification).

| Method               | STATUS      | Tests |
|----------------------|-------------|------|
| Create Notification  | In Progress | No  |
| Cancel Notification  | Todo        | No  |
| View Apps            | Todo        | No  |
| View an App          | Done        | Yes |
| Create an App        | Todo        | No  |
| Update an App        | Todo        | No  |
| View Devices         | Todo        | No  |
| View Device          | Todo        | No  |
| Add a Device         | Todo        | No  |
| Edit Device          | Todo        | No  |
| View Notification    | Todo        | No  |
| View Notifications   | Todo        | No  |
| Notification History | Todo        | No  |
| Create Segments      | Todo        | No  |
| Delete Segments      | Todo        | No  |
| View Outcomes        | Todo        | No  |
| Delete Player Record | Todo        | No  |



## Package Testing
### PHPUnit
Replace your app id, user key and app key with the right values:

`ONESIGNAL_APP_ID={APP_ID} ONESIGNAL_API_APP_KEY={YOUR_APP_KEY} ONESIGNAL_API_USER_KEY={YOUR_USER_ID} php artisan test`

For more information on keys and Ids please see [https://documentation.onesignal.com/docs/accounts-and-keys](https://documentation.onesignal.com/docs/accounts-and-keys)

## License
This package is licensed under the
[MIT](License.txt) license.