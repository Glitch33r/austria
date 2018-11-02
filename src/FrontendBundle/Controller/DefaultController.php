<?php

namespace FrontendBundle\Controller;

use BackendBundle\Entity\AboutPage;
use BackendBundle\Entity\Activities;
use BackendBundle\Entity\Adventure;
use BackendBundle\Entity\Amenitie;
use BackendBundle\Entity\ChaletPage;
use BackendBundle\Entity\Charlets;
use BackendBundle\Entity\ContactForm;
use BackendBundle\Entity\Contacts;
use BackendBundle\Entity\HomePage;
use BackendBundle\Entity\RestaurantPage;
use BackendBundle\Entity\RoomClass;
use BackendBundle\Entity\RoomsPrices;
use BackendBundle\Entity\Seo;
use BackendBundle\Entity\Spa;
use BackendBundle\Entity\SpaPage;
use BackendBundle\Entity\SpecialOffers;
use BackendBundle\Entity\Subscription;
use FrontendBundle\Form\Type\ContactFormType;
use FrontendBundle\Form\Type\SubscriptionFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{

    private function is_locale(Request $request)
    {

        if ($request->getSession()->get('_locale') == null) {
            $request->getSession()->set('_locale', 'en');
        }
    }

    //TODO: think about send parameter current route

    /**
     * @Route("/{locale}/trans", name="translate")
     */
    public function changeLocalForTranslate(Request $request, $locale)
    {
        $request->getSession()->set('_locale', $locale);

        return $this->redirect($request->headers->get('referer'));
    }


    /**
     * @Route("/rooms-and-prices", name="rooms-and-prices")
     */
    public function roomsAndPricesAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $seo = $em->getRepository(Seo::class)->findOneBy(['slug' => 'rooms-prices']);

        $m = $em->getRepository(RoomsPrices::class)->findAll()[0];

        return $this->render('@Frontend/roomsandprices/index.html.twig', [
            'seo' => $seo,
            'm' => $m,
            'locale' => $request->getSession()->get('_locale'),
        ]);
    }

    /**
     * @Route("/activities", name="activities")
     */
    public function activitiesAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $seo = $em->getRepository(Seo::class)->findOneBy(['slug' => 'activities']);

        $activities = $em->getRepository(Activities::class)->findAll();

        return $this->render('@Frontend/activity/index.html.twig', [
            'seo' => $seo,
            'activities' => $activities,
            'locale' => $request->getSession()->get('_locale'),
        ]);
    }


    /**
     * @Route("/about-us", name="about-us")
    */
    public function aboutAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $seo = $em->getRepository(Seo::class)->findOneBy(['slug' => 'about-us']);

        $data = $em->getRepository(AboutPage::class)->findAll()[0];

        return $this->render('@Frontend/about/index.html.twig', [
            'seo' => $seo,
            'about' => $data,
            'locale' => $request->getSession()->get('_locale'),
        ]);
    }


    /**
     * @Route("/chalets", name="chalets")
     */
    public function chaletsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $seo = $em->getRepository(Seo::class)->findOneBy(['slug' => 'chalets']);

        $data = $em->getRepository(ChaletPage::class)->findAll()[0];

        return $this->render('@Frontend/chalet/index.html.twig', [
            'seo' => $seo,
            'chalet' => $data,
            'locale' => $request->getSession()->get('_locale'),
        ]);
    }

    /**
     * @Route("/special-offers", name="special-offers")
     */
    public function specialAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $seo = $em->getRepository(Seo::class)->findOneBy(['slug' => 'special-offers']);

        $data = $em->getRepository(SpecialOffers::class)->findAll()[0];

        return $this->render('@Frontend/special/index.html.twig', [
            'seo' => $seo,
            'data' => $data,
            'locale' => $request->getSession()->get('_locale'),
        ]);
    }


    /**
     * @Route("/spa", name="spa")
     */
    public function spaAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $seo = $em->getRepository(Seo::class)->findOneBy(['slug' => 'spa']);

        $data = $em->getRepository(SpaPage::class)->findAll()[0];

        return $this->render('@Frontend/spa/index.html.twig', [
            'seo' => $seo,
            'data' => $data,
            'locale' => $request->getSession()->get('_locale'),
        ]);
    }

    /**
     * @Route("/restaurant-and-bar", name="restaurant-and-bar")
     */
    public function restaurantAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $seo = $em->getRepository(Seo::class)->findOneBy(['slug' => 'restaurant']);

        $data = $em->getRepository(RestaurantPage::class)->findAll()[0];

        return $this->render('@Frontend/restaurant/index.html.twig', [
            'seo' => $seo,
            'data' => $data,
            'locale' => $request->getSession()->get('_locale'),
        ]);
    }



    /**
     * @Route("/rooms-and-prices/{slug}", name="room-class")
     */
    public function roomClassAction(Request $request, $slug)
    {
        $em = $this->getDoctrine()->getManager();
        $seo = $em->getRepository(Seo::class)->findOneBy(['slug' => $slug]);
        $item = $em->getRepository(RoomClass::class)->findBy(['slug'=>$slug])[0];
        $prev = $em->getRepository(RoomClass::class)->getPrevious($item->getId());
        $next = $em->getRepository(RoomClass::class)->getNext($item->getId());
//        dump($prev, $next); die;
        if($prev != null)$prev = $prev->getSlug();
        if($next != null)$next = $next->getSlug();

        return $this->render('@Frontend/roomsandprices/item.html.twig', [
            'seo' => $seo,
            'item' => $item,
            'next' => $next,
            'prev' => $prev,
            'locale' => $request->getSession()->get('_locale'),
        ]);
    }

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $this->is_locale($request);
        $seo = $em->getRepository(Seo::class)->findOneBy(['slug' => 'home']);
        $home = $em->getRepository(HomePage::class)->findAll()[0];
        $amenities_items = $em->getRepository(RoomClass::class)->findAll();

        $adv = $em->getRepository(Adventure::class)->findAll()[0];

        return $this->render('FrontendBundle:home:index.html.twig', [
            'home' => $home,
            'seo' => $seo,
            'locale' => $request->getSession()->get('_locale'),
            'amenities_items' => $amenities_items,
            'adv' => $adv,
        ]);
    }

    public function footerAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $contact = $em->getRepository(Contacts::class)->findAll();

        return $this->render('@Frontend/parts/_footer.html.twig', [
            'contact' => $contact[0],
            'locale' => $request->getSession()->get('_locale'),
        ]);
    }

    public function headerDarkAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $contact = $em->getRepository(Contacts::class)->findAll();

        return $this->render('@Frontend/parts/_header_dark.html.twig', [
            'contact' => $contact[0],
            'locale' => $request->getSession()->get('_locale'),
        ]);
    }

    public function headerLightAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $contact = $em->getRepository(Contacts::class)->findAll();

        return $this->render('@Frontend/parts/_header_light.html.twig', [
            'contact' => $contact[0],
            'locale' => $request->getSession()->get('_locale'),
        ]);
    }

    /**
     * @Route("/contacts", name="contacts")
     */
    public function contactAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $seo = $em->getRepository(Seo::class)->findOneBy(['slug' => 'contacts']);

        $contact = $em->getRepository(Contacts::class)->findAll();

        return $this->render('@Frontend/contacts/index.html.twig', [
            'contact' => $contact[0],
            'seo' => $seo,
            'locale' => $request->getSession()->get('_locale'),
        ]);
    }


    /**
     * @Route("/submit-contact-form", name="submit-contact-form")
     */
    public function contactFormAction(Request $request)
    {
//        $em = $this->getDoctrine()->getManager();
        $contactForm = new ContactForm();
        $form = $this->createForm(ContactFormType::class, $contactForm, [
            'action' => $this->generateUrl('submit-contact'),
        ]);

//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $name = $form['name']->getData();
//            $email = $form['email']->getData();
//            $phone = $form['telephone']->getData();
//            $body = $form['body']->getData();
//
//            $contactForm->setName($name);
//            $contactForm->setEmail($email);
//            $contactForm->setTelephone($phone);
//            $contactForm->setBody($body);
//
//            $em->persist($contactForm);
//            $em->flush();
//
////            $this->get('session')->getFlashBag()->add('success', [
////                'text' => 'Спасибо за Ваш заказ! Наш менеджер свяжется с Вами.'
////            ]);
//
//            return $this->redirect($this->generateUrl('contacts'));
//        }

        return $this->render('@Frontend/contacts/_form.html.twig', [
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/submit-contact", name="submit-contact")
     */
    public function contactFormSubmitAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $contactForm = new ContactForm();
        $form = $this->createForm(ContactFormType::class, $contactForm, [
            'action' => $this->generateUrl('submit-contact'),
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $name = $form['name']->getData();
            $email = $form['email']->getData();
            $phone = $form['telephone']->getData();
            $body = $form['body']->getData();

            $contactForm->setName($name);
            $contactForm->setEmail($email);
            $contactForm->setTelephone($phone);
            $contactForm->setBody($body);

            $em->persist($contactForm);
            $em->flush();


            return new Response(json_encode(['status'=>true]));
        }

        return new Response(json_encode(['status'=>false]));
    }


    /**
     * @Route("/submit-subscription", name="submit-subscription")
     */
    public function subscriptionFormAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $subForm = new Subscription();
        $email = $request->get('email-subscription');

        if(filter_var($email, FILTER_VALIDATE_EMAIL) != false){
            $subForm->setEmail($email);
            $em->persist($subForm);
            $em->flush();

            return new Response(json_encode(['status'=>true]));
        }

        return new Response(json_encode(['status'=>false]));
    }
}
