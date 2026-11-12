<?php

namespace App\Form;

use App\Entity\Image;
use App\Entity\SlideShow;
use App\Entity\Theme;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SlideShowType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title')
            ->add('image', EntityType::class, [
                'class' => Image::class,
                'choice_label' => 'id',
            ])
            ->add('theme', EntityType::class, [
                'class' => Theme::class,
                'choice_label' => static function (Theme $theme): string {
                    return trim($theme->getId() . ' : ' . $theme->getTitle());
                },
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SlideShow::class,
        ]);
    }
}
