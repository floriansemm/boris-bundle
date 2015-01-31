Symfony [Boris](https://github.com/d11wtq/boris) bundle
============

Do you ever want to call one of your application services to try something out? Then this bundle could be something for you.

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

    php app/console shell

Your console should now look like this

    [1] Symfony-2.6.3 - app/dev/debug>
   
Now call a application service:

    [1] Symfony-2.6.3 - app/dev/debug> $container->get('your_service_name');

