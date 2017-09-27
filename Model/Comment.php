<?php

/**
 * Comment class
 */
class Comment
{
    protected $id;
    protected $firstname;
    protected $lastname;
    protected $content;
    protected $creationDate;
    protected $reported;
    protected $articleId;

    public function __construct(Array $data)
    {
        $this->hydrate($data);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

	public function getContent()
    {
        return $this->content;
    }

    public function getCreationDate()
    {
        return $this->creationDate;
    }

    public function getReported()
    {
        return $this->reported;
    }

    public function getArticleId()
    {
        return $this->articleId;
    }

    public function setId($id)
    {   
        if (!empty($id)) {
            $this->id = $id;
        }
    }

    public function setFirstname($firstname)
    {   
        if (!empty(trim($firstname))) {
            $this->firstname = htmlspecialchars($firstname);
        }        
    }

    public function setLastname($lastname)
    {
        if (!empty(trim($lastname))) {
            $this->lastname = htmlspecialchars($lastname);
        }
    }

    public function setContent($content)
    {
        if (!empty(trim($content))) {
            $this->content = htmlspecialchars($content);
        }
    }

    public function setCreationDate($creationDate)
    {
        if (!empty($creationDate)) {
            $this->creationDate = $creationDate;
        }        
    }

    public function getAuthor()
    {
        return $this->getFirstname() . " " . $this->getLastname();
    }

    public function setReported($reported)
    {   
        if (!empty($reported)) {
            $this->reported = $reported;
        }
    }

    public function setArticleId($articleId)
    {
        if (!empty($articleId)) {
            $this->articleId = $articleId;
        }
    }

    public function hydrate($data)
    {   
        foreach ($data as $key => $value) {

            $newKey = ucfirst($key);
            $method = "set" . $newKey;

            if (is_callable(array($this, $method))) {
                $this->$method($value);
            }
        }

        return $this;
    }
}