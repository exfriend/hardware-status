<?php


namespace Exfriend\HardwareInfo\Tickers;


class Uptime extends AbstractTicker
{

    public function get()
    {
        return $this->exec( 'uptime -p' );
    }

}