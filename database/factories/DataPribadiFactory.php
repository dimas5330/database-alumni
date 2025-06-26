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
            'nama_lengkap' => $this->faker->name,
            'jenis_kelamin' => $this->faker->randomElement(['Laki - Laki', 'Perempuan']),
            'tempat_lahir' => $this->faker->city,
            'tanggal_lahir' => $this->faker->dateTimeBetween('-40 years', '-20 years'),
            'goldar' => $this->faker->randomElement(['A', 'B', 'AB', 'O']),
            'alamat' => $this->faker->address,
            'angkatan' => $this->faker->numberBetween(2010, 2024),
            'nama_sekolah' => 'SMA ' . $this->faker->company,
            'pendidikan_terakhir' => $this->faker->randomElement(['SMA', 'D3', 'S1', 'S2', 'S3']),
            'fakultas' => $this->faker->randomElement(['Teknik', 'Ekonomi', 'Hukum', 'Kedokteran', 'FKIP', 'Pertanian']),
            'jurusan' => $this->faker->randomElement(['Informatika', 'Elektro', 'Sipil', 'Manajemen', 'Akuntansi', 'Hukum']),
            'pekerjaan' => $this->faker->jobTitle,
            'profesi' => $this->faker->randomElement(['Karyawan Swasta', 'PNS', 'Wiraswasta', 'Guru', 'Dosen', 'Dokter']),
            'nama_kantor' => $this->faker->company,
            'alamat_kantor' => $this->faker->address,
        ];
    }
}
