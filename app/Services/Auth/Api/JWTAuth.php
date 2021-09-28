<?php

namespace VanguardDK\Services\Auth\Api;

class JWTAuth extends \Tymon\JWTAuth\JWTAuth
{
    use ExtendsJwtValidation;
}
