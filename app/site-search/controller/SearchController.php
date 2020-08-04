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
        $query = $this->req->getQuery('q');
        
        $params = [
            'meta'    => Meta::single($query),
            'result'  => []
        ];

        $this->res->render('search/index', $params);
        $this->res->send();
    }
}