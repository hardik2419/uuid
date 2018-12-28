<?php
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Location;

class LocationTableSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      //$users = factory(App\Models\User::class, 10)->create();

      /*user with Location data*/
      DB::statement('SET FOREIGN_KEY_CHECKS=0');
      Location::truncate();
      $user = User::where('email','test@gmail.com')->first();
      $location = factory(Location::class)->make();
      $location->company_id = $user->company->id;
      $location->save();

      DB::statement('SET FOREIGN_KEY_CHECKS=1');
   }
}