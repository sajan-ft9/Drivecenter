<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function randomvehicle(){
        $a=array("Car","Bike","Scooter");
        $random_keys=array_rand($a,1);
        return $a[$random_keys];
    }

    public function definition()
    {   $veh = $this->randomvehicle();
        return [
            'name' => fake()->name(),
            'userid' => fake()->uuid(),
            'email' => fake()->safeEmail(),
            'image' => "/storage/images/default.png",
            'phone' => fake()->phoneNumber(),
            'address'=> fake()->address(),
            'vehicle'=> $veh,
            // 'instructor_id' => 1,
            'paid_amount'=> 2000,
        ];
    }
}
