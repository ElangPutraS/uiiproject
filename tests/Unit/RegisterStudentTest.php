<?php

namespace Tests\Unit;

use Tests\TestCase;
use Laravel\Socialite\Two\User as GoogleUser;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\GoogleUserService;
use App\Enums\RoleEnum;

class RegisterStudentTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->seed([
            \RoleSeeder::class
        ]);
    }

    /**
     * test registering student.
     *
     * @return void
     */
    public function testRegisterStudent()
    {
        $googleUser = $this->fakeGoogleUser($nim = '12312332');
        $service = $this->app->make(GoogleUserService::class);

        $user = $service->getUser($googleUser);
        $this->assertNotNull($user);
        $this->assertContains(RoleEnum::STUDENT, $user->roles->pluck('name'));
        $this->assertEquals($nim, $user->student->nim);
    }

    /**
     * Create a fake google google oauth user.
     *
     * @param string $nim
     * @return \Laravel\Socialite\Two\User
     */
    protected function fakeGoogleUser($nim = '12312321'): GoogleUser
    {
        $googleUser = new GoogleUser;
        $id = $this->faker->randomDigit(21);
        $firstName = $this->faker->firstName;
        $lastName = $this->faker->lastName;
        $email = $nim . '@students.uii.ac.id';
        $avatar = $this->faker->imageUrl('150', '150');
        $googleUser->setRaw([
            'sub' => $id,
            'name' => $firstName . ' ' . $lastName,
            'given_name' => $firstName,
            'family_name' => $lastName,
            'profile' => 'https://plus.google.com/'. $id,
            'picture' => $avatar,
            'email' => $email,
            'email_verified' => true,
            'locale' => 'en',
            'id' => $id,
            'verified_email' => true,
            'link' => 'https://plus.google.com/'. $id,
        ]);
        $googleUser->map([
            'id' => $id,
            'name' => $firstName . ' ' . $lastName,
            'email' => $email,
            'avatar' => $avatar,
            'avatar_original' => $avatar,
            'token' => 'ya29.Glv4BqBQWnQdgbYU1sQesiTmvJrKCx-fq1BjdxsFuPIVQUmT-ai860Nhb0G_QFn-AsdOxujpLwGN3EsKyVfwfqxicEAeJ9YFnxr3P3OulSR7gR_WTY39tHngPvqv',
            'expiresIn' => 3600
        ]);

        return $googleUser;
    }
}
