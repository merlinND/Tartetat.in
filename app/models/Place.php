<?php

class Place extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'places';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('created_at', 'updated_at', 'idType', 'idTime', 'type');
	protected $fillable = array('description');

	public function type() {
		return $this->hasOne('Type', 'id', 'idType');
	}
	public function time() {
		if ($this->idTime == null) {
			$this->attributes['idTime'] = $this->type->idTime;
		}
		return $this->hasOne('Time', 'id', 'idTime');
	}
	public function counters() {
		$this->attributes['counters'] = PlaceCounters::firstOrCreate(array(
			'id' => $this->id
		));
		return $this->hasOne('PlaceCounters', 'id');
	}

	/**
	 * Either this place has at least one catchphrase of its own,
	 * or we fallback to the cathphrases of its Type
	 */
	public function catchphrases() {
		$cathphrases = CatchPhrase::fromPlace()->where('idTable', '=', $this->id)->get();
		if (count($cathphrases) < 1) {
			$cathphrases = CatchPhrase::fromType()->where('idTable', '=', $this->type->id);
		}
		return $this->hasMany('CatchPhrase', 'idTable');
	}


	public static function all($columns = array()) {
		$all = Place::with('counters', 'catchphrases')->get();
		$all->each(function($c) {
			// if ($c->idTime == null && $c->type != null) {
			// 	$c->attributes['idTime'] = $c->type->idTime;
			// }
			// $c->time = Time::find($c->idTime);
			// if ($c->time != null)
			// 	$c->time = $c->time->toArray();
			
			// Desperate times...
			$c->time;
		});
		return $all;
	}


	/**
	 * Add 1 to the view counter
	 * Call each time this Place is displayed.
	 */
	public function bumpViews() {
		$this->counters->display++;
		$this->counters->save();
	}
	/**
	 * Add 1 to the go counter
	 * Call each time this Place is selected by a user.
	 */
	public function bumpGo() {
		$this->counters->go++;
		$this->counters->save();
	}
	/**
	 * Add 1 to the skip counter
	 * Call each time a user decides not to go to this place.
	 */
	public function bumpSkip() {
		$this->counters->skip++;
		$this->counters->save();
	}

}