<?php

namespace App\Services;

use App\Models\User;
use App\Enums\RoleEnum;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Laravel\Socialite\Two\User as GoogleUser;

class GoogleUserService
{
    /**
     * get or create user from google provider.
     *
     * @param \Laravel\Socialite\Two\User $googleUser
     * @return \App\Models\User|null
     */
    public function getUser(GoogleUser $googleUser): ?User
    {
        if ($user = User::where('google_id', $googleUser->getId())->first()) {
            return $user;
        }

        if ($this->isStudentEmail($googleUser->getEmail())) {
            return $this->registerStudent($googleUser);
        }

        return null;
    }

    /**
     * Check is email provided is student email.
     *
     * @param string $email
     * @return bool
     */
    protected function isStudentEmail(string $email): bool
    {
        return Str::endsWith($email, 'students.uii.ac.id');
    }

    /**
     * Create a User with Student Role from provided user.
     *
     * @param \Laravel\Socialite\Two\User $googleUser
     * @return \App\Models\User
     */
    protected function registerStudent(GoogleUser $googleUser): User
    {
        return DB::transaction(function () use ($googleUser) {
            $user = User::make([
                'email' => $googleUser->getEmail(),
                'name' => $googleUser->getName(),
                'avatar' => $googleUser->getAvatar(),
                'google_id' => $googleUser->getId(),
                'nickname' => $googleUser->offsetGet('given_name'),
            ]);
            $user->email_verified_at = now();
            $user->save();
            $user->assignRole(RoleEnum::STUDENT);

            $user->student()->create([
                'nim' => $this->getNimFromEmail($googleUser->getEmail()),
            ]);

            return $user;
        });
    }

    /**
     * Get numerical student id from email provided.
     *
     * @param string $email
     * @return string|null
     */
    protected function getNimFromEmail(string $email): ?string
    {
        $nim = str_replace_last('@students.uii.ac.id', '', $email);

        return is_numeric($nim) ? $nim : null;
    }
}
