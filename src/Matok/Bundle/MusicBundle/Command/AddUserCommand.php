<?php

namespace Matok\Bundle\MusicBundle\Command;

use Matok\Bundle\MusicBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Security\Core\Encoder\BCryptPasswordEncoder;

class AddUserCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('music:create-user')
            ->setDescription('Creates a new user.')
            ->setHelp('This command allows you to create a user...')
            ->addArgument('username', InputArgument::REQUIRED, 'User username')
            ->addArgument('password', InputArgument::REQUIRED, 'User password')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $username = $input->getArgument('username');
        $password = $input->getArgument('password');
        $encoder = new BCryptPasswordEncoder(9);
        $encoded = $encoder->encodePassword($password, '');

        $user = new User($username, $encoded);
        $em = $this->getContainer()->get('doctrine')->getEntityManager();
        $em->persist($user);
        $em->flush();
        $output->writeln('User was created!');
    }
}