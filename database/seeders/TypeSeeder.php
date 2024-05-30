<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'name' => 'Website',
                'description' => 'A project focused on creating a website, typically including static pages, content management, and user interaction through forms'
            ],
            [
                'name' => 'MobileApp',
                'description' => 'A project involving the development of applications for mobile devices, such as smartphones and tablets, using platforms like iOS or Android'
            ],
            [
                'name' => 'WebApp',
                'description' => 'A project focused on developing dynamic web applications that provide interactive and user-driven functionality, often with features such as user authentication, data processing, and real-time updates. These applications typically involve both front-end and back-end development'
            ],
            [
                'name' => 'API',
                'description' => 'A project centered on building application programming interfaces (APIs) that allow different software systems to communicate and exchange data'
            ],
            [
                'name' => 'E-commerce',
                'description' => 'A project dedicated to developing online stores or marketplaces where users can browse products, make purchases, and handle transactions'
            ]
        ];

        foreach ($types as $type) {
            $newType = new Type();
            $newType->name = $type['name'];
            $newType->slug = Str::slug($newType->name, '-');
            $newType->description = $type['description'];
            $newType->save();
        };
    }
}
