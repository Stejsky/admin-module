<?php

namespace App\AdminModule\Presenters;

use Nette,
    App\Model;

/**
 * Base presenter for all admin presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{


    public function startup()
    {
        parent::startup();

        $user = $this->getUser();
        if ($this->getName() != 'Admin:Login' && !$user->isLoggedIn()) {
            $this->redirect('Login:');
        }
    }
}
