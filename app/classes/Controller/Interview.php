<?php

class ControllerInterview extends ControllerMagic
{
    protected $modelName = 'ModelInterview';

    protected function prepForForm()
    {
        $this->set('types', ModelInterviewType::getAllData());
        $this->set('typeIdCol', ModelInterviewType::getIDCol());
    }

}

