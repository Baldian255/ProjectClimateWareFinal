<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'admin';

    // Protect mass assignment  
    protected $fillable = ['name', 'email', 'password'];
    public function run(): void
{
    Admin::factory()->count(5)->create();
}
}
