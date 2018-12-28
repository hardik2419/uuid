<?php
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Company;
use Illuminate\Database\Eloquent\Model;


class CompanyTableSeeder extends Seeder
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
      Company::truncate();
      $user = User::where('email','test@gmail.com')->first();
      $comapny = factory(Company::class)->make();
      $comapny->user_id = $user->id;
      $comapny->save();

      DB::statement('SET FOREIGN_KEY_CHECKS=1');
   }
}