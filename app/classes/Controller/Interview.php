<?php

class ControllerInterview extends ControllerMagic
{
    protected $modelName = 'ModelInterview';

    protected function load()
    {
        $this->set('sections', ModelInterview::getSections());
    }

    public function review($id = null)
    {
        $this->set('newQuestionHref', FilterRoutes::buildUrl(array('Question', 'create', $id)));
        return parent::review($id);
    }

    protected function post_review()
    {
        $this->set('questions', Model::extractDataFromArray($this->model->getQuestions()));
    }

    protected function prepForForm()
    {
        $this->set('types', ModelInterviewType::getAllData());
        $this->set('typeIdCol', ModelInterviewType::getIDCol());
    }

}

