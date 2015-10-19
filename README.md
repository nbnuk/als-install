
# Ansible scripts ran to setup Atlas of Living Scotland

The Atlas of Living Scotland has been setup using a selection of ansible scripts.
Most of these scripts are in the Atlas of Living Australia (ALA) repository [ala-install](http://github.com/atlasoflivingaustralia/ala-install).


## Getting started

To reduce typing, set an unix alias up like so which points to the PEM file that you will use against the virtual machines:

```
export alias ansible-als='ansible-playbook --private-key ~/.ssh/XXXXXXXXX.pem -u ubuntu -s'
```

### Install wordpress

```
ansible-als -i als/inventories/www.als.scot als-install/ansible/wordpress.yml
```

### Install registry (collectory)

```
ansible-als -i ansible-inventories/als/registry.als.scot ala-install/ansible/collectory.yml
```

### Install occurrence backend (biocache database)

```
ansible-als -i ansible-inventories/als/occurrence-db.als.scot ala-install/ansible/biocache-backend.yml
```

### Install images service

```
ansible-als -i ansible-inventories/als/images.als.scot ala-install/ansible/image-service.yml
```

### Install central authentication service

```
ansible-als -i ansible-inventories/als/auth.als.scot ala-install/ansible/auth2-standalone.yml
```

### Install sightings
```
ansible-als -i ansible-inventories/als/ecodata.als.scot ala-install/ansible/ecodata.yml 
ansible-als -i ansible-inventories/als/sightings.als.scot ala-install/ansible/pigeonhole-standalone.yml 
```

### Index server

This script will setup SOLR on a standalone server.

```
ansible-als -i ansible-inventories/als/index.als.scot ala-install/ansible/solr-standalone.yml 
```

### Species pages webservices & UI (BIE)

This script will setup species pages and webservices on a standalone server.

```
ansible-als -i ansible-inventories/als/species-ws.als.scot ala-install/ansible/bie-index.yml 
ansible-als -i ansible-inventories/als/species.als.scot ala-install/ansible/bie-hub.yml 
```

### Biocache webservices & UI

This script will setup occurrence search pages and webservices on a standalone server.
```
ansible-als -i ansible-inventories/als/records-ws.als.scot ala-install/ansible/biocache-service.yml 
ansible-als -i ansible-inventories/als/records.als.scot ala-install/ansible/biocache-hub.yml 
```

### Install UK version of the name matching index
```
ansible-als -i ansible-inventories/als/name-index als-install/ansible/name-index.yml 
```

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
ansible-als -i ansible-inventories/als/... als-install/ansible/ebs-setup.yml

Amazon EC2 scripts
==================

www.als.scot = t2.micro
registry.als.scot = t2.small, ebs = 20gb
images.als.scot = c4.2xlarge, ebs = 200gb
occurrence-db.als.scot = c4.4xlarge, ebs = 200gb
auth.als.scot = t2.medium, ebs = 20gb
