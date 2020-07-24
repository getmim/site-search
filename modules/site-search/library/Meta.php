<?php
/**
 * Meta
 * @package site-search
 * @version 0.0.1
 */

namespace SiteSearch\Library;


class Meta
{
    static function single(){
        $result = [
            'head' => [],
            'foot' => []
        ];

        $home_url = \Mim::$app->router->to('siteHome');

        $deff = \Mim::$app->config->name;

        $site_setting = module_exists('site-setting');

        $std_metas = ['title','description','keywords'];
        $meta = (object)[];
        foreach($std_metas as $name)
            $meta->$name = ($site_setting?\Mim::$app->setting->{'search_'.$name}:NULL) ?? $deff;

        $result['head'] = [
            'description'       => $meta->description,
            'published_time'    => \Mim::$app->config->install,
            'schema.org'        => [],
            'type'              => 'website',
            'title'             => $meta->title,
            'updated_time'      => date('c'),
            'url'               => $home_url,
            'metas'             => []
        ];

        // schema page
        $result['head']['schema.org'][] = [
            '@context'      => 'http://schema.org',
            '@type'         => 'SearchResultsPage',
            'name'          => $meta->title,
            'description'   => $meta->description,
            'headline'      => $meta->description,
            'publisher'     => \Mim::$app->meta->schemaOrg( \Mim::$app->config->name ),
            'url'           => \Mim::$app->router->to('siteSearch')
        ];

        return $result;
    }
}