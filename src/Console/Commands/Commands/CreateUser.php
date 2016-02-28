<?php

namespace Askedio\Laravel5RBAC\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Spatie\Permission\Models\Role;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a user with role.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {



       $name          = $this->ask('Name');

        $check = true;
        while($check == true){
          $email = $this->ask('Email');
          $check = User::where('email', '=', $email)->exists();
          if($check) $this->error('Email already exists, try again.');
        }

       $password      = $this->secret('Password');
       $admin_role    = $this->ask('Role [admin]') ? : 'admin';

      if ($this->confirm('Do you wish to setup this user? [y|N]')) {


            $_user = User::create([
              'name'     => $name,
              'email'    => $email,
              'password' => bcrypt($password)
            ]);

            if(!Role::where('name', '=', $admin_role)->exists()) $_role = Role::create(['name' => $admin_role]);
            $_user->assignRole($admin_role);

      }

    }
}
