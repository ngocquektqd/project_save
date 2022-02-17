<?php

namespace App\Controllers;

//use App\Controllers\PDO;
use Core\View;
use App\Models\User;

/**
 * User admin controller
 *
 * PHP version 5.4
 */
class Users extends \Core\Controller
{

    /**
     * Before filter
     *
     * @return void
     */
    protected function before()
    {
        // Make sure an admin user is logged in for example
        // return false;
    }

    /**
     * Show the index page
     *
     * @return void
     */

    public function indexAction()
    {
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        echo 'User admin index';
        $users = User::getAll();
        print_r($users);
        $number = count($users);
        print_r($users);
        if($number> 0){
            $user_array = [];
            $user_array['list_user'] = [];

            while ($row = $users-> fetch(PDO::FETCH_ASSOC)){
                extract($row);
                $user_item =array(
                    'user_id'=> $user_id,
                    'user_name'=> $user_name,
                    'password'=> $password,
                );
                array_push($user_array['list_user'], $user_item);

            }
            echo json_encode($user_array);

        }else{
            echo json_encode(
                array('message' => 'No Posts Found')
            );
        }
    }
}
