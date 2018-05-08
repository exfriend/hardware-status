<?php


namespace Exfriend\HardwareInfo\Tickers;


use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

abstract class AbstractTicker
{

    protected function exec( $command )
    {
        $process = new Process( $command );
        $process->run();

        // executes after the command finishes
        if ( !$process->isSuccessful() )
        {
            throw new ProcessFailedException( $process );
        }

        return trim( $process->getOutput() );
    }

}