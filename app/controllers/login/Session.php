<?php

class Session
{
    public function __construct
    (
        public string $username,
        public string $role,
        public string $akses
    )
    {}

}