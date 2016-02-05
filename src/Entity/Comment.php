<?php
namespace Entity;
/** @Entity */
class Comment
{
    /**
     * @Id @Column(type="integer")
     * @GeneratedValue
     */
    private $id;
    /** @Column(type="text") */
    private $message;
    /**
     * @ManyToOne(targetEntity="Post", inversedBy="comments")
     * @JoinColumn(name="post_id", referencedColumnName="id")
     */
    private $post;
    /** @Column(type="datetime") */
    private $date;
    /**
     * @ManyToOne(targetEntity="User", inversedBy="comments")
     * @JoinColumn(name="author_id", referencedColumnName="id")
     */
    private $author;

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
     * Set message
     *
     * @param string $message
     *
     * @return Comment
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Comment
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Get string date
     *
     * @return string
     */
    public function getDateString()
    {
        return $this->date->format('Y-m-d H:i:s');
    }

    /**
     * Set post
     *
     * @param \Entity\Post $post
     *
     * @return Comment
     */
    public function setPost(\Entity\Post $post = null)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get post
     *
     * @return \Entity\Post
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * Set author
     *
     * @param \Entity\User $author
     *
     * @return Comment
     */
    public function setAuthor(\Entity\User $author = null)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return \Entity\User
     */
    public function getAuthor()
    {
        return $this->author;
    }
}
