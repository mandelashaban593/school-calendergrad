## Build a Basic CRUD App with Laravel 8 and React.js

#### Install Packages

```
composer install
```

#### Copy .env file

```
cp .env.example .env
```

#### Set Database Detail

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

#### Start Laravel Project

```
php artisan serve

```

# Connect with Us

-   [Site](https://techvblogs.com/?ref=githubrepo)
-   [Twitter](https://twitter.com/techvblogs)
-   [Facebook](https://facebook.com/techvblogs)
php artisan make:migration create_attendance_table
php artisan make:seeder LessonsTableSeeder  - create seeder class
php artisan db:seed --class=LessonsTableSeeder - execute to populate the db table called lessons

php artisan make:factory UserFactory --model=User  - Create User factory
php artisan make:seeder UsersTableSeeder  - create seeder class
php artisan db:seed --class=UsersTableSeeder - execute to populate the db table called users

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Midterm, Final, etc.
            $table->date('exam_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exams');
    }
}


Create the controller using e.g php artisan make:controller UserController

 php artisan make:controller ExamScoreController
Make sure you create requests for every controller that you have created where you will use Forms as 
follows;
php artisan make:request ClassRequest
php artisan make:request RegisterRequest
php artisan make:request LoginRequest
php artisan make:request LessonRequest
php artisan make:request SubjectRequest
php artisan make:request UserRequest

php artisan make:request ExamScoreRequest

php artisan make:request ClassRequest


NOTE(PASSPORT -CHATGPT):how to install and configure password steps in laravel

command for listing all api route is php artisan route:list --path=path


 'name',
        'email',
        'password',
Share all source codes of nexjs materialui src/components/UserData.js , pages/userdata.js , laravel
 Http/Controllers/Auth/UserDataController.php codes, and  php artisan make:migration create_userdatas_table.php source codes and Models/UserData.php , api.php codes Like below . Make sure the UserData model should  be able to maintain users session after login too.
 import React, { useState } from 'react';
import { TextField, Button, Container, Typography, Box, Link } from '@mui/material';
import { useRouter } from 'next/router';
import authService from '../services/authService';

const UserDataForm = () => {
    const [formData, setFormData] = useState({
        email: '',
        password: ''
    });
    const router = useRouter();

    const handleChange = e => {
        setFormData({ ...formData, [e.target.name]: e.target.value });
    };

    const handleSubmit = async e => {
        e.preventDefault();
        try {
            await authService.class(formData);
            alert('Class saved successful');
            router.push('/dashboard'); // Redirect to dashboard page after successful login
        } catch (error) {
            alert('Class saving failed');
            console.error(error);
        }
    };

    return (
        <Container maxWidth="sm">
            <Box sx={{ marginTop: 4, textAlign: 'center' }}>
                <Typography variant="h4" component="h1" gutterBottom>
                   Class
                </Typography>
                <form onSubmit={handleSubmit}>
                    <TextField
                        fullWidth
                        margin="normal"
                        type="username"
                        label="username"
                        name="name"
                        value={formData.username}
                        onChange={handleChange}
                        required
                    />
                    <TextField
                        fullWidth
                        margin="normal"
                        type="first_name"
                        label="first_name"
                        name="first_name"
                        value={formData.first_name}
                        onChange={handleChange}
                        required
                    />
                    <TextField
                        fullWidth
                        margin="normal"
                        type="last_name"
                        label="Class"
                        name="last_name"
                        value={formData.last_name}
                        onChange={handleChange}
                        required
                    />
                    <TextField
                        fullWidth
                        margin="normal"
                        type="date_of_birth"
                        label="date_of_birth"
                        name="date_of_birth"
                        value={formData.date_of_birth}
                        onChange={handleChange}
                        required
                    />
                        <TextField
                        fullWidth
                        margin="normal"
                        type="address"
                        label="address"
                        name="address"
                        value={formData.address}
                        onChange={handleChange}
                        required
                    />
                        <TextField
                        fullWidth
                        margin="normal"
                        type="phone_number"
                        label="phone_number"
                        name="phone_number"
                        value={formData.phone_number}
                        onChange={handleChange}
                        required
                    />
                        <TextField
                        fullWidth
                        margin="normal"
                        type="joining_dath"
                        label="joining_dat"
                        name="joining_dat"
                        value={formData.joining_date}
                        onChange={handleChange}
                        required
                    />
                        <TextField
                        fullWidth
                        margin="normal"
                        type="department_id"
                        label="department_id"
                        name="name"
                        value={formData.department_id}
                        onChange={handleChange}
                        required
                    />
                        <TextField
                        fullWidth
                        margin="normal"
                        type="email"
                        label="email"
                        name="name"
                        value={formData.email}
                        onChange={handleChange}
                        required
                    />
                        
                        <TextField
                        fullWidth
                        margin="normal"
                        type="password"
                        label="password"
                        name="password"
                        value={formData.password}
                        onChange={handleChange}
                        required
                    />
                    <Button type="submit" variant="contained" color="primary" size="large">
                        Save
                    </Button>
                </form>
             
            </Box>
        </Container>
    );
};

export default UserDataForm;

lesson.js
// pages/login.js

import UserDataForm from '../Components/UserDataForm';

const UserDataPage = () => {
    return <UserDataForm />;
};

export default UserDataPage;

UserDataController.php
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Add this line for the Auth facade

<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\Class;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserData
Controller extends Controller
{
    public function userdata(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'joining_date' => 'required|string|max:255',
            'department_id' => 'required|string|max:255',

        ]);

        // Create a new user record
        $class = Class::create([
            'username' => $validatedData['username'],
             'password' => $validatedData['password'],
              'email' => $validatedData['email'],
               'role' => $validatedData['role'],
                'first_name' => $validatedData['first_name'],
                 'last_name' => $validatedData['last_name'],
                  'date_of_birth' => $validatedData['date_of_birth'],
                   'address' => $validatedData['address'],
                    'phone_number' => $validatedData['phone_number'],
                     'joining_date' => $validatedData['joining_date'],
                      'department_id' => $validatedData['department_id'],
 
        ]);

        // Return a success response
        return response()->json(['message' => 'User data successfully'], 201)
            ->header('Referrer-Policy', 'no-referrer');
    }
    }
}

UserData.php
<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'username', 'password', 'email', 'role', 'first_name', 'last_name', 'date_of_birth', 'address', 'phone_number', 'token'
    ];

    protected $hidden = [
        'password', 'remember_token', 'token'
    ];

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Get the custom claims that will be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}




NOTE: modify the provided React/Next.js code to work with a simplified Exam model with only a name, exam_date field, and to integrate search functionality in the Material-UI table 
        &&
Modify the following source code to have only one column called name for Subject model . Share full source code solution , Class Name should be SubjectController