#!/bin/bash

declare -a instancesARR

echo "Check the README file for help if needed"

mapfile -t instancesARR < <(euca-run-instances -g default -k $1 -t c1.medium -n 4 -d photoshare/infrastructure/instance-env.sh emi-c87b2863 | grep INSTANCE | sed "s/|//g" | tr -d ' ' | sed "s/INSTANCE//g")

echo ${instancesARR[@]}

echo "short sleep to allow instances to load before creating the load balancer"
sleep 30

eulb-create-lb -z RICE01 -l "lb-port=80, protocol=HTTP, instance-port=80, instance-protocol=HTTP" hawkstagram-elb
