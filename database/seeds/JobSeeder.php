<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Job;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Category;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $total = 50;

        for($i=0; $i<$total; $i++){
            $user = $faker->numberBetween($min = 6, $max = 8);
            $category = $faker->numberBetween($min = 1, $max = 40);
            $title = $faker->jobTitle;
            $url = $faker->unique()->slug;
            $description = $faker->text;
            $location = $faker->city;
            $company = $faker->companySuffix;
            $salary = $faker->randomNumber($nbDigits = 7, $strict = false);
            $phone = $faker->e164PhoneNumber;
            $email = $faker->email;
            $created = Carbon::now();
            $updated = Carbon::now();
            $status = 'open';

            Job::create([
                'user_id' => $user,
                'category_id' => $category,
                'job_title' => $title,
                'url' => $url,
                'description' => $description,
                'location' => $location,
                'company' => $company,
                'salary' => $salary,
                'contact_phone' => $phone,
                'contact_email' => $email,
                'created_at' => $created,
                'updated_at' => $updated,
                'status' => $status
            ]);
        }
    }
}
