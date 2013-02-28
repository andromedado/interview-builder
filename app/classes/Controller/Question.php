<?php

class ControllerQuestion extends ControllerMagic
{
    protected $modelName = 'ModelQuestion';

    protected function load()
    {
        $this->set('sections', ModelInterview::getSections());
    }

    protected function determineSettings($invoked, array $args)
    {
        $settings = array();
        switch ($invoked) {
            case 'create':
                if (!empty($args)) {
                    $settings['Model'] = new ModelQuestion;
                    $settings['Model']->in_id = $args[0];
                    if (isset($args[1])) {
                        $settings['Model']->section = $args[1];
                    }
                }
            break;
        }
        return array_merge(parent::determineSettings($invoked, $args), $settings);
    }

    protected function prepForForm()
    {
        $this->set('interviews', ModelInterview::getAllData());
        $this->set('interviewIdCol', ModelInterview::getIDCol());
        $this->set('checkedOptions', array('0' => 'No', '1' => 'Yes'));
    }

}

