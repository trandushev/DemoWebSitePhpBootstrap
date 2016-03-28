<?php

class UserCollection extends Collection {

    protected $entity = 'UsersEntity';
    protected $table  = 'users';


    public function save(Entity $entity)
    {
        $dataInput = array(
           'username' => $entity->getUsername(),
           'password' =>$entity->getPassword(),
           'description' => $entity->getDescription(),
           'email'   => $entity->getEmail(),
        );

        if ($entity->getId() > 0) {
            $this->update($entity->getId(), $dataInput);
        } else {
            $this->create($dataInput);
        }
    }
}
