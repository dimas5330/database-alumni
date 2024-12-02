<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\DataKeluarga;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataKeluarga>
 */
class DataKeluargaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //make data keluarga factory
            'user_id' => User::factory(),
            'status' => $this->faker->randomElement(['Menikah', 'Belum Menikah']),
            'nama_pasangan' => $this->faker->name,
            'pekerjaan_pasangan' => $this->faker->jobTitle,
            'tempatlahir_pasangan' => $this->faker->city,
            'tanggallahir_pasangan' => $this->faker->date,
            'goldar_pasangan' => $this->faker->randomElement(['A', 'B', 'AB', 'O']),
            'nama_anak' => $this->faker->name,
        ];
    }
}
