<?php

namespace App\Http\Controllers;

use App\Business;
use App\CardAssignment;
use App\CardUser;
use App\User;
use App\UsersAccount;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(){
        $user = new User();
        // TODO: $user_id = [please set user id here] REMOVE BELOW $user_id value after;
        $user_id = 2;
        $user_account = new UsersAccount();
        $cards = $user_account ->fetch_account_data($user_id);
        $card_assignment = new CardAssignment();
        $business = new Business();
        $new_card_data = [];

        foreach($cards as $card){

            $card_assignment_data = $card_assignment->fetch_card_assignment_data($card['card_assignment_id']);

            if(count($card_assignment_data) >= 1){
                $business_data = $business->fetch_business_data($card_assignment_data[0]['business_id']);
                $compose_array_data = ['card'=>$card,'business'=>$business_data];
                array_push($new_card_data,$compose_array_data);
            } else{
                //echo "WELCOME! PLEASE AVAIL THE LATEST PROMOS BY USING LOYALTY CARDS OF OUR PARTICIPATING STORES.";
            }
        }

        $user = new User();
        $user_data = $user->fetch_user_data($user_id);

        $card_assignment_ids = [];
        foreach($cards as $card){
            array_push($card_assignment_ids,$card['card_assignment_id']);
        }

        return view('users.dashboard',['cards'=>$new_card_data,'user_data'=>$user_data]);
    }
}
