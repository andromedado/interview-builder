<?php

class ControllerQuestion extends ControllerMagic
{
    protected $modelName = 'ModelQuestion';

    protected function load()
    {
        $this->set('sections', ModelInterview::getSections());
    }

    protected function prepForForm()
    {
        $this->set('interviews', ModelInterview::getAllData());
        $this->set('interviewIdCol', ModelInterview::getIDCol());
    }

}

