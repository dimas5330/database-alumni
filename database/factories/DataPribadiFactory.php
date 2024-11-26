<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\DataPribadi;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DataPribadiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //make a factory based on data_pribadi table
            'user_id' => User::factory(),
            'jenis_kelamin' => $this->faker->randomElement(['Pria', 'Wanita']),
            'tempat_lahir' => $this->faker->city,
            'tanggal_lahir' => $this->faker->date,
            'goldar' => $this->faker->randomElement(['A', 'B', 'AB', 'O']),
            'alamat' => $this->faker->address,
            'angkatan' => $this->faker->year,
            'nama_sekolah' => $this->faker->company,
            'pekerjaan' => $this->faker->jobTitle,
            'nama_kantor' => $this->faker->company,
            'alamat_kantor' => $this->faker->address,
        ];
    }
}
