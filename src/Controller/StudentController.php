<?php

namespace App\Controller;

use App\Model\ClassManager;
use App\Model\StudentManager;

class StudentController extends AbstractController
{
    public function add(): string
    {
        $classManager = new ClassManager();
        $classes = $classManager->selectAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $student = array_map('trim', $_POST);

            $studentManager = new StudentManager();
            $studentManager->insert($student);
        }

        return $this->twig->render('Student/add.html.twig', ['classes' => $classes]);
    }
}
