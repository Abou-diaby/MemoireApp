<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    protected $fillable = ['session', 'theme', 'name','lastname','email','tel','matricule','class','parcours','problematique','objectif_general','objectifs_specifiques','resultats_attendus','response', 'date','user_id','remarks'];

    // Ajoutez des relations si nécessaire, par exemple :
    // public function user() {
    //     return $this->belongsTo(User::class);
    // }

	/**
	 * @return mixed
	 */
	public function getFillable() {
		return $this->fillable;
	}

	/**
	 * @param mixed $fillable
	 * @return self
	 */
	public function setFillable($fillable): self {
		$this->fillable = $fillable;
		return $this;
	}
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
