<?php

declare(strict_types=1);

namespace Majerome\WorkshopPlugin\Form\Type;

use Sylius\Bundle\ChannelBundle\Form\Type\ChannelChoiceType;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceTranslationsType;
use Majerome\WorkshopPlugin\Entity\Brand\BrandInterface;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

final class BrandType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'majerome_workshop_plugin.form.brand.name',
            ])
            ->add('code', TextType::class, [
                'label' => 'majerome_workshop_plugin.form.brand.code',
            ])
            ->add('type', ChoiceType::class, [
                'label' => 'majerome_workshop_plugin.form.brand.type',
                'choices' => [
                    'majerome_workshop_plugin.form.brand.type_electronics' => BrandInterface::TYPE_ELECTRONICS,
                    'majerome_workshop_plugin.form.brand.type_automotive' => BrandInterface::TYPE_AUTOMOTIVE,
                ],
            ])
            ->add('enabled', CheckboxType::class, [
                'label' => 'majerome_workshop_plugin.form.brand.enabled',
            ])
            ->add('translations', ResourceTranslationsType::class, [
                'entry_type' => BrandTranslationType::class,
            ])
            ->add('channels', ChannelChoiceType::class, [
                'multiple' => true,
                'expanded' => true,
                'label' => 'sylius.ui.channels',
            ])
        ;
    }
}
