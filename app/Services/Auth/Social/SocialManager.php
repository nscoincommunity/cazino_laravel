<?php

namespace VanguardDK\Services\Auth\Social;

use Laravel\Socialite\Contracts\User as SocialUser;
use VanguardDK\Repositories\Role\RoleRepository;
use VanguardDK\Repositories\User\UserRepository;
use VanguardDK\Support\Enum\UserStatus;
use jeremykenedy\LaravelRoles\Models\Role;

class SocialManager
{
    use ManagesSocialAvatarSize;

    /**
     * @var UserRepository
     */
    private $users;
    /**
     * @var RoleRepository
     */
    private $roles;

    /**
     * SocialManager constructor.
     * @param UserRepository $users
     * @param RoleRepository $roles
     */
    public function __construct(UserRepository $users, RoleRepository $roles)
    {
        $this->users = $users;
        $this->roles = $roles;
    }

    /**
     * Associate social user with given provider. If user with the same email address
     * retrieved from social network exists in our database, we will just associate it
     * with provided social account. If not, user will be created.
     *
     * @param SocialUser $socialUser
     * @param string $provider
     * @return mixed|null|\VanguardDK\User
     */
    public function associate(SocialUser $socialUser, $provider)
    {
        $user = $this->users->findByEmail($socialUser->getEmail());

        if (! $user) {
            // User with email retrieved from social auth provider does not
            // exist in our database. That means that we have to create new user here
            list($firstName, $lastName) = $this->parseUserFullName($socialUser);

            //$role = $this->roles->findByName('User');
			
			$role = Role::where('name', '=', 'User')->first();  //choose the default role upon user creation.
			
            $user = $this->users->create([
                'email' => $socialUser->getEmail(),
                'password' => str_random(10),
                'first_name' => $firstName,
                'last_name' => $lastName,
				'username' => $socialUser->getNickname(),
                'status' => UserStatus::ACTIVE,
                'avatar' => $this->getAvatarForProvider($provider, $socialUser),
                'role_id' => $role->id
            ]);
			
			$user->attachRole($role);
        }

        // Associate social account with user account inside our application
        $this->users->associateSocialAccountForUser($user->id, $provider, $socialUser);

        return $user;
    }

    /**
     * Parse User's name from his social network account.
     *
     * @param SocialUser $user
     * @return array
     */
    private function parseUserFullName(SocialUser $user)
    {
        $name = $user->getName();

        if (strpos($name, " ") !== false) {
            return explode(" ", $name, 2);
        }

        return [$name, ''];
    }
}
