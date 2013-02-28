<?php

class ModelInterviewType extends ModelApp
{
    protected $in_type_id;
    protected $name;

	protected $dbFields = array(
	   'in_type_id',
	   'name',
	);
	protected $readOnly = array(
	);
	protected $requiredFields = array(
	   'name' => 'Name is required',
	);
	protected $whatIAm = 'Interview Type';
	protected $table = 'interview_types';
	protected $idCol = 'in_type_id';
	protected static $WhatIAm = 'Interview Type';
	protected static $Table = 'interview_types';
	protected static $IdCol = 'in_type_id';
	protected static $AllData = array();

    /**
     * @return Array
     */
    public function getInterviews()
    {
        return ModelInterview::findAllBelongingTo($this);
    }

    protected $createTable = "
CREATE TABLE `interview_types` (
  `in_type_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`in_type_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
";
}

