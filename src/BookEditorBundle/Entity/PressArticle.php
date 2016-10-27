<?php

namespace BookEditorBundle\Entity;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * PressArticle
 */
class PressArticle
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $imageUrl;

    private $img;

    const SERVER_PATH_TO_PRESS_IMAGE_FOLDER = "../web/uploads/img/pressArticle/";


    /**
     * @return UploadedFile
     */
    public function getImg()
    {
        return $this->img;
    }
    /**
     * @param UploadedFile $img
     */
    public function setImg(UploadedFile $img = null)
    {
        $this->img = $img;
    }

    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getImg()) {
            return;
        }

        // we use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and target filename as params
        $this->getImg()->move(
            self::SERVER_PATH_TO_PRESS_IMAGE_FOLDER,
            $this->getImg()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->filename = $this->getImg()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->setImg(null);
    }

    /**
     * Lifecycle callback to upload the file to the server
     */
    public function lifecycleFileUpload()
    {
        $this->upload();
    }

    /**
     * Updates the hash value to force the preUpdate and postUpdate events to fire
     */
    public function refreshUpdated()
    {
        $this->setUploaded(new \DateTime());
    }

    /**
     * Get id
     *
     * @return int
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
     * @return PressArticle
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
     * Set imageUrl
     *
     * @param string $imageUrl
     *
     * @return PressArticle
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
     * @var \BookEditorBundle\Entity\Book
     */
    private $book;


    /**
     * Set book
     *
     * @param \BookEditorBundle\Entity\Book $book
     *
     * @return PressArticle
     */
    public function setBook(\BookEditorBundle\Entity\Book $book = null)
    {
        $this->book = $book;

        return $this;
    }

    /**
     * Get book
     *
     * @return \BookEditorBundle\Entity\Book
     */
    public function getBook()
    {
        return $this->book;
    }
    /**
     * @var \DateTime
     */
    private $uploaded;


    /**
     * Set uploaded
     *
     * @param \DateTime $uploaded
     *
     * @return PressArticle
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
}
