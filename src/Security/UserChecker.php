<?php
namespace App\Security;

use App\Entity\User;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserCheckerInterface;


class UserChecker implements UserCheckerInterface
{
    /**
     * @param User $user
     */
    public function checkPreAuth(UserInterface $user): void
    {
        if(null === $user->getBannedUntil()){
            return;
        }
        
        $now = new \DateTime();
        if($now < $user->getBannedUntil()){
            throw new AccessDeniedHttpException('Zostałeś zbanowany');
        }
        
    }

    public function checkPostAuth(UserInterface $user): void
    {
        
    }


}