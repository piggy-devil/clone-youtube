<?php

namespace App;

use Illuminate\Support\Str;
use Spatie\MediaLibrary\File;
use Laravel\Passport\HasApiTokens;
use Spatie\MediaLibrary\Models\Media;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements HasMedia
{
    use Notifiable, HasMediaTrait, HasApiTokens;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }

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

    public function channel()
    {
        return $this->hasOne(Channel::class);
    }

    public function likedPosts()
    {
        return $this->belongsToMany(Post::class, 'likes', 'user_id', 'post_id');
    }

    public function friends()
    {
        return $this->belongsToMany(User::class, 'friends', 'friend_id', 'user_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    // public function registerMediaCollections()
    // {
    //     $this->addMediaCollection('avatar')
    //         // ->singleFile()
    //         ->acceptsFile(function (File $file) {
    //         return $file->mimeType == 'image/jpg';
    //         });
    // }
    public function registerMediaCollections()
    {
        $this->addMediaCollection('avatar')
            // ->singleFile()
            ->acceptsFile(function (File $file) {
            return $file->mimeType == 'image/jpeg';
            })
            ->registerMediaConversions(function (Media $media) {
                $this->addMediaConversion('card')
                    ->width(400)
                    ->height(300);

                $this->addMediaConversion('thumb')
                    ->width(100)
                    ->height(100);
            });
    }

    public function avatar() {
        return $this->hasOne(Media::class, 'id', 'avatar_id');   // avatar_id (foreign Key)
    }

    public function getAvatarUrlAttribute() {
        $user = auth()->user();
        if ($user->avatar_id == null)
            return "";
        return $this->avatar->getUrl('thumb');
    }

    public function image()
    {
        if ($this->media->first()) {
            return $this->media->first()->getFullUrl('thumb');
        }

        return null;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function toggleVote($entity, $type) {
        $vote = $entity->votes->where('user_id', $this->id)->first();

        if ($vote) {
            $vote->update([
                'type' => $type
            ]);

            return $vote->refresh();
        } else {
            return $entity->votes()->create([
                'type' => $type,
                'user_id' => $this->id
            ]);
        }
    }
}
