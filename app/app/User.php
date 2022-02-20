<?php
namespace App;

use App\Models\Message;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;

class User extends Model implements Authenticatable
{
    use BasicAuthenticatable;

    protected $fillable = ['email', 'password'];

    public function messages() {
        return $this->hasMany(Message::class)->latest();
    }

    public function follows() {
        return $this->belongsToMany(User::class, 'followed_has_follower', 'follower_id', 'followed_id');
    }

    public function isFollowing($user): bool {
        return $this->follows()->where('followed_id', $user->id)->exists();
    }
}
