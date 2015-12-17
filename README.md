Symfony [Boris](https://github.com/d11wtq/boris) bundle
============

Do you ever want to call one of your application services to try something out? Then this bundle could be something for you.
With this bundle you can call Symfony services directly in your console.

Overview
-----------
Provide REPL shell in application context with Symfony console


Instalation
-----------

    "require-dev": {
        "floriansemm/boris-bundle": "1.*"
    },

Usage
-----------

Initialize the interactive shell prompt

    php app/console repl

Your console should now look like this

    [1] Symfony-2.6.3 - app/dev/debug>
   
Now let's call doctrine and select a entity:

    [1] Symfony-2.6.3 - app/dev/debug> $postRepository = $container->get('doctrine')->getRepository('AcmeDemoBundle:Post');
    [2] Symfony-2.6.3 - app/dev/debug> $postRepository->find('1');
    // object(Acme\DemoBundle\Entity\Post)(
    //
    // )

