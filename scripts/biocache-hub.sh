#!/usr/bin/env bash
ansible-playbook --private-key ~/.ssh/ALSNBN.pem -vvvv -u ubuntu -s -i ~/dev/ansible-inventories/nbnatlas/scotland-records.nbnatlas.org ~/dev/ala-install/ansible/biocache-hub-standalone.yml
ansible-playbook --private-key ~/.ssh/ALSNBN.pem -vvvv -u ubuntu -s -i ~/dev/ansible-inventories/nbnatlas/records.nbnatlas.org ~/dev/ala-install/ansible/biocache-hub-standalone.yml


ansible-playbook --private-key ~/.ssh/ALSNBN.pem -vvvv -u ubuntu -s -i ~/dev/ansible-inventories/nbnatlas/scotland-records.nbnatlas.org ~/dev/ala-install/ansible/biocache-hub-standalone.yml
ansible-playbook --private-key ~/.ssh/ALSNBN.pem -vvvv -u ubuntu -s -i ~/dev/ansible-inventories/nbnatlas/records.nbnatlas.org ~/dev/ala-install/ansible/biocache-hub-standalone.yml
