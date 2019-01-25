<?php

namespace FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use BeSimple\I18nRoutingBundle\Routing\Annotation\I18nRoute;



class LocaleController extends Controller
{

//    /**
//     * @I18nRoute({ "en": "/translation", "de": "/ubersetzung" }, name="translation")
//     */

    /**
     * @Route("/translation{_locale}", name="translation")
     */
    public function setLocaleAction(Request $request, $_locale)
    {
        $request->setLocale($_locale);
        $request->getSession()->set('_locale', $_locale);
        $referer = $request->headers->get('referer');
//        if ($_locale == 'de'){
//            if (preg_match("/en/i", $referer)){
//                $returnValue = preg_replace('/en/', '', $referer, 1);
//            }else{
//                $returnValue = preg_replace('/en/', 'de', $referer, 1);
//            }
//        }else{
//            if($_locale == 'en' and !preg_match("/de/i", $referer))
//            {
//                $returnValue = $referer . 'en';
//            }else{
//                $returnValue = preg_replace('/de/', 'en', $referer, 1);
//            }
//        }

        return new RedirectResponse($referer);
    }

}
