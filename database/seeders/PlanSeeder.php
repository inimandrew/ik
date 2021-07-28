<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plans;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = [
            [
                "name" => 'LifeSites FE',
                "id" => 'wso_m15qr8',
                "links" => [
                    [
                        "link" => 'https://lifesites.net/login',
                        "linkTitle" => 'LifeSites App',
                        "image_url" => 'https://picsum.photos/id/237/200/300',
                    ]
                ]
            ],
            [
                "name" => 'LifeSites Pro Unlimited',
                "id" => 'wso_zr0lyq',
                "links" => [
                    [
                        "link" => 'https://lifesites.net/login',
                        "linkTitle" => 'LifeSites App',
                        "image_url" => 'https://picsum.photos/id/237/200/300',
                    ]
                ]
            ],
            [
                "name" => 'LifeSites Elite',
                "id" => 'wso_dtq5p6',
                "links" => [
                    [
                        "link" => 'https://lifesites.net/login',
                        "linkTitle" => 'LifeSites App',
                        "image_url" => 'https://picsum.photos/id/237/200/300',
                    ]
                ]
            ],
            [
                "name" => 'LifeSites Ultimate Local Edition',
                "id" => 'wso_cfbpzz',
                "links" => [
                    [
                        "link" => 'https://lifesites.net/login',
                        "linkTitle" => 'LifeSites App',
                        "image_url" => 'https://picsum.photos/id/237/200/300',
                    ]
                ]
            ],
            [
                "name" => 'LifeSites Agency',
                "id" => 'wso_lcqh3m',
                "links" => [
                    [
                        "link" => 'https://lifesites.net/login',
                        "linkTitle" => 'LifeSites App',
                        "image_url" => 'https://picsum.photos/id/237/200/300',
                    ]
                ]
            ],
            [
                "name" => 'LifeSites Whitelabel',
                "id" => 'wso_w3j2kr',
                "links" => [
                    [
                        "link" => 'https://lifesites.net/login',
                        "linkTitle" => 'LifeSites App',
                        "image_url" => 'https://picsum.photos/id/237/200/300',
                    ]
                ]
            ],
            [
                "name" => 'LifeSites 1K Academy',
                "id" => 'wso_t0t06z',
                "links" => [
                    [
                        "link" => 'https://lifesites.net/login',
                        "linkTitle" => 'LifeSites App',
                        "image_url" => 'https://picsum.photos/id/237/200/300',
                    ]
                ]
            ],
        ];


        foreach ($plans as $key => $plan) {
            $newPlan = Plans::firstOrCreate(["name" => $plan['name']], ['productId' => $plan['id']]);

            foreach ($plan['links'] as $key => $link) {
                $newPlan->link()->create($link);
            }
        }
    }
}
