<?php

namespace App;

abstract class AbstractProfiler implements Profile
{
    protected function getUserId($user)
    {
        return $user->id;
    }
    protected function getUserName($user)
    {
        return $user->name;
    }
    abstract public function show($user);
}