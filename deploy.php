<?php

require 'vendor/autoload.php';
require 'recipe/symfony3.php';
require 'deploy/servers.php';

date_default_timezone_set('UTC');

set('repository', 'https://github.com/mariusadam/quizzapp2.git');
set('http_user', 'quizzsof');
set('keep_releases', 5);
set('dump_assets', false);
set('shared_files', ['app/config/parameters.yml', 'web/robots.txt']);
set('shared_dirs', ['web/uploads', 'web/media']);
set('writable_dirs', ['app/cache', 'app/logs', 'web/uploads', 'web/media']);

/**
 * PHP-FPM Restart
 */
task('php-fpm:restart', function () {
    run('sudo /usr/sbin/service php5-fpm restart');
})->desc('Restart PHP-FPM service');
/**
 * Nginx Restart
 */
task('nginx:restart', function () {
    run('sudo /usr/sbin/service nginx restart');
})->desc('Restart Nginx service');
/**
 * Install bundles assets
 */
task('assets:install', function() {
    cd('{{release_path}}');
    run('{{bin/php}} {{release_path}}/' . trim(get('bin_dir'), '/') . '/console assets:install --env={{env}} --no-debug --symlink');
})->desc('Install bundles assets');

task('assets:version', function() {
    run('sed -i "s/assets_version.*$/assets_version: $(date +%s)/g" {{release_path}}/app/config/parameters.yml');
})->desc('Update assets version');

/**
 * Cleanup code
 */
task('deploy:clear_code', function() {
    run("rm -rf {{release_path}}/deploy*");
    run("rm -rf {{release_path}}/*.md");
    run("rm -rf {{release_path}}/Vagrantfile");
    run("rm -rf {{release_path}}/files");
})->setPrivate();

/**
 * Migrate database
 */
task('database:migrate:locally', function () {
    runLocally('{{bin/php}} {{release_path}}/' . trim(get('bin_dir'), '/') . '/console doctrine:migrations:migrate --env={{env}} --no-debug --no-interaction', 30000);
})->desc('Migrate database');
/**
 * Installing vendors tasks.
 */
task('deploy:vendors', function () {
    $composer = env('bin/composer');
    $envVars = env('env_vars') ? 'export ' . env('env_vars') . ' &&' : '';
    run("cd {{release_path}} && export COMPOSER_PROCESS_TIMEOUT=900 && $envVars $composer {{composer_options}}");
})->desc('Installing vendors');
/**
 * Local deployment tasks
 */
task('install', [
    'deploy:vendors',
    'assets:install',
    'database:migrate:locally',
])->onlyForStage('local');

/**
 * Run tasks
 */
before('deploy:symlink', 'database:migrate');
after('deploy:update_code', 'deploy:clear_code');
after('deploy:update_code', 'deploy:shared');
after('deploy:assetic:dump', 'assets:install');
after('deploy:vendors', 'assets:version');
after('success', 'php-fpm:restart');
after('success', 'nginx:restart');