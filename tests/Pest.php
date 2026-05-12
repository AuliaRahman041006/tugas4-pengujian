<?php

use App\Models\User;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

pest()->extend(TestCase::class)
    ->use(RefreshDatabase::class)
    ->beforeEach(function () {
        $this->withoutVite();
    })
    ->in('Feature');

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

function buatManager()
{
    return User::create([
        'name' => 'Manager Test',
        'email' => 'manager@test.com',
        'password' => Hash::make('password123'),
        'role'     => 'manager'
    ]);
}

function buatKaryawan(string $nama = 'Karyawan Test', string $email = 'karyawan@test.com'): User
{
    $user = User::create([
        'name'     => $nama,
        'email'    => $email,
        'password' => Hash::make('password123'),
        'role'     => 'karyawan',
    ]);

    Karyawan::create([
        'user_id'        => $user->id,
        'nama'           => $nama,
        'jabatan'        => 'Developer',
        'departemen'     => 'IT',
        'no_telepon'     => '08123456789',
        'tanggal_masuk'  => '2023-01-01',
    ]);

    return $user;
}