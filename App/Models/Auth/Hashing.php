<?php
namespace Models\Auth;

/**
 * @author Peter Mwambi
 * @time Wed Feb 17 2021 11:54:04 GMT+0300 (East Africa Time)
 * @content String Encryption / Decryption 
 */

class Hashing
{

    /**
     * @var string $_encryption_key
     * 
     * The SSL key to encrypt or decrypt data 
     */
    private static $_encryption_key = "fa7b9c34d95aadcc2713b28ffa01810df40742ae59f391c01fd0d6d7a86a1cba";

    /**
     * @var string $_encryption_algorithm
     * 
     * The encryption algorithm
     */
    private static $_encryption_algorithm = 'AES-256-CBC';


    public static function encrypt(string $data)
    {
        $EncryptionKey = base64_decode(self::$_encryption_key);
        $InitializationVector = openssl_random_pseudo_bytes(openssl_cipher_iv_length(self::$_encryption_algorithm));
        $EncryptedText = openssl_encrypt($data, self::$_encryption_algorithm, $EncryptionKey, 0, $InitializationVector);
        return base64_encode($EncryptedText . '::' . $InitializationVector);
    }

    public static function decrypt(string $cipher)
    {
        $EncryptionKey = base64_decode(self::$_encryption_key);
        list($Encrypted_Data, $InitializationVector) = array_pad(explode('::', base64_decode($cipher), 2), 2, null);
        return openssl_decrypt($Encrypted_Data, self::$_encryption_algorithm, $EncryptionKey, 0, $InitializationVector);
    }
}