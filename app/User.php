<?php

namespace App;


// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use OwenIt\Auditing\Contracts\Auditable;
use App\Notifications\PasswordResetNotification;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
// use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;
use Spatie\Permission\Traits\HasRoles;
// use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class User extends Authenticatable implements Auditable , HasMedia
{

    use \OwenIt\Auditing\Auditable;
    use Notifiable, HasApiTokens, InteractsWithMedia;
    use HasRoles;
    //  , HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password', 'email_verified_at', 'first_name' , 'last_name'
    // ];

    protected $guarded = [];

    public $appends = ['avatar','user_address'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'media', 'address'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


        public function getJWTIdentifier()
        {
            return $this->getKey();
        }

        public function getJWTCustomClaims()
        {
            return [];
        }

        // public function sendPasswordResetNotification($token)
        // {
        //     $this->notify(new PasswordResetNotification($token));
        // }

        public function sendPasswordResetNotification($token)
        {
            $this->notify(new CustomPassword($token));
        }


        public function registerMediaCollections(): void
        {
            $this->addMediaCollection('avatar')
            ->singleFile();
            // ->useFallbackUrl('/images/anonymous-user.jpg')
            // ->useFallbackPath(public_path('/images/anonymous-user.jpg'));

        }

        public function registerMediaConversions(Media $media = null): void
        {
            $this->addMediaConversion('thumb')
                  ->width(368)
                  ->height(232)
                  ->sharpen(10)
                  ->performOnCollections('avatar');

        }

        public function getAvatarAttribute()  {

            $image =  $this->getMedia('avatar');
           if (null != $image->first()) {

            return array(
                'thumb' =>  $image->first()->getFullUrl('thumb'),
                'image' =>  $image->first()->getFullUrl(),
            );
           }

        }

        // public function avatar()  {

        //     $image =  $this->getMedia('avatar');
        //    if (null != $image->first()) {

        //     return array(
        //         'thumb' =>  $image->first()->getFullUrl('thumb'),
        //         'image' =>  $image->first()->getFullUrl(),
        //     );
        //    }

        // }

        // public function users()
        // {
        //     return $this->morphMany();
        // }

        public function getUserAddressAttribute()  {

            return $this->address;
        }

        public function user_type()
        {
            return $this->morphTo();
        }

        public function userable()
        {
            return $this->morphTo();
        }

        public function address()
            {
                return $this->morphOne('App\Address', 'addressable');
            }


        public function comments()
        {
            return $this->morphMany('App\Comment', 'commentable');
        }

        public function rates()
        {
            return $this->morphMany('App\Rate', 'rateable');
        }

}


class CustomPassword extends ResetPassword
{
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('We are sending this email because we recieved a forgot password request.')
            // ->action('Reset Password', url(config('app.frontend_url') . route('password.reset', $this->token, false)))
            ->action('Reset Password', url(config('app.frontend_url') . '/password_reset?token='. $this->token))
            ->line('If you did not request a password reset, no further action is required. Please contact us if you did not submit this request.');
    }
}