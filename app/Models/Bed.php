<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Bed extends Model
{
  protected $fillable = [
      'number','desc', 'status', 'dep_id'
  ];

  public function dep_relation()
  {
      return $this->belongsTo('App\Models\Department', 'dep_id');
  }
}
