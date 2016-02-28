<?php

namespace Askedio\Laravel5RBAC\Http\Controllers;

use App;
use App\User;
use Illuminate\Routing\Controller as Controller;
use Spatie\Permission\Models\Role;

class InstallController extends Controller
{
    public function index()
    {
        if (!User::count()) {
            $role = Role::create(['name' => 'admin']);

            $user = User::create([
            'name'     => 'admin',
            'email'    => 'admin@test.com',
            'password' => bcrypt('password'),
        ]);

            $user->assignRole('admin');

            return 'Installed';
        } else {
            App::abort(404, 'Already Installed');
        }
    }
}
