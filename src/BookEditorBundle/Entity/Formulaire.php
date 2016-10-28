<?php

namespace BookEditorBundle\Entity;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\MinLength;
use Symfony\Component\Validator\Constraints\MaxLength;

class Formulaire
{
    protected $fMail;
    protected $fFirstname;
    protected $fLastname;
    protected $fMessage;

    /**
     * @return mixed
     */
    public function getFMail()
    {
        return $this->fMail;
    }

    /**
     * @param mixed $fMail
     */
    public function setFMail($fMail)
    {
        $this->fMail = $fMail;
    }

    /**
     * @return mixed
     */
    public function getFFirstname()
    {
        return $this->fFirstname;
    }

    /**
     * @param mixed $fFirstname
     */
    public function setFFirstname($fFirstname)
    {
        $this->fFirstname = $fFirstname;
    }

    /**
     * @return mixed
     */
    public function getFLastname()
    {
        return $this->fLastname;
    }

    /**
     * @param mixed $fLastname
     */
    public function setFLastname($fLastname)
    {
        $this->fLastname = $fLastname;
    }

    /**
     * @return mixed
     */
    public function getFMessage()
    {
        return $this->fMessage;
    }

    /**
     * @param mixed $fMessage
     */
    public function setFMessage($fMessage)
    {
        $this->fMessage = $fMessage;
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('fFirstname', new NotBlank());
        $metadata->addPropertyConstraint('fLastname', new NotBlank());
        $metadata->addPropertyConstraint('fMail', new Email());
        $metadata->addPropertyConstraint('fMessage', new NotBlank());
    }

}