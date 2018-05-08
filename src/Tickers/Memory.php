<?php


namespace Exfriend\HardwareInfo\Tickers;


class Memory extends AbstractTicker
{

    public function get()
    {
        $mem = $this->getSystemMemInfo();

        $total = $mem[ 'MemTotal' ];
        $available = $mem[ 'MemAvailable' ];
        $used = $total - $available;
        $used_percent = round( $used / $total * 100 );

        return [
            'total'        => $total,
            'available'    => $available,
            'used'         => $used,
            'used_percent' => $used_percent,
        ];
    }

    function getSystemMemInfo()
    {
        $data = explode( "\n", trim( file_get_contents( "/proc/meminfo" ) ) );
        $meminfo = [];
        foreach ( $data as $line )
        {
            list( $key, $val ) = explode( ":", $line );
            $meminfo[ $key ] = round( trim( str_replace( 'kB', '', $val ) ) * 1024 );
        }
        return $meminfo;
    }

}