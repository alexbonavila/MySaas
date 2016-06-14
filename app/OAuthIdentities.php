<?php

namespace App;

trait OAuthIdentities
{
    /**
     * Get OAuth identities
     */
    public function oauthIdentities()
    {
        return $this->hasMany(\Acacha\Socialite\OAuthIdentity::class);
    }
}