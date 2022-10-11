<?php

namespace Dritter\NixHasher;

class Hasher
{
    public static function createFromFile(string $file, string $algorithm = 'sha256'): string
    {
        $hash = hash($algorithm, file_get_contents($file));
        return self::createSRIHash($hash, $algorithm);
    }

    public static function createSRI(string $checksum, string $algorithm = 'sha256'): string
    {
        return $algorithm . '-' . base64_encode(hex2bin($checksum));
    }

    public static function convertToBase32(string $hash): string
    {
        // Port of https://gist.github.com/colemickens/27ad622adfaf8c980f3b5066b21604ba

        $nixCharset = "0123456789abcdfghijklmnpqrsvwxyz";
        $byteArray = array_values(unpack('C*', hex2bin($hash)));
        $hexLen = count($byteArray);
	    $outLen = (count($byteArray)*8-1)/5 + 1;

        $result = '';
        for ($n = $outLen - 1; $n >= 0; $n--) {
            $b = $n * 5;
		    $i = (int)($b / 8);
		    $j = $b % 8;

            $v1 = $byteArray[$i] >> $j;

            if ($i >= $hexLen-1) {
                $v2 = 0;
            } else {
                $v2 = $byteArray[$i+1] << (8 - $j);
            }

            $v = $v1 | $v2;
		    $idx = $v % strlen($nixCharset);

		    $c = $nixCharset[$idx];
            $result .= $c;
        }

        return $result;
    }
}
