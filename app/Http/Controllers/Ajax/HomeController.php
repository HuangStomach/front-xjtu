<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use JsonRPC\Client;

class HomeController extends Controller
{
    protected static $rpc = null;

    protected static function getRpc () {
        if(!self::$rpc) {
            $client = new Client('http://equip.xjtu.edu.cn/lims/api');
            $result = $client->execute('xjtu/authorize', [
                'clientId' => '2a60ebf4-8f27-4595-b633-44a2c673056c', 
                'clientSecret' => 'c4847c7c-cf62-411f-9ff2-4f6fe841235c'
            ]);

            self::$rpc = $client;
        }
        return self::$rpc;
    }

    public function eqStatus() {
        return view('home/eqStatus');
    }
 
    public function eqRate() {
        return view('home/eqRate');
    }

    public function labStatus() {
        return view('home/labStatus');
    }

    public function userStatus() {
        $result = self::getRpc()->execute('xjtu/userStatus', [1]);
        $total = $result['total'];
        return view('home/userStatus', [
            'user' => $result,
            'inner' => round($result['inner'] / $total, 2),
            'outer' => round($result['outer'] / $total, 2),
            'incharge' => round($result['incharge'] / $total, 2),
            'admin' => 0.4
        ]);
    }

    public function ranking() {
        return view('home/ranking');
    }
    
    public function newReserve() {
        return view('home/newReserve');
    }

}
