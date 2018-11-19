<?php

namespace FrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class LocaleController extends Controller
{

    /**
     * @Route("/translate/{locale}", name="translation")
     */
    public function setLocaleAction(Request $request, $locale)
    {
        $request->setLocale($locale);
        $request->getSession()->set('_locale', $locale);
        $referer = $request->headers->get('referer');
//        dump($request); die();
        return new RedirectResponse($referer);
    }

}
