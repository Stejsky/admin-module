<?php

namespace App\AdminModule\Presenters;

use Nette,
    App\Model;


/**
 * Homepage presenter.
 */
class HomepagePresenter extends Nette\Application\UI\Presenter
{

    public function renderDefault()
    {
        $this->template->anyVariable = 'any value';
    }

}