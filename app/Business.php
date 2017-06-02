<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $table = 'businesses';

    public function cardsgroup(){
        return $this->hasMany('App\CardGroup');
    }

    public function cardassignments(){
        return $this->hasMany('App\CardAssignment');
    }

    public function rewards(){
        return $this->hasMany('App\Reward');
    }

    public function product_services(){
        return $this->hasMany('App\ProductService');
    }

    public function business_policies(){
        return $this->hasMany('App\BusinessPolicy');
    }

    public function business_reload_denoms(){
        return $this->hasMany('App\BusinessReloadDenom');
    }


    public function fetch_business_data($id){
        return Business::with('cardsgroup','cardassignments','rewards','product_services','business_policies','business_reload_denoms')->where('id','=',$id)->get();

    }

    public function remove_business_data($id){
        return Business::destroy($id);
    }

    public function create_business_data($data){
        $business = new Business;
        $business->business_name = $data['business_name'];
        $business->business_address = $data['business_address'];
        $business->contact_person = $data['contact_person'];
        $business->contact_number = $data['contact_number'];
        $business->email_address = $data['email_address'];
        $business->banner_link = $data['banner_link'];
        $business->is_active = $data['is_active'];
        $business->created_at = $data['created_at'];
        $status = $business->save();
        return $status;
    }

    public function update_business_data($data,$id)
    {
        $business = Business::find($id);
        $columns = array_keys($data);

        foreach($columns as $d){
            if($d == 'business_name'){
                $business->business_name = $data['business_name'];
            }
            if($d == 'business_address'){
                $business->business_address = $data['business_address'];
            }
            if($d == 'contact_person'){
                $business->contact_person = $data['contact_person'];
            }
            if($d == 'contact_number'){
                $business->contact_number = $data['contact_number'];
            }
            if($d == 'email_address'){
                $business->email_address = $data['email_address'];
            }
            if($d == 'banner_link'){
                $business->banner_link = $data['banner_link'];
            }
            if($d == 'is_active'){
                $business->is_active = $data['is_active'];
            }
        }
        $status = $business->save();
        return $status;
    }

    private function validate_update_data($data){

    }
}
