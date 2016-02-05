<?php
namespace Entity;
/**
 * @Entity(repositoryClass="Repository\PostRepository")
 * @Table(name="post")
 */
class Post
{
    /**
     * @Id @Column(type="integer")
     * @GeneratedValue
     */
    private $id;
    /** @Column(type="string", length=200) */
    private $subject;
    /** @Column(type="datetime") */
    private $date;
    /** @Column(type="text") */
    private $message;
    /**
     * @OneToMany(targetEntity="Entity\Comment", mappedBy="post", cascade={"persist", "remove"})
     */
    private $comments;
    /**
     * @ManyToOne(targetEntity="User", inversedBy="posts")
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
     * Set subject
     *
     * @param string $subject
     *
     * @return Post
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Post
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
     * Set message
     *
     * @param string $message
     *
     * @return Post
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
     * Constructor
     */
    public function __construct()
    {
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add comment
     *
     * @param \Entity\Comment $comment
     *
     * @return Post
     */
    public function addComment(\Entity\Comment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \Entity\Comment $comment
     */
    public function removeComment(\Entity\Comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set author
     *
     * @param \Entity\User $author
     *
     * @return Post
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
