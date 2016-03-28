<?php

class GuideCollection extends Collection {

    protected $entity = 'GuideEntity';
    protected $table = 'guide';

    public function  save(Entity $entity)
    {
        $dataInput = array(
            'id' => $entity->getId(),
            'name' => $entity->getName(),
            'description' => $entity->getDescription(),
            'image' => $entity->getImage(),
        );

        if ($entity->getId() > 0){
            $this->update($entity->get(), $dataInput);
        }else{
            $this->create($dataInput);
        }
    }


}