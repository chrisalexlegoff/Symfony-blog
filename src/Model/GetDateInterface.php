<?php

namespace App\Model;

interface GetDateInterface {

    public function getCreatedAt(): ?\DateTimeInterface;

    public function setCreatedAt(\DateTimeInterface $createdAt);

    public function getUpdatedAt(): ?\DateTimeInterface;
    
    public function setUpdatedAt(?\DateTimeInterface $updatedAt);

}