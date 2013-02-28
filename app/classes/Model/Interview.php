<?php

class ModelInterview extends ModelApp
{
    protected $in_id;
    protected $in_type_id;
    protected $name;

	protected $dbFields = array(
	   'in_id',
	   'in_type_id',
	   'name',
	);
	protected $readOnly = array(
	);
	protected $requiredFields = array(
	   'name' => 'Name is required',
	   'in_type_id' => 'Interview type is required',
	);
	protected $whatIAm = 'Interview';
	protected $table = 'interviews';
	protected $idCol = 'in_id';
	protected static $WhatIAm = 'Interview';
	protected static $Table = 'interviews';
	protected static $IdCol = 'in_id';
	protected static $AllData = array();
    protected static $sections = array(
        0 => 'Introduction',
        1 => 'Body',
        2 => 'Conclusion',
    );

    /**
     * @return Array
     */
    public function getQuestions()
    {
        return ModelQuestion::findAllBelongingTo($this);
    }

    /**
     * @return ModelInterviewType
     */
    public function getType()
    {
        return ModelInterviewType::findOwner($this);
    }

    public static function getSections()
    {
        return self::$sections;
    }

    protected $createTable = "
CREATE TABLE `interviews` (
  `in_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `in_type_id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`in_id`),
  KEY `in_type_id` (`in_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
";

}

