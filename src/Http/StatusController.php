<?php

namespace Exfriend\HardwareInfo\Http;

use Exfriend\HardwareInfo\HardwareInfo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class StatusController extends Controller
{

    /**
     * @param Request $request
     *
     * @return array
     */
    public function status( Request $request )
    {

        $hardware = new HardwareInfo();

        return [
            'uptime' => $hardware->uptime()->get(),
            'loads'  => $hardware->loads()->get(),
            //            'cpu'    => $hardware->cpu()->get(),
            'memory' => $hardware->memory()->get(),
            'swap'   => $hardware->swap()->get(),
            'disk'   => $hardware->disk( '/' )->get(),
        ];

        //        $hardware = new HardwareInfo();
        //
        //        return [
        //            'uptime'  => $hardware->uptime(),
        //            //			'network' => $hardware->network(),
        //            'cpu'     => [
        //                'percent' => $hardware->cpu(),
        //            ],
        //            'ram'     => [
        //                'used'    => $hardware->memory()->used(),
        //                'percent' => $hardware->memory()->usedPercent(),
        //                'free'    => $hardware->memory()->free(),
        //                'total'   => $hardware->memory()->total(),
        //            ],
        //            'swap'    => [
        //                'used'    => $hardware->swap()->used(),
        //                'percent' => $hardware->swap()->usedPercent(),
        //                'free'    => $hardware->swap()->free(),
        //                'total'   => $hardware->swap()->total(),
        //            ],
        //            'disk'    => [
        //                'used'    => $hardware->disk()->usedSpace(),
        //                'percent' => $hardware->disk()->usedPercent(),
        //                'free'    => $hardware->disk()->freeSpace(),
        //                'total'   => $hardware->disk()->totalSpace(),
        //            ],
        //            'storage' => [
        //                'used'    => $hardware->storage()->usedSpace(),
        //                'percent' => $hardware->storage()->usedPercent(),
        //                'free'    => $hardware->storage()->freeSpace(),
        //                'total'   => $hardware->storage()->totalSpace(),
        //            ],
        //        ];

    }
}
