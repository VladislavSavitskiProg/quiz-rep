<?php

namespace App\Controller\Admin;

use App\Entity\Answers;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class AnswersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Answers::class;
    }


    public function configureFields(string $pageName): iterable
    {
        yield AssociationField::new('questions');
        yield TextField::new('description');
        yield BooleanField::new('corrected');
    }

}
