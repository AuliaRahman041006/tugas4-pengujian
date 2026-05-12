<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

test('Bryan Seorang manager', function () {

    // Arrange — buat object User dengan role manager
    $user = new User(['role' => 'manager']);

    // Act — panggil method yang diuji
    $hasil = $user->isManager();

    // Assert — verifikasi hasilnya
    expect($hasil)->toBeTrue();

});

test('Bryan Bukan Manager', function () {

    // Arrange
    $user = new User(['role' => 'karyawan']);

    // Act
    $hasil = $user->isManager();

    // Assert
    expect($hasil)->toBeFalse();

});


test('isKaryawan mengembalikan true jika role adalah karyawan', function () {

    // Arrange — buat object User dengan role karyawan
    $user = new User(['role' => 'karyawan']);

    // Act — panggil method yang diuji
    $hasil = $user->isKaryawan();

    // Assert — verifikasi hasilnya
    expect($hasil)->toBeTrue();

});

test('isKaryawan mengembalikan false jika role adalah manager', function () {

    // Arrange
    $user = new User(['role' => 'manager']);

    // Act
    $hasil = $user->isKaryawan();

    // Assert
    expect($hasil)->toBeFalse();

});

test('isKaryawan mengembalikan false jika role kosong', function () {

    // Arrange
    $user = new User(['role' => '']);

    // Act
    $hasil = $user->isKaryawan();

    // Assert
    expect($hasil)->toBeFalse();

});