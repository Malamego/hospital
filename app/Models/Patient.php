<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Patient extends Model
{
  protected $fillable = [
      'name', 'address', 'age', 'weight',  'phone', 'dep_id', 'bed_id', 'user_id', 'imei',  'email',
       'regdate',  'image', 'sex', 'smoker', 'hypertensive', 'diabetic', 'history', 'ecg', 'echo'
  ];

  public function dep_relation()
  {
      return $this->belongsTo('App\Models\Department', 'dep_id');
  }

  public function bed_relation()
  {
      return $this->belongsTo('App\Models\Bed', 'bed_id');
  }

  public function user_relation()
  {
      return $this->belongsTo('App\Models\User', 'user_id');
  }

}
