<?php
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Accolade;
use Illuminate\Database\Eloquent\Model;

class AccoladeTableSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      //$users = factory(App\Models\User::class, 10)->create();

      /*user with Accolade data*/
      DB::statement('SET FOREIGN_KEY_CHECKS=0');
      Accolade::truncate();
      $user = User::where('email','test@gmail.com')->first();
      $accolade = factory(Accolade::class)->make();
      $accolade->company_id = $user->company->id;
      $accolade->save();

      DB::statement('SET FOREIGN_KEY_CHECKS=1');
   }
}