<?php

use App\Livewire\AboutUs;
use App\Livewire\ContactUs;
use App\Livewire\CreateStudent;
use App\Livewire\Student;
use App\Livewire\UpdateStudent;
use Illuminate\Support\Facades\Route;


Route::get('/', Student::class);
Route::get('/student', CreateStudent::class)->name('student.create');
Route::get('/student/{id}/edit', UpdateStudent::class)->name('student.edit');
Route::get('/about', AboutUs::class)->name('about.us');
Route::get('/contact', ContactUs::class)->name('contact.us');
