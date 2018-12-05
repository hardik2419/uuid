<?php
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      //$users = factory(App\Models\User::class, 10)->create();

      /*user with company data*/
      DB::statement('SET FOREIGN_KEY_CHECKS=0');
      User::truncate();
      $admin = factory(App\Models\User::class)->create();
      $admin->first_name = "Admin";
      $admin->last_name = "User";
      $admin->email = "admin@gmail.com";
      $admin->password = bcrypt("admin@123");
      $admin->save();
      $admin->roles()->sync(1);

      $admin = factory(App\Models\User::class)->create();
      $admin->first_name = "Test";
      $admin->last_name = "User";
      $admin->email = "test@gmail.com";
      $admin->password = bcrypt("test@123");
      $admin->save();
      $admin->roles()->sync(3);

      factory(App\Models\User::class, 10)->create()->each(function($u) {
          $u->roles()->sync(3);
      });
      DB::statement('SET FOREIGN_KEY_CHECKS=1');
   }
}