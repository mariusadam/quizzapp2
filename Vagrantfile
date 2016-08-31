# -*- mode: ruby -*-
# vi: set ft=ruby :

VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
    config.vm.box = "scotch/box"
    config.vm.network "private_network", ip: "33.33.33.100"
    config.vm.hostname = "quizzapp"
    config.vm.synced_folder ".", "/var/www/quizzapp",
    	:nfs => { :mount_options => ["dmode=777","fmode=666"] }

    config.vm.provision "shell", path: "files/nginx/nginx.sh"

    config.vm.provision "shell", inline: <<-SHELL
        service apache2 stop

        apt-get install -q -y php5-dev

        cp -R /var/www/quizzapp/files/php/* /etc/php5
        service php5-fpm restart
    SHELL

    config.vm.provision "shell", inline: <<-SHELL
        cp /var/www/quizzapp/files/nginx/quizzapp.conf /etc/nginx/sites-enabled/quizzapp.conf
        service nginx restart
    SHELL

    config.vm.provision "shell", inline: <<-SHELL
        #display git branch in prompt
        cat /home/vagrant/.bashrc 2> /dev/null | grep -q 'parse_git_branch'
        if [ ! $? -eq 0 ]; then
            cat /var/www/quizzappvirtual/files/bash/.bashrc >> /home/vagrant/.bashrc
            . /home/vagrant/.bashrc
            echo 'Added git branch support for bash prompt'
        fi

        #disable xdebug when running composer
        cat /home/vagrant/.bashrc 2> /dev/null | grep -q 'function composer'
        if [ ! $? -eq 0 ]; then
            echo 'function composer() { COMPOSER="$(which composer)" || { echo "Could not find composer in path" >&2 ; return 1 ; } && sudo php5dismod -s cli xdebug ; $COMPOSER "$@" ; STATUS=$? ; sudo php5enmod -s cli xdebug ; return $STATUS ; }' >> /home/vagrant/.bashrc
            . /home/vagrant/.bashrc
            echo 'Disabled xdebug when running composer'
        fi
    SHELL

    config.vm.provider "virtualbox" do |v|
        v.memory = 1024
        v.cpus = 2
    end
end