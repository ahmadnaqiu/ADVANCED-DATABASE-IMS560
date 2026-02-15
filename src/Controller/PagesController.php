<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

class PagesController extends AppController
{
    public function display(string ...$path)
    {
        $page = $path[0] ?? 'home';

        if ($page === 'dashboard') {
            $this->viewBuilder()->setLayout('dashboard');
        }

        try {
            return $this->render(implode('/', $path));
        } catch (MissingTemplateException $exception) {
            if (Configure::read('debug')) {
                throw $exception;
            }
            throw new NotFoundException();
        }
    }
}