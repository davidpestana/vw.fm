<?php
namespace ApiBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use ApiBundle\Entity\Client;

class LoadUserData implements FixtureInterface, ContainerAwareInterface
{

			/**
		 * @var ContainerInterface
		 */
		private $container;

		/**
		 * {@inheritDoc}
		 */
		public function setContainer(ContainerInterface $container = null)
		{
		    $this->container = $container;
		}
    public function load(ObjectManager $manager)
    {

		$userManager = $this->container->get('fos_user.user_manager');

        // Create our user and set details
        $user = $userManager->createUser();
        $user->setUsername('admin');
        $user->setEmail('admin@domain.com');
        $user->setPlainPassword('admin');
        $user->setEnabled(true);
      //  $user->setRoles(array('ROLE_ADMIN'));
        // Update the user
        $userManager->updateUser($user, true);


        $c = new Client();
        $c->setRandomId('3bcbxd9e24g0gk4swg0kwgcwg4o8k8g4g888kwc44gcc0gwwk4');
        $c->setRedirectUris(array());
        $c->setSecret('4ok2x70rlfokc8g0wws8c8kwcokw80k44sg48goc0ok4w0so0k');
        $c->setAllowedGrantTypes(array("password"));

        $manager->persist($c);
        $manager->flush();

    }


}