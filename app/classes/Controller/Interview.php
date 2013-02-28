<?php

class ControllerInterview extends ControllerMagic
{
    protected $modelName = 'ModelInterview';

    protected function load()
    {
        $this->set('sections', ModelInterview::getSections());
    }

    protected function prepForForm()
    {
        $this->set('types', ModelInterviewType::getAllData());
        $this->set('typeIdCol', ModelInterviewType::getIDCol());
    }

}

