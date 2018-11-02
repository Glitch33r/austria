<?php

namespace FrontendBundle\Form\Type;

use BackendBundle\Entity\ContactForm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class SubscriptionFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => false,
                'required' => false,
                'attr'   =>  [
                    'class'   => 'subscription__input',
                    'placeholder' => 'YOUR EMAIL'
                ]
            ])
//            ->add('save', SubmitType::class,[
//                'label'=> 'НАДІСЛАТИ',
//                'attr'   =>  [
//                    'class'   => 'send-message-submit',
//                ]
//            ])
        ;
    }

    public function getName()
    {
        return 'subscription_form';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(['data_class' => 'BackendBundle\Entity\Subscription']);
    }
}