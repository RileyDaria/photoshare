#!/bin/bash

echo Check the README file for help if needed

declare -a instancesARR

mapfile -t instancesARR < <(euca-run-instances -g default -k $1 -t c1.medium -n 3 emi-c87b2863 --output table | grep InstanceId | sed "s/|//g" | tr -d ' ' | sed "s/InstanceId//g")

echo ${instancesARR[@]}

sleep 30

eulb-create-lb -z RICE01 -l "lb-port=80, protocol=HTTP, instance-port=80, instance-protocol=HTTP" hawkstagram-elb
