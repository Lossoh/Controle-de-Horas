<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'proposals';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['user_id', 'client_id', 'name', 'proposal'];

    /**
     * Get the user record associated with the project.
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Get the client record associated with the project.
     */
    public function client()
    {
        return $this->belongsTo('App\Client', 'client_id');
    }
}