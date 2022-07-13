<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class UserController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(Request $request, UserRepository $userRepository): Response
    {
        $users = $userRepository->findAll();
        $error = false;

        $username = $request->request->get('_username');
        $password = $request->request->get('_password');

        if ($username || $password) {
            if ($user = $userRepository->findOneBy(['username' => $username, 'password' => $password])) {
                switch ($user->getLevel()) {
                    case 'superadmin':
                        return $this->redirectToRoute('app_superadmin_page');
                        break;
                    case 'admin':
                        return $this->redirectToRoute('app_admin_page');
                        break;
                    case 'user':
                        return $this->redirectToRoute('app_user_page');
                    default:
                        $error = 'Unknown access level.';
                }
            } else {
                $error = 'Invalid username or password.';
            }
        }

        return $this->render(
            'user/index.html.twig',
            [
                'users' => $users,
                'error' => $error
            ]
        );
    }
}
