<?php

class ModelQuestion extends ModelApp
{
    const SHORT_LENGTH = 30;

    protected $qu_id;
    protected $in_id;
    protected $section = '1';
    protected $sortOrder;
    protected $name;
    protected $text;
    protected $code;
    protected $defaultCheck = '1';

    protected $checked;
    protected $shortText;

    protected $dbFields = array(
        'qu_id',
        'in_id',
        'section',
        'sortOrder',
        'name',
        'text',
        'code',
        'defaultCheck',
    );
    protected $readOnly = array(
        'checked', 'shortText',
    );
    protected $requiredFields = array(
        'name' => 'Name is required',
        'in_id' => 'Interview is required',
        'text' => 'Text is required',
    );
    protected $whatIAm = 'Question';
    protected $table = 'questions';
    protected $idCol = 'qu_id';
    protected static $WhatIAm = 'Question';
    protected static $Table = 'questions';
    protected static $IdCol = 'qu_id';
    protected static $sortField = array('section', 'sortOrder');
    protected static $AllData = array();

    protected function load()
    {
        $this->checked = $this->defaultCheck === '1';
        if (strlen($this->text) > self::SHORT_LENGTH) {
            $this->shortText = substr($this->text, 0, self::SHORT_LENGTH - 3) . '...';
        } else {
            $this->shortText = $this->text;
        }
    }

    protected $createTable = "
CREATE TABLE `questions` (
  `qu_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `in_id` int(11) NOT NULL,
  `section` enum('0','1','2') NOT NULL DEFAULT '1',
  `sortOrder` tinyint(3) unsigned NOT NULL,
  `name` varchar(80) NOT NULL DEFAULT '',
  `text` text NOT NULL,
  `code` text NOT NULL,
  `defaultCheck` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`qu_id`),
  KEY `in_id` (`in_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
}

