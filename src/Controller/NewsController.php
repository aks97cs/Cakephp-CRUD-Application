<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;


class NewsController extends AppController
{
	function initialize()
	{

	}
	function view()
	{
		$this->set('newvar_value','Hello world');
	}
}