<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;

abstract class AccountType
{
    const Admin = 0;
    const Moderator = 10;
    const User = 20;
    const Trainer = 30;
}

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'banned',
        'gender',
        'birthdate',
        'account_type',
        'training',
        'references',
        'description',
        'street_address',
        'phone_number',
        'postcode',
        'company',
        'premises',
        'is_remote_trainer',
        'receive_newsletter',
        'blog_feed_url',
        'blog_feed_show',
        'visible',
        'membership_type',
        'membership_plan',
        'membership_renewal_date',
        'experience',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token', 'city_id'];

    public function city()
    {
        return $this->belongsTo('App\City');
    }

    /**
     * Get the user's reviews
     *
     * @return array of App\Review
     */
    public function reviews()
    {
        $foreign_key = ($this->account_type == AccountType::Trainer) ? 'trainer_id' : 'user_id';
        $reviews = $this->hasMany('App\Review', $foreign_key)->get();

        foreach ($reviews as $review) {
            $review->reviewee = $review->reviewee();
            $review->reviewer = $review->reviewer();
        }

        return $reviews;
    }

    /**
     * Get the user's review average
     *
     * @return averageScore
     */
    public function averageScore()
    {
        $foreign_key = ($this->account_type == AccountType::Trainer) ? 'trainer_id' : 'user_id';
        $reviews = $this->hasMany('App\Review', $foreign_key)->get();
        $averageScore = 0;
        $reviewCount = 0;

        foreach ($reviews as $review) {
            $averageScore += $review->score;
            $reviewCount++;
        }
        if($reviewCount != 0){
            $averageScore = $averageScore/$reviewCount;
        }

        return $averageScore;
    }

    public function reviewCount()
    {
        $foreign_key = ($this->account_type == AccountType::Trainer) ? 'trainer_id' : 'user_id';
        $reviews = $this->hasMany('App\Review', $foreign_key)->get();
        $reviewCount = 0;

        foreach ($reviews as $review) {
            $reviewCount++;
        }

        return $reviewCount;
    }

    /**
     * Get the user's recommendations
     *
     * @return array of App\Recommendation
     */
    public function recommendations()
    {
        $recommendations = $this->hasMany('App\Recommendation', 'recommended_trainer_id')->get();

        foreach ($recommendations as $recommendation) {
            $recommendation->recommender = $recommendation->recommender();
            $recommendation->recommendee = $recommendation->recommendee();
        }

        return $recommendations;
    }

    /**
     * Get the user's specializations
     *
     * @return array of App\Specialization
     */
    public function specializations()
    {
        return $this->belongsToMany('App\Specialization', 'trainer_specialization', 'trainer_id', 'specialization_id');
    }

    /**
     * Get the user's service fees
     *
     * @return array of App\ServiceFee
     */
    public function serviceFees()
    {
        return $this->hasMany('App\ServiceFee', 'trainer_id');
    }

    /**
     * Get the user's images
     *
     * @return array of App\Image
     */
    public function images()
    {
        return $this->hasMany('App\Image', 'user_id');
    }
}
