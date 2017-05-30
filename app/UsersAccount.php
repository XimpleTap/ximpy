<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersAccount extends Model
{
    protected $table = 'users_account';

    public function fetch_account_data($id){
        return UsersAccount::where('user_id',$id)->get();
    }
}
