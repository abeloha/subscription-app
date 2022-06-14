<?php

namespace Database\Seeders;

use App\Models\Subscription;
use App\Models\Website;
use Illuminate\Database\Seeder;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //seed website with subscribers with real email address
        echo 'seed website with subscribers with real email address ...';

        $website = Website::create([
            'name' => 'Seed Website test',
            'url' => 'www.test.com',
        ]);

        $emails = ['abonuoha@gmail.com', 'abonuoha@yahoo.co.uk'];
        $names = ['Abel Onuoha', 'Prince Abel'];

        foreach ($emails as $key => $value) {
            Subscription::updateOrCreate(
            [
                'website_id' => $website->id,
                'email' => $value,
            ],
            [
                'name' => $names[$key],
            ]);
        }

        echo '   Seed completed';
    }
}
