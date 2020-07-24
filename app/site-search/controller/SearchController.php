<?php
/**
 * SearchController
 * @package site-search
 * @version 0.0.1
 */

namespace SiteSearch\Controller;

use SiteSearch\Library\Meta;

class SearchController extends \Site\Controller
{
    public function indexAction(){
        $params = [
            'meta'    => Meta::single(),
            'result'  => []
        ];

        $this->res->render('search/index', $params);
        $this->res->send();
    }
}