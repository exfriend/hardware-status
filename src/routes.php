<?php

Route::get( 'hardware-status', [ 'as' => 'hardware-status', 'uses' => '\Exfriend\HardwareInfo\Http\StatusController@status', ] );
