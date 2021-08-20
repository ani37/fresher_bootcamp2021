`Mobile Users Inventory`

* Able to insert users, email and its mobile number.

* Search by username

* Search by user email

* Search by mobile number

* List all users and its mobile number

* Delete by mobile number

* Delete by user name / user email


~~~~+--------+----------+---------------------------+------+------------------------------------------------------------+------------------------------------------+
| Domain | Method   | URI                       | Name | Action                                                     | Middleware                               |
+--------+----------+---------------------------+------+------------------------------------------------------------+------------------------------------------+
|        | GET|HEAD | /                         |      | Closure                                                    | web                                      |
|        | GET|HEAD | api/user                  |      | Closure                                                    | api                                      |
|        |          |                           |      |                                                            | App\Http\Middleware\Authenticate:sanctum |
|        | GET|HEAD | sanctum/csrf-cookie       |      | Laravel\Sanctum\Http\Controllers\CsrfCookieController@show | web                                      |
|        | POST     | users                     |      | App\Http\Controllers\UserController@addUser                | web                                      |
|        | GET|HEAD | users                     |      | App\Http\Controllers\UserController@getAllUsers            | web                                      |
|        | GET|HEAD | users/email/{email}       |      | App\Http\Controllers\UserController@getUsersByEmail        | web                                      |
|        | DELETE   | users/email/{email}       |      | App\Http\Controllers\UserController@removeUsersByEmail     | web                                      |
|        | GET|HEAD | users/phone/{phone}       |      | App\Http\Controllers\UserController@getUsersByPhone        | web                                      |
|        | DELETE   | users/phone/{phone}       |      | App\Http\Controllers\UserController@removeUsersByPhone     | web                                      |
|        | GET|HEAD | users/username/{username} |      | App\Http\Controllers\UserController@getUsersByUserName     | web                                      |
|        | DELETE   | users/username/{username} |      | App\Http\Controllers\UserController@removeUsersByUsername  | web                                      |
+--------+----------+---------------------------+------+------------------------------------------------------------+------------------------------------------+~~~~
