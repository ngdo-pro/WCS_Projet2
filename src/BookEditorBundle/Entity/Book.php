<?php

namespace BookEditorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Book
 */
class Book
{

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $author;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $facebookLinkUrl;

    /**
     * @var string
     */
    private $imageUrl;

    /**
     * @var \DateTime
     */
    private $releaseDate;

    /**
     * @var string
     */
    private $purchaseOrderImageUrl;

    /**
     * @var string
     */
    private $slug;

    /**
     * @var \DateTime
     */
    private $uploaded;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $pressArticles;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->pressArticles = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Book
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set author
     *
     * @param string $author
     *
     * @return Book
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Book
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set facebookLinkUrl
     *
     * @param string $facebookLinkUrl
     *
     * @return Book
     */
    public function setFacebookLinkUrl($facebookLinkUrl)
    {
        $this->facebookLinkUrl = $facebookLinkUrl;

        return $this;
    }

    /**
     * Get facebookLinkUrl
     *
     * @return string
     */
    public function getFacebookLinkUrl()
    {
        return $this->facebookLinkUrl;
    }

    /**
     * Set imageUrl
     *
     * @param string $imageUrl
     *
     * @return Book
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * Get imageUrl
     *
     * @return string
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * Set releaseDate
     *
     * @param \DateTime $releaseDate
     *
     * @return Book
     */
    public function setReleaseDate($releaseDate)
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    /**
     * Get releaseDate
     *
     * @return \DateTime
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * Set purchaseOrderImageUrl
     *
     * @param string $purchaseOrderImageUrl
     *
     * @return Book
     */
    public function setPurchaseOrderImageUrl($purchaseOrderImageUrl)
    {
        $this->purchaseOrderImageUrl = $purchaseOrderImageUrl;

        return $this;
    }

    /**
     * Get purchaseOrderImageUrl
     *
     * @return string
     */
    public function getPurchaseOrderImageUrl()
    {
        return $this->purchaseOrderImageUrl;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Book
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set uploaded
     *
     * @param \DateTime $uploaded
     *
     * @return Book
     */
    public function setUploaded($uploaded)
    {
        $this->uploaded = $uploaded;

        return $this;
    }

    /**
     * Get uploaded
     *
     * @return \DateTime
     */
    public function getUploaded()
    {
        return $this->uploaded;
    }

    /**
     * Add pressArticle
     *
     * @param \BookEditorBundle\Entity\PressArticle $pressArticle
     *
     * @return Book
     */
    public function addPressArticle(\BookEditorBundle\Entity\PressArticle $pressArticle)
    {
        $this->pressArticles[] = $pressArticle;

        return $this;
    }

    /**
     * Remove pressArticle
     *
     * @param \BookEditorBundle\Entity\PressArticle $pressArticle
     */
    public function removePressArticle(\BookEditorBundle\Entity\PressArticle $pressArticle)
    {
        $this->pressArticles->removeElement($pressArticle);
    }

    /**
     * Get pressArticles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPressArticles()
    {
        return $this->pressArticles;
    }


}
