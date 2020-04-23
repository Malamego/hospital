<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Medication extends Model
{
  protected $fillable = [
      'name','desc', 'concen', 'med_id'
  ];

  public function medicalform_relation()
  {
      return $this->belongsTo('App\Models\Medicalform', 'med_id');
  }
}
