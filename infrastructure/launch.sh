#!/bin/bash

echo "Check the README file for help if needed"

euca-run-instances -g default -k $1 -t c1.medium -n 4 emi-c87b2863

echo "short sleep to allow instances to load before creating the load balancer"
sleep 30

eulb-create-lb -z RICE01 -l "lb-port=80, protocol=HTTP, instance-port=80, instance-protocol=HTTP" hawkstagram-elb
