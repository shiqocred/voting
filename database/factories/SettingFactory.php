<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "website_name" => "MyElection",
            "home_name" => "Election 2022",
            "election_date_start" => "2022-07-16",
            "election_date_end" => "2022-07-16",
            "election_time_start" => "20:00",
            "election_time_end" => "20:00"
        ];
    }
}
