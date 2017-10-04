 <?php 

/**
 * Article class 
 */
class Article
{
    /**
     * summary
     */

    private $id;
    private $firstname;
    private $lastname;
    private $title;
    private $content;
    private $creationDate;

    private $comments = [];

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

    public function getTitle()
    {
        return $this->title;
    }
    
    public function getContent()
    {
        return $this->content;
    }

    public function getCreationDate()
    {
        return $this->creationDate;
    }

    public function getComments()
    {
        return $this->comments;
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
            $this->firstname = $firstname;
        }        
    }

    public function setLastname($lastname)    
    {
        if (!empty(trim($lastname))) {
            $this->lastname = $lastname;
        }        
    }

    public function setTitle($title)
    {
        if (!empty(trim($title))) {
            $this->title = $title;
        }
    }

    public function setContent($content)
    {
        if (!empty($content)) {
            $this->content = $content;
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

    public function setComments(Comment $comment)
    {   
        if (!empty($comment)) {
            $this->comments[] = $comment;
        }
    }
}