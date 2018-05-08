<?php


namespace Exfriend\HardwareInfo\Tickers;


class Loads extends AbstractTicker
{

    public function get()
    {
        return sys_getloadavg();
    }

}