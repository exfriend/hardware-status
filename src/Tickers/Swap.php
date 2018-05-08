<?php


namespace Exfriend\HardwareInfo\Tickers;


class Swap extends AbstractTicker
{

    public function get()
    {
        $mem = $this->getSystemMemInfo();


        $total = $mem[ 'SwapTotal' ];
        $available = $mem[ 'SwapFree' ];
        $used = $total - $available;
        $used_percent = $total > 0 ? round( $used / $total * 100 ) : 0;

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