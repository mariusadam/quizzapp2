<?php

server('prod', 'e11.ehosts.com', 2222)
    ->user('quizzsof')
    ->identityFile('home/vagrant/.ssh/ehosts_id.pub', '/home/vagrant/.ssh/ehosts_id')
    //->forwardAgent()
    ->env('env', 'prod')
    ->env('bin/php', '/opt/php56/bin/php')
    ->env('branch', 'develop')
    ->env('env_vars', 'SYMFONY_ENV=prod')
    ->env('deploy_path', '/home2/quizzsof')
    ->env('composer_options', 'install --dev --verbose --prefer-dist --optimize-autoloader --no-progress --no-interaction')
    ->stage('prod');

localServer('local')
    ->env('env', 'dev')
    ->env('env_vars', 'SYMFONY_ENV=dev')
    ->env('composer_options', 'install --dev --verbose --prefer-dist --optimize-autoloader --no-progress --no-interaction')
    ->env('gulp_env', 'dev')
    ->env('deploy_path', '/var/www/quizzapp')
    ->env('release_path', '/var/www/quizzapp')
    ->stage('local');