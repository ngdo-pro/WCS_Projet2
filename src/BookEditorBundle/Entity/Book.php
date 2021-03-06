<?php

namespace BookEditorBundle\Entity;

use Cocur\Slugify\Slugify;
use Doctrine\Common\Collections\ArrayCollection;
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
        $slug = new Slugify();
        $this->slug = $slug->slugify($this->getTitle());
        $this->pressArticles = new \Doctrine\Common\Collections\ArrayCollection();
    }
    /**
     * @var boolean
     */
    private $tag = 0;



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
    public function setSlug($title)
    {
        $slug = new Slugify();
        $this->slug = $slug->slugify($title);

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
     * Set tag
     *
     * @param boolean $tag
     *
     * @return Book
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return boolean
     */

    public function getTag()
    {
        return (boolean)$this->tag;
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

    public function setPressArticles(PressArticle $pressArticles){
        if (gettype($pressArticles) == "array") {
            $pressArticles = new ArrayCollection($pressArticles);
        }

        foreach($pressArticles as $pressArticle)
        {
            $pressArticle->setBook($this);
        }

        $this->pressArticles = $pressArticles;
    }

    /**
     *  path to cover images upload directory
     */
    const SERVER_PATH_TO_COVER_IMAGE_FOLDER = "../web/uploads/img/covers/";
    /**
     *  path to purchase order images upload directory
     */
    const SERVER_PATH_TO_PURCHASE_ORDER_IMAGE_FOLDER = "../web/uploads/img/purchaseOrder/";
    /**
     * Unmapped property to handle coverImg uploads
     */
    private $coverImg;
    /**
     * Unmapped property to handle purchaseOrderImg uploads
     */
    private $purchaseOrderImg;

    /**
     * @return UploadedFile
     */
    public function getCoverImg()
    {
        return $this->coverImg;
    }
    /**
     * @param UploadedFile $coverImg
     */
    public function setCoverImg(UploadedFile $coverImg = null)
    {
        $this->coverImg = $coverImg;
    }
    /**
     * @return UploadedFile
     */
    public function getPurchaseOrderImg()
    {
        return $this->purchaseOrderImg;
    }
    /**
     * @param UploadedFile $purchaseOrderImg
     */
    public function setPurchaseOrderImg(UploadedFile $purchaseOrderImg = null)
    {
        $this->purchaseOrderImg = $purchaseOrderImg;
    }


    /**
     * @param $path
     * @param UploadedFile $getFile
     */
    private function uploadOneFile($path, UploadedFile $getFile){
        $getFile->move(
            $path,
            $getFile->getClientOriginalName()
        );
    }
    /**
     * @param string $filename
     * Manages the copying of the file to the relevant place on the server
     */
    public function upload($filename)
    {
        switch ($filename){
            case 'coverImg':
                $getFile = $this->getCoverImg();
                if (null === $getFile) {
                    return;
                }
                $path = self::SERVER_PATH_TO_COVER_IMAGE_FOLDER;
                if ($this->imageUrl != NULL){
                    $fs = new Filesystem();
                    $fs->remove($path.$this->imageUrl);
                }
                $this->uploadOneFile($path, $getFile);
                $this->imageUrl = $getFile->getClientOriginalName();
                $this->setCoverImg(null);
                break;
            default:
                $getFile = $this->getPurchaseOrderImg();
                if (null === $getFile) {
                    return;
                }
                $path = self::SERVER_PATH_TO_PURCHASE_ORDER_IMAGE_FOLDER;
                if ($this->purchaseOrderImageUrl != NULL){
                    $fs = new Filesystem();
                    $fs->remove($path.$this->purchaseOrderImageUrl);
                }
                $this->uploadOneFile($path, $getFile);
                $this->purchaseOrderImageUrl = $getFile->getClientOriginalName();
                $this->setPurchaseOrderImg(null);
        }
    }

    /**
     *
     */
    public function lifecycleFileUpload()
    {
        $this->upload('coverImg');
        $this->upload('purchaseOrderImg');
    }

    /**
     * Updates the hash value to force the preUpdate and postUpdate events to fire
     */
    public function refreshuploaded()
    {
        $this->setUploaded(new \DateTime());
    }
}
