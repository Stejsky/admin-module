<?php

namespace App\AdminModule\Presenters;

use Nette,
    App\Model;


/**
 * Login presenter.
 */
class LoginPresenter extends BasePresenter
{

    // Přihlašovací formulář
    protected function createComponentSignInForm()
    {
        $form = new Nette\Application\UI\Form;
        $form->addText('username', 'Uživatelské jméno:')
            ->setRequired('Prosím vyplňte své uživatelské jméno.');

        $form->addPassword('password', 'Heslo:')
            ->setRequired('Prosím vyplňte své heslo.');

        $form->addCheckbox('remember', 'Zůstat přihlášen');

        $form->addSubmit('send', 'Přihlásit');

        // zavolá metodu signInFormSucceeded() při úspěšném odeslání
        $form->onSuccess[] = $this->signInFormSucceeded;
        return $form;
    }

    public function signInFormSucceeded($form)
    {
        $values = $form->values;

        try {
            $this->getUser()->login($values->username, $values->password);
            $this->redirect('Homepage:');

        } catch (Nette\Security\AuthenticationException $e) {
            $form->addError('Nesprávné přihlašovací jméno nebo heslo.');
        }
    }

    // Odhlašování

    public function actionOut()
    {
        $this->getUser()->logout();
        $this->flashMessage('Odhlášení bylo úspěšné.');
        $this->redirect('Login:');
    }
}

