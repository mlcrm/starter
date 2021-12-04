<?php

namespace App\Model\Dashboard\User;

use App\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;

class UserListModel
{
    private ArrayCollection $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getUsers(): ArrayCollection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)){
            $this->users->add($user);
        }
        return $this;
    }

    public function removeUser(User $user): self
    {
        $this->users->removeElement($user);
        return $this;
    }

}
