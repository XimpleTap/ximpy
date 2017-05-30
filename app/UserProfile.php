<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'users_profiles';
    protected $fillable =['email_address'];
    public $timestamps = false;
    protected $primaryKey = 'user_id';

    public function fetch_user_profile_data($id){
        return UserProfile::find($id);
    }

    public function create_user_profile_data($data){
        $user_profile = new UserProfile();
        $columns = array_keys($data);
        foreach($columns as $d){
            switch($d){
                case 'user_id':
                    $user_profile->user_id = $data['user_id'];
                    break;
                case 'first_name':
                    $user_profile->first_name = $data['first_name'];
                    break;
                case 'middle_name':
                    $user_profile->middle_name = $data['middle_name'];
                    break;
                case 'last_name':
                    $user_profile->last_name = $data['last_name'];
                    break;
                case 'email_address':
                    $user_profile->email_address = $data['email_address'];
                    break;
                case 'contact_number':
                    $user_profile->contact_number = $data['contact_number'];
                    break;
                case 'is_subscribed_to_email':
                    $user_profile->is_subscribed_to_email = $data['is_subscribed_to_email'];
                    break;
                case 'is_subscribed_to_sms':
                    $user_profile->is_subscribed_to_sms = $data['is_subscribed_to_sms'];
                    break;
                case 'is_subscribed_to_app_notif':
                    $user_profile->is_subscribed_to_app_notif = $data['is_subscribed_to_app_notif'];
                    break;
            }
        }
        $status = $user_profile->save();
        return $status;
    }

    public function update_user_profile_data($data,$id){
        $user_profile = UserProfile::find($id);
        $columns = array_keys($data);
        foreach($columns as $d){
            switch($d){
                case 'user_id':
                    $user_profile->user_id = $data['user_id'];
                    break;
                case 'first_name':
                    $user_profile->first_name = $data['first_name'];
                    break;
                case 'middle_name':
                    $user_profile->middle_name = $data['middle_name'];
                    break;
                case 'last_name':
                    $user_profile->last_name = $data['last_name'];
                    break;
                case 'email_address':
                    $user_profile->email_address = $data['email_address'];
                    break;
                case 'contact_number':
                    $user_profile->contact_number = $data['contact_number'];
                    break;
                case 'is_subscribed_to_email':
                    $user_profile->is_subscribed_to_email = $data['is_subscribed_to_email'];
                    break;
                case 'is_subscribed_to_sms':
                    $user_profile->is_subscribed_to_sms = $data['is_subscribed_to_sms'];
                    break;
                case 'is_subscribed_to_app_notif':
                    $user_profile->is_subscribed_to_app_notif = $data['is_subscribed_to_app_notif'];
                    break;
            }
        }
        $status = $user_profile->save();
        return $status;
    }

    public function get_user_data_via_email($email){
        $profile = UserProfile::where('email','=',$email)->get();
        return $profile;
    }
}
