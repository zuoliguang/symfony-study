<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($rawPathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($rawPathinfo);
        $trimmedPathinfo = rtrim($pathinfo, '/');
        $context = $this->context;
        $request = $this->request ?: $this->createRequest($pathinfo);
        $requestMethod = $canonicalMethod = $context->getMethod();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if ('/_profiler' === $trimmedPathinfo) {
                    $ret = array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                    if ('/' === substr($pathinfo, -1)) {
                        // no-op
                    } elseif ('GET' !== $canonicalMethod) {
                        goto not__profiler_home;
                    } else {
                        return array_replace($ret, $this->redirect($rawPathinfo.'/', '_profiler_home'));
                    }

                    return $ret;
                }
                not__profiler_home:

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ('/_profiler/search' === $pathinfo) {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ('/_profiler/search_bar' === $pathinfo) {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_phpinfo
                if ('/_profiler/phpinfo' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler_open_file
                if ('/_profiler/open' === $pathinfo) {
                    return array (  '_controller' => 'web_profiler.controller.profiler:openAction',  '_route' => '_profiler_open_file',);
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        // homepage
        if ('' === $trimmedPathinfo) {
            $ret = array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
            if ('/' === substr($pathinfo, -1)) {
                // no-op
            } elseif ('GET' !== $canonicalMethod) {
                goto not_homepage;
            } else {
                return array_replace($ret, $this->redirect($rawPathinfo.'/', 'homepage'));
            }

            return $ret;
        }
        not_homepage:

        if (0 === strpos($pathinfo, '/study')) {
            // study_index
            if ('/study/index' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\StudyController::indexAction',  '_route' => 'study_index',);
            }

            // app_study_api
            if ('/study/api' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\StudyController::apiAction',  '_route' => 'app_study_api',);
            }

            // app_study_rediect
            if ('/study/rediect' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\StudyController::rediectAction',  '_route' => 'app_study_rediect',);
            }

            // app_study_exception
            if ('/study/exception' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\StudyController::exceptionAction',  '_route' => 'app_study_exception',);
            }

            if (0 === strpos($pathinfo, '/study/get')) {
                // study_getinfo
                if (preg_match('#^/study/get/(?P<id>[^/]++)/(?P<name>[^/]++)(?:/(?P<key>[^/]++))?$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'study_getinfo')), array (  'key' => '',  '_controller' => 'AppBundle\\Controller\\StudyController::getAction',));
                }

                // study_getint
                if (0 === strpos($pathinfo, '/study/getint') && preg_match('#^/study/getint(?:/(?P<int>\\d+))?$#sD', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'study_getint')), array (  'int' => 0,  '_controller' => 'AppBundle\\Controller\\StudyController::getintAction',));
                }

                // app_study_geturl
                if ('/study/geturl' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\StudyController::geturlAction',  '_route' => 'app_study_geturl',);
                }

            }

            // app_study_datarequest
            if (0 === strpos($pathinfo, '/study/datarequest') && preg_match('#^/study/datarequest(?:/(?P<id>\\d+))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'app_study_datarequest')), array (  'id' => 1,  '_controller' => 'AppBundle\\Controller\\StudyController::datarequestAction',));
            }

            if (0 === strpos($pathinfo, '/study/user_')) {
                // app_study_user_add
                if ('/study/user_add' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\StudyController::user_addAction',  '_route' => 'app_study_user_add',);
                }

                // app_study_user_get
                if ('/study/user_get' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\StudyController::user_getAction',  '_route' => 'app_study_user_get',);
                }

                // app_study_user_update
                if ('/study/user_update' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\StudyController::user_updateAction',  '_route' => 'app_study_user_update',);
                }

                // app_study_user_del
                if ('/study/user_del' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\StudyController::user_delAction',  '_route' => 'app_study_user_del',);
                }

                // app_study_user_sql
                if ('/study/user_sql' === $pathinfo) {
                    return array (  '_controller' => 'AppBundle\\Controller\\StudyController::user_sqlAction',  '_route' => 'app_study_user_sql',);
                }

            }

            // app_study_view
            if ('/study/view' === $pathinfo) {
                return array (  '_controller' => 'AppBundle\\Controller\\StudyController::viewAction',  '_route' => 'app_study_view',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
