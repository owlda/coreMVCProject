<?php

class ClientVIP extends Client implements Benefits_VIP
{
    private $id_VIP;

    public function __construct($id, $name, $email, $id_VIP)
    {
        parent::__construct($id, $name, $email);
              $this -> id_VIP;

    }

    public static function bonusVIP()
    {
        // TODO: Implement bonusVIP() method.
    }
}