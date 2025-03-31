<?php

/** @noinspection PhpUnused */

declare(strict_types=1);

namespace LMS\Routes\Controller;

/* * *************************************************************
 *
 *  Copyright notice
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 * ************************************************************* */

use LMS\Routes\Service\Router;
use Psr\Http\Message\ResponseInterface;
use Symfony\Component\Routing\Router as SymfonyRouter;
use TYPO3\CMS\Backend\Template\ModuleTemplateFactory;
use TYPO3\CMS\Extbase\Mvc\Controller\ActionController;

/**
 * @psalm-suppress PropertyNotSetInConstructor
 *
 * @author         Sergey Borulko <borulkosergey@icloud.com>
 */
class ManagementController extends ActionController
{
    private SymfonyRouter $router;

    public function __construct(private readonly ModuleTemplateFactory $moduleTemplateFactory)
    {
    }

    public function injectRouter(Router $router): void
    {
        $this->router = $router->getRouter();
    }

    /**
     * Render existing routes.
     */
    public function pingAction(): ResponseInterface
    {
        $json = (string)json_encode(
            [
                'status' => 'pong',
            ],
        );

        return $this->jsonResponse($json);
    }

    /**
     * Render existing routes.
     */
    public function indexAction(): ResponseInterface
    {
        $moduleTemplate = $this->moduleTemplateFactory->create($this->request);
        $routes = $this->router->getRouteCollection();

        $moduleTemplate->assign('routes', $routes);

        return $moduleTemplate->renderResponse('Management/Index');
    }

    /**
     * @psalm-suppress UndefinedMethod
     * @psalm-suppress PossiblyNullReference
     */
    public function showAction(string $name): ResponseInterface
    {
        $moduleTemplate = $this->moduleTemplateFactory->create($this->request);

        $uri = $this->request->getUri();
        $host = "{$uri->getScheme()}://{$uri->getHost()}";

        $route = $this->router->getRouteCollection()->get($name);

        $moduleTemplate->assign('route', $route->setHost($host));

        return $moduleTemplate->renderResponse('Management/Show');
    }
}
