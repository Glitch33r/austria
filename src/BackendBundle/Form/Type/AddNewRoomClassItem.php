<?php

namespace BackendBundle\Form\Type;

use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class AddNewRoomClassItem extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', TextType::class, [
            'label' => 'Title [EN]',
        ]);
        $builder->add('description', CKEditorType::class, [
            'label' => 'Description [EN]',
        ]);
        $builder->add('title_trans', TextType::class, [
            'label' => 'Title [DE]',
        ]);
        $builder->add('description_trans', CKEditorType::class, [
             'label' => 'Description [DE]',
            ]);
        $builder->add('price', TextType::class, [
            'label' => 'Price',
        ]);
        $builder->add('imageFile', VichImageType::class, [
            'required' => екгу,
            'allow_delete' => true,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BackendBundle\Entity\RoomClassItem'
        ));
    }

    public function getName() {
        return 'add_item';
    }
}