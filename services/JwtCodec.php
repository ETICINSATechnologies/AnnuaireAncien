<?php

class JwtCodec
{
    public static function encode(array $payload): String
    {
        $alg = "HS256";
        $hash = "sha256";
        $secretKey = "thisIsAVerySecretKey";

        // creation of the header
        $header = json_encode(array(
            "alg" => $alg,
            "typ" => "JWT"
        ));

        // creation of the payload
        $payload = json_encode($payload);

        // encode the header and the payload
        $base64UrlHeader = self::encodeBase64($header);
        $base64UrlPayload = self::encodeBase64($payload);

        // create signature
        $signature = hash_hmac($hash, $base64UrlHeader . "." . $base64UrlPayload, $secretKey, true);

        // encode signature
        $base64UrlSignature = self::encodeBase64($signature);

        // return the token
        return $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
    }

    public static function decode(String $jwt)
    {
        $hash = "sha256";
        $secretKey = "thisIsAVerySecretKey";

        [$base64UrlHeader, $base64UrlPayload, $base64UrlSignature] = explode('.', $jwt);
        $signature = hash_hmac($hash, $base64UrlHeader . "." . $base64UrlPayload, $secretKey, true);

        // check if the $signature is the same as expected
        if ($base64UrlSignature == self::encodeBase64($signature ))
        {
            return json_decode(self::decodeBase64($base64UrlPayload), true);
        }

        return null;
    }

    public static function encodeBase64($data)
    {
        return str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($data));
    }

    public static function decodeBase64($data)
    {
        return base64_decode($data);
    }
}