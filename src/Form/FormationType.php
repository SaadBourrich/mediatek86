<?php
// src/Form/FormationType.php

namespace App\Form;

use App\Entity\Formation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

class FormationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, $this->getTitleOptions())
            ->add('description', TextareaType::class, $this->getDescriptionOptions())
            ->add('videoId', TextType::class, $this->getVideoIdOptions())
            ->add('playlist', IntegerType::class, $this->getPlaylistOptions())
            ->add('submit', SubmitType::class, ['label' => 'Save Formation']);
    }

    private function getTitleOptions(): array
    {
        return [
            'constraints' => [
                new Assert\NotBlank(['message' => 'Please enter a title.']),
                new Assert\Length([
                    'max' => 100,
                    'maxMessage' => 'The title cannot be longer than {{ limit }} characters.',
                ]),
            ],
        ];
    }

    private function getDescriptionOptions(): array
    {
        return [
            'constraints' => [
                new Assert\Length([
                    'max' => 500,
                    'maxMessage' => 'The description cannot be longer than {{ limit }} characters.',
                ]),
            ],
        ];
    }

    private function getVideoIdOptions(): array
    {
        return [
            'constraints' => [
                new Assert\NotBlank(['message' => 'Please enter a video ID.']),
                new Assert\Length([
                    'min' => 11,
                    'max' => 11,
                    'exactMessage' => 'The video ID must be exactly {{ limit }} characters long.',
                ]),
                new Assert\Regex([
                    'pattern' => '/^[a-zA-Z0-9_-]{11}$/',
                    'message' => 'The video ID must contain only letters, numbers, underscores, and hyphens.',
                ]),
            ],
        ];
    }

    private function getPlaylistOptions(): array
    {
        return [
            'constraints' => [
                new Assert\NotBlank(['message' => 'Please select a playlist.']),
            ],
        ];
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Formation::class,
        ]);
    }
}