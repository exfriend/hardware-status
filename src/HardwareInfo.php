<?php


namespace Exfriend\HardwareInfo;


use Exfriend\HardwareInfo\Tickers\Disk;
use Exfriend\HardwareInfo\Tickers\Loads;
use Exfriend\HardwareInfo\Tickers\Memory;
use Exfriend\HardwareInfo\Tickers\Processor;
use Exfriend\HardwareInfo\Tickers\Swap;
use Exfriend\HardwareInfo\Tickers\Uptime;

class HardwareInfo
{
    public function loads()
    {
        return new Loads();
    }

    public function swap()
    {
        return new Swap();
    }

    public function memory()
    {
        return new Memory();
    }

    public function cpu()
    {
        return new Processor();
    }

    public function uptime()
    {
        return new Uptime();
    }

    public function disk( $string )
    {
        return new Disk();
    }
}