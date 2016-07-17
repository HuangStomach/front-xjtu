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
        $result = self::getRpc()->execute('equipment/getSummaryInfo', [1]);
        return view('home/eqStatus', [
            'rate' => round($result['controlCount'] / $result['totalCount'], 2),
            'total' => $result['totalCount'],
            'control' => $result['controlCount'],
            'using' => $result['usingCount'],
            'wait' => $result['unUsingCount'],
            'down' => $result['outServiceCount'],
        ]);
    }
 
    public function eqRate() {
        $result = self::getRpc()->execute('equipment/getSummaryInfo', [1]);
        return view('home/eqRate', [
            'rate' => round($result['usingCount'] / $result['totalCount'], 2),
            'total' => $result['totalCount'],
            'using' => $result['usingCount'],
        ]);
    }

    public function labStatus() {
        $result = self::getRpc()->execute('xjtu/labStatus', [1]);
        return view('home/labStatus', [
            'project' => $result['project'],
            'lab' => $result['lab'],
            'test' => $result['test'],
        ]);
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

    public function reservRank() {
        $reservs = self::getRpc()->execute('xjtu/reservRank', [1]);
        return view('home/reservRank', [
            'reservs' => $reservs,
        ]);

    }

    public function useRank() {
        $uses = self::getRpc()->execute('xjtu/useRank', [1]);
        return view('home/useRank', [
            'uses' => $uses,
        ]);

    }
    
    public function newReserve() {
        $users= self::getRpc()->execute('eq_reserv/getNewUsers', [4]);
        return view('home/newReserve', [
            'users' => $users,
        ]);
    }

}
