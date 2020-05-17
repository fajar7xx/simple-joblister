<?php

namespace App;

use App\Mail\NewUserWelcomeMail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // langsung membuat profile untuk user ini
    protected static function boot(){
        parent::boot();

        // otomatis mebuat nya
        static::created(function($user){
            $user->profile()->create([
                'image' => 'profile/user.png',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi vitae quam, provident, a expedita quaerat enim aliquam, fugiat debitis veritatis officiis placeat explicabo aut eaque esse magni animi illum id.
                Ipsa nemo non distinctio nam modi iste dolorem eligendi architecto minus odit quas explicabo eius optio est beatae iusto illum quia veritatis quaerat magnam cumque accusamus quidem, quisquam repudiandae? Distinctio.
                Rerum, perspiciatis ut voluptatibus quas quasi, ab, repellat odit laboriosam neque ducimus autem minima! Quibusdam exercitationem tempore asperiores similique earum nobis, id eaque nihil delectus aspernatur, placeat corrupti, alias vitae.
                Quibusdam tenetur corporis sint dignissimos blanditiis quo asperiores quos sapiente officia tempore. Ipsam eum voluptates sed ipsum perferendis quia, nostrum sequi aut minima repellendus placeat maiores totam deserunt voluptatibus dolore!
                Fugiat accusantium facere, perspiciatis pariatur dolores tempore provident consectetur dolorum sed illum dicta tenetur corrupti ab vitae commodi eligendi totam deleniti laudantium. Ullam provident natus suscipit, debitis quibusdam inventore dolorem.',
            ]);

            // nanti aja deh buat untuk verifikasi emailnya
            Mail::to($user->email)->send(new NewUserWelcomeMail());
        });
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function job()
    {
        return $this->hasMany(Job::class);
    }

    public function proposal(){
        return $this->hasMany(Proposal::class);
    }
}
