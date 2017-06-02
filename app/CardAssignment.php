<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardAssignment extends Model
{
    protected $table = 'card_assignments';
    public $timestamps = false;

    public function card_assignments_card_group(){
        return $this->hasOne('App\CardAssignmentsCardGroup');
    }

    public function card_user(){
        return $this->hasOne('App\CardUser');
    }

    public function transaction_logs(){
        return $this->hasMany('App\TransactionLogs');
    }

    public function fetch_card_assignment_data($id){
        return CardAssignment::with('card_assignments_card_group','card_user','transaction_logs')->where('id','=',$id)->get();
    }

    public function remove_card_assignment_data($id){
        return CardAssignment::destroy($id);
    }

    public function update_card_assignment_data($data,$id){
        $card_assignment = CardAssignment::find($id);
        $columns = array_keys($data);
        foreach($columns as $d){
            switch($d){
                case 'card_id':
                    $card_assignment->card_id = $data['card_id'];
                    break;
                case 'business_id':
                    $card_assignment->business_id = $data['business_id'];
                    break;
                case 'released_on':
                    $card_assignment->released_on = $data['released_on'];
            }
        }
        $status = $card_assignment->save();
        return $status;
    }

    public function create_card_assignment_data($data){
        $card_assignment = new CardAssignment();
        $columns = array_keys($data);
        foreach($columns as $d){
            switch($d){
                case 'card_id':
                    $card_assignment->card_id = $data['card_id'];
                    break;
                case 'business_id':
                    $card_assignment->business_id = $data['business_id'];
                    break;
                case 'released_on':
                    $card_assignment->released_on = $data['released_on'];
            }
        }
        $status = $card_assignment->save();
        return $status;
    }
}
