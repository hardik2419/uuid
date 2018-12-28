<?php
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Portfolio;
use Illuminate\Database\Eloquent\Model;

class PortfolioTableSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      //$users = factory(App\Models\User::class, 10)->create();

      /*user with Portfolio data*/
      DB::statement('SET FOREIGN_KEY_CHECKS=0');
      Portfolio::truncate();
      $user = User::where('email','test@gmail.com')->first();
      $portfolio = factory(Portfolio::class)->make();
      $portfolio->company_id = $user->company->id;
      $portfolio->save();

      DB::statement('SET FOREIGN_KEY_CHECKS=1');
   }
}