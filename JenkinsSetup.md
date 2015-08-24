Jenkins public private key
---------------------------

On index.als.scot
---------------
Create a user called jenkins:

useradd -m jenkins
usermod -G tomcat7 jenkins
sudo su jenkins
ssh-keygen -t rsa

cp ~/.ssh/id_rsa.pub ~/.ssh/authorized_keys


On occurrence-db.als.scot
-----------------------

sudo mkdir -p /home/jenkins/
sudo chown jenkins:jenkins /home/jenkins/

sudo su jenkins

Copy the id_rsa and id_rsa.pub to ~/.ssh

Create a ~/.ssh/config with the following:

AddressFamily inet
Host index.als.scot
  User jenkins
  IdentityFile ~/.ssh/id_rsa

