<?php
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Certificate;
use Illuminate\Database\Eloquent\Model;

class CertificateTableSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      //$users = factory(App\Models\User::class, 10)->create();

      /*user with Certificate data*/
      DB::statement('SET FOREIGN_KEY_CHECKS=0');
      Certificate::truncate();
      $user = User::where('email','test@gmail.com')->first();
      $certificate = factory(Certificate::class)->make();
      $certificate->company_id = $user->company->id;
      $certificate->save();

      DB::statement('SET FOREIGN_KEY_CHECKS=1');
   }
}