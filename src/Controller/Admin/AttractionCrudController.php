<?php

namespace App\Controller\Admin;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;

use App\Entity\Attraction;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AttractionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Attraction::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            // IdField::new('id'),
            TextField::new('title'),
            TextField::new('description'),
            SlugField::new('slug')->setTargetFieldName('title'),
            ImageField::new('image')
            	->setBasePath('uploads/')
            	->setUploadDir('public/uploads/')
            	->setUploadedFileNamePattern('[randomhash].[extension]')
            	->setRequired(false),
        ];
    }
}
