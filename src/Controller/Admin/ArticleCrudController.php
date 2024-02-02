<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use DateTime;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        
            yield TextField::new('titre');

            yield SlugField::new('slug')->setTargetFieldName('titre')->setUnlockConfirmationMessage(
                'Il est vivement conseillé d\'utiliser la génération automatique de slug'
            );

            yield TextEditorField::new('content');

            yield TextField::new('featuredText');

            yield ImageField::new('imageName')
            ->setBasePath('images/articles')
            ->setUploadDir('public/images/articles')
            ->setUploadedFileNamePattern('[slug]-[timestamp].[extension]');

            yield DateField::new('createdAt')->hideOnForm();

            yield DateField::new('updatedAt')->hideOnForm();
        
    }
    
}
