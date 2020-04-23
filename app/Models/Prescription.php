<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Prescription extends Model
{
  protected $fillable = [
      'user_id', 'pat_id', 'bed_id', 'urea', 'creatinie', 'potassium', 'alt', 'ast', 'bilirubin',
      'albumin', 'dispensed',

  ];

  public function med_relation()
  {
      return $this->belongsToMany('App\Models\Medication', 'med_pres', 'pres_id', 'med_id');
  }

  public function user_relation()
  {
      return $this->belongsTo('App\Models\User', 'user_id');
  }

  public function pat_relation()
  {
      return $this->belongsTo('App\Models\Patient', 'pat_id');
  }

  public function bed_relation()
  {
      return $this->belongsTo('App\Models\Bed', 'bed_id');
  }

// To Show Medications
  public function showMeds()
  {
      $meds = implode(', ', $this->med_relation->pluck('name')->toArray());
      return !empty($meds) ? $meds : 'N\A';
  }
}
