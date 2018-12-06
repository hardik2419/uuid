<?php

namespace App\Services;

use App\Models\User;
use App\Models\SocialAccount;
use Laravel\Socialite\Two\User as ProviderUser;

class SocialAccountsService
{
    /**
     * Find or create user instance by provider user instance and provider name.
     *
     * @param ProviderUser $providerUser
     * @param string $provider
     *
     * @return User
     */
    public function findOrCreate(ProviderUser $providerUser, string $provider): User
    {
        $linkedSocialAccount = SocialAccount::where('provider_name', $provider)
            ->where('provider_id', $providerUser->getId())
            ->first();
        if ($linkedSocialAccount) {
            return $linkedSocialAccount->user;
        } else {
            $user = null;
            if ($email = $providerUser->getEmail()) {
                $user = User::where('email', $email)->first();
            }
            if (! $user) {
                $user = User::create([
                    'first_name' => $providerUser->getName(),
                    'last_name' => $providerUser->getName(),
                    'email' => $providerUser->getEmail(),
                ]);
            }
            $user->socialAccounts()->create([
                'provider_id' => $providerUser->getId(),
                'provider_name' => $provider,
                'provider_email' => $providerUser->getEmail(),
                'user_id' => $user->id,
                //'provider_phone' => $providerUser->getEmail(),
            ]);
            return $user;
        }
    }
}
