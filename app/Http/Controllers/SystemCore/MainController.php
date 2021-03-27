<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Http\Controllers\System\Core\ImageController;
use App\Models\OrderingSystem\Order;
use App\Models\SystemCore\Core\File;
use Illuminate\Http\Request;

class MainController extends Controller{
    public function rootIndex(){
        return view($this->system_path.'/app/dashboards/root-home');
    }
    public function userIndex(){
        $spentMoney = (Order::where('user_id', $this::getUser()['value'])->sum('total_price') + Order::where('user_id', $this::getUser()['value'])->sum('shipping'));

        return view($this->system_path.'/app/dashboards/user-home', [
            'totalOrders' => Order::where('user_id', $this::getUser()['value'])->count(),
            'inTransit' => Order::where('user_id', $this::getUser()['value'])->where('order_status', 'in-transit')->count(),
            'spentMoney' => $this::formatPrice($spentMoney)
        ]);
    }

    public function index(){
        $loggedUser = $this::getUserModel();

        if($loggedUser->role == 'Root'){
            return $this->rootIndex();
        }else{
            return $this->userIndex();
        }
    }

    // *************************************************************************************************************? //

    public function saveImage(Request $request){
        try{
            $image_id = ImageController::insertImage($request);
            $file = File::where('id', $image_id)->first();

            return json_encode(array('code' => '0000', 'image_id' => $image_id, 'photo' => $file->file));
        }catch (\Exception $e){
            return json_encode(array('code' => '40004', 'message' => 'Neuspješno spremanje fotografije. Molimo pokušajte ponovo!'));
        }
    }
}
