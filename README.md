======================================
Ansible scripts ran to setup ALS
======================================

export alias ansible-als='ansible-playbook --private-key ~/.ssh/XXXXXXXXX.pem -u ubuntu -s'

1) Install homepage

ansible-als -i als-install/ansible/inventories/www.als.scot als-install/ansible/homepage.yml

2) Install registry (collectory)

ansible-als -i als-install/ansible/inventories/registry.als.scot ala-install/ansible/collectory.yml

3) Install occurrence backend (biocache database)

ansible-als -i als-install/ansible/inventories/occurrence-db.als.scot ala-install/ansible/biocache-backend.yml

4) Install images service

ansible-als -i als-install/ansible/inventories/images.als.scot ala-install/ansible/image-service.yml

5) Install central authentication service

ansible-als -i als-install/ansible/inventories/auth.als.scot ala-install/ansible/auth2-standalone.yml

6) Sightings

ansible-als -i als-install/ansible/inventories/ecodata.als.scot ala-install/ansible/ecodata.yml 
ansible-als -i als-install/ansible/inventories/sightings.als.scot ala-install/ansible/pigeonhole-standalone.yml 

7) Species pages webservices & UI (BIE)

ansible-als -i ansible-inventories/als/species-ws.als.scot ala-install/ansible/bie-index.yml 
ansible-als -i ansible-inventories/als/species.als.scot ala-install/ansible/bie-hub.yml 

8) Biocache webservices & UI

ansible-als -i ansible-inventories/als/records-ws.als.scot ala-install/ansible/biocache-service.yml 
ansible-als -i ansible-inventories/als/records.als.scot ala-install/ansible/biocache-hub.yml 

9) Install UK version of the name matching index

ansible-als -i ansible-inventories/als/name-index als-install/ansible/name-index.yml 


============================================================
EC2 mounting instructions - for EBS volume
============================================================

EBS volumes where used for occurrence-db.als.scot and images.als.scot.

sudo fdisk -l
sudo mkdir /data
sudo mkfs.ext4 /dev/xvdb
sudo mount -t ext4 /dev/xvdb /data
echo "/dev/xvdb /data auto noatime 0 0" | sudo tee -a /etc/fstab

This was done using the following script
ansible-als -i als-install/ansible/inventories/... als-install/ansible/ebs-setup.yml

Amazon EC2 scripts
==================

www.als.scot = t2.micro
registry.als.scot = t2.small, ebs = 20gb
images.als.scot = c4.2xlarge, ebs = 200gb
occurrence-db.als.scot = c4.4xlarge, ebs = 200gb
auth.als.scot = t2.medium, ebs = 20gb
