<?php

namespace idekite\flexcodesdk\Controllers;

use App\Events\RegisterProcess;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Events\VerifyProcess;

use flexcodesdk;
use Config;
// use App\Events\VerifyProcess;
use Event;

class flexcodeSDKController extends Controller
{
    public function status()
    {
        $data = flexcodesdk::getDevice();
        return $data;
    }

    public function ac()
    {
        echo env('FLEXCODE_AC') . env('FLEXCODE_SN');
    }

    public function register($id)
    {
        echo flexcodesdk::registerUrl($id);
    }

    public function save(Request $request, $id)
    {
        $result = flexcodesdk::register($id, $request->input('RegTemp'));

        $response = event(new RegisterProcess($result));;
    }

    public function verify(Request $request, $id)
    {
        $user = \App\Models\User::findOrFail($id);

        echo flexcodesdk::verificationUrl($user, $request->all());
    }

    public function saveverify(Request $request, $id)
    {
        $result = flexcodesdk::verify($id, $request->input('VerPas'));
        $result['extras'] = $request->all();
        event(new VerifyProcess($result));

    }

}
