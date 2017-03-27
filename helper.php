<?php
function formatSeconds( $input )
{

	$uSec = $input % 1000;
$input = floor($input / 1000);
return gmdate( 'i:s', $input );
//end of function
$seconds = $input % 60;
$input = floor($input / 60);

$minutes = $input % 60;
$input = floor($input / 60);

return $minutes.":".$seconds;
  $hours = 0;
  $milliseconds = str_replace( "0.", '', $seconds - floor( $seconds ) );

  if ( $seconds > 3600 )
  {
    $hours = floor( $seconds / 3600 );
  }
  $seconds = $seconds % 3600;


  return str_pad( $hours, 2, '0', STR_PAD_LEFT )
       . gmdate( ':i:s', $seconds )
       . ($milliseconds ? ".$milliseconds" : '')
  ;
}

function FileSizeConvert($bytes)
{
    $bytes = floatval($bytes);
        $arBytes = array(
            0 => array(
                "UNIT" => "TB",
                "VALUE" => pow(1024, 4)
            ),
            1 => array(
                "UNIT" => "GB",
                "VALUE" => pow(1024, 3)
            ),
            2 => array(
                "UNIT" => "MB",
                "VALUE" => pow(1024, 2)
            ),
            3 => array(
                "UNIT" => "KB",
                "VALUE" => 1024
            ),
            4 => array(
                "UNIT" => "B",
                "VALUE" => 1
            ),
        );

    foreach($arBytes as $arItem)
    {
        if($bytes >= $arItem["VALUE"])
        {
            $result = strval(round($bytes / $arItem["VALUE"],2))." ".$arItem["UNIT"];
            //$result = str_replace(".", "," , strval(round($result, 2)))." ".$arItem["UNIT"];
            break;
        }
    }
    return $result;
}
?>