# How to use this stack ?

```shell
$> docker-machine ls
NAME      ACTIVE   DRIVER       STATE     URL                         SWARM   DOCKER        ERRORS
Char      -        virtualbox   Stopped                                       Unknown
default   *        virtualbox   Running   tcp://192.168.99.100:2376           v18.06.1-ce
```

if needed :

```shell
$> docker-machine create default
Running pre-create checks...
Creating machine...
(default) Copying /Users/lsauvage/.docker/machine/cache/boot2docker.iso to /Users/lsauvage/.docker/machine/machines/default/boot2docker.iso...
(default) Creating VirtualBox VM...
(default) Creating SSH key...
(default) Starting the VM...
(default) Check network to re-create if needed...
(default) Waiting for an IP...
Waiting for machine to be running, this may take a few minutes...
Detecting operating system of created instance...
Waiting for SSH to be available...
Detecting the provisioner...
Provisioning with boot2docker...
Copying certs to the local machine directory...
Copying certs to the remote machine...
Setting Docker configuration on the remote daemon...
Checking connection to Docker...
Docker is up and running!
To see how to connect your Docker Client to the Docker Engine running on this virtual machine, run: docker-machine env default
```
```shell
$> docker-machine start default
```
```shell
$> docker version
Client:
 Version:      18.05.0-ce
 API version:  1.37
 Go version:   go1.10.2
 Git commit:   f150324
 Built:        unknown-buildtime
 OS/Arch:      darwin/amd64
 Experimental: false
 Orchestrator: swarm

Server:
 Engine:
  Version:      18.06.1-ce
  API version:  1.38 (minimum version 1.12)
  Go version:   go1.10.3
  Git commit:   e68fc7a
  Built:        Tue Aug 21 17:28:38 2018
  OS/Arch:      linux/amd64
  Experimental: false
```

to set up the environment for the Docker client :
```shell
$> eval $(docker-machine env default)
```

to deploy the STACK, simply run this where the .yml file is.
```shell
$> docker compose up -d
Starting lamp-stack_db_1 ... done
lamp-stack_phpmyadmin_1 is up-to-date
Starting php_web         ... done
```

Your stack in now deployed...
- We use port-forwarding to connect to the inside of containers from our local machine.
    - webserver: `http://localhost:8100`
    - db: `mysql://devuser:devpass@localhost:9906/test_db`
- Our local directory, `./php`, is mounted inside of the webserver container as `/var/www/html/`
    - The files within in our local folder will be served when we access the website inside of the container

To run commands directly in your mysql machine :
```shell
$> docker exec -it lamp-stack_db_1 bash
root@4f2c29fe29c1:/# mysql -u root -p
Enter password:

mysql>
```
