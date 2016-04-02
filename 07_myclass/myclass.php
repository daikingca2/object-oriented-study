<?php

class anyclass
{
    function sound($var)
    {
        $res = '';
        if( $var == '撫でる' )
        {
            $res = 'ふぁぁあー';
        }
        elseif( $var == '叩く' )
        {
            $res = 'いって...';
        }
        else
        {
            $res = 'きゃっ';
        }
        return $res;
    }
}

function createInstance()
{
    $ins = null;
    $ins = new anyclass();
    return $ins;
}


 ?>
