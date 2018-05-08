<?php


namespace Exfriend\HardwareInfo\Tickers;


class Disk extends AbstractTicker
{
    /**
     * @var string
     */
    private $path;

    public function __construct( $path = '/' )
    {
        $this->path = $path;
    }

    public function get()
    {

        $total = disk_total_space( $this->path );
        $available = disk_free_space( $this->path );

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