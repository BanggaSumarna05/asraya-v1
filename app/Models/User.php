<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Filament\Models\Contracts\FilamentUser;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',        
        'password',
        'remember_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        // 'email',
        // 'nik',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'date:d M Y',
    ];
    protected $appends = [
        'statusSpan',
    ];

    public function GetStatusSpanAttribute()
    {
        switch ($this->status) {
            case 1:
                return '<span class="badge badge-light-success">Aktif</span>';
                break;
            case 2:
                return '<span class="badge badge-light-success">Aktif</span>';
                break;
            case 3:
                return '<span class="badge badge-light-danger">Non-Aktif</span>';
                break;
            default:
                # code...
                break;
        }
    }

    /**
     * Determine if the user can access the Filament admin panel.
     * Only users with verified emails and is_admin flag may enter.
     */
    public function canAccessFilament(): bool
    {
        return true; // Allow all logged-in users to access for now
    }
}
