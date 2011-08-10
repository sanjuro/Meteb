<?php

/**
 * BaseArticleAuthor
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $article_id
 * @property integer $author_id
 * 
 * @method integer       getArticleId()  Returns the current record's "article_id" value
 * @method integer       getAuthorId()   Returns the current record's "author_id" value
 * @method ArticleAuthor setArticleId()  Sets the current record's "article_id" value
 * @method ArticleAuthor setAuthorId()   Sets the current record's "author_id" value
 * 
 * @package    projectWithDoctrine
 * @subpackage model
 * @author     Christian Kerl
 * @version    SVN: $Id: BaseArticleAuthor.class.php 26442 2010-01-10 00:21:58Z chrisk $
 */
abstract class BaseArticleAuthor extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('article_author');
        $this->hasColumn('article_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
        $this->hasColumn('author_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        
    }
}