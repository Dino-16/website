<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('jobs.jobs');
})->name('jobs');

Route::get('/jobs/{id}', function ($id) {
    return view('jobs.job-details', ['id' => $id]);
})->name('job-details');

Route::get('/jobs/{id}/application', function ($id) {
    return view('jobs.applications', ['id' => $id]);
})->name('application');