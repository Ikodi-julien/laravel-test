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
}
