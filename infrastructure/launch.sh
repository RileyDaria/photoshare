#!/bin/bash

declare -a instancesARR
declare -a instbackupARR
declare -a dbARR
declare -a dbbackupARR

echo "Check the README file for help if needed"

mapfile -t instancesARR < <(euca-run-instances -g group2 -k $1 -t c1.medium -n 1 -f photoshare/infrastructure/instance-env.sh emi-c87b2863 | grep -o 'i-.\{0,8\}' | head -1)

mapfile -t instbackupARR < <(euca-run-instances -g group2 -k $1 -t c1.medium -n 1 -f photoshare/infrastructure/instance-env.sh emi-c87b2863 | grep -o 'i-.\{0,8\}' | head -1)

mapfile -t dbARR < <(euca-run-instances -g group2 -k $1 -t c1.medium -n 1 -f photoshare/infrastructure/db-env.sh emi-c87b2863 | grep -o 'i-.\{0,8\}' | head -1)

mapfile -t dbbackupARR < <(euca-run-instances -g group2 -k $1 -t c1.medium -n 1 -f photoshare/infrastructure/db-env.sh emi-c87b2863 | grep -o 'i-.\{0,8\}' | head -1)

echo "main instance id"
echo ${instancesARR[@]}
echo "backup instance id"
echo ${instbackupARR[@]}
echo "main db instance id"
echo ${dbARR[@]}
echo "backup db instance id"
echo ${dbbackupARR[@]}


echo "short sleep to allow instances to load before creating the load balancer"
sleep 30

euca-associate-address --instance ${instancesARR[@]} 64.131.111.40

euca-associate-address --instance  ${instbackupARR[@]} 64.131.111.42

euca-associate-address --instance ${dbARR[@]} 64.131.111.46

euca-associate-address --instance ${dbbackupARR[@]} 64.131.111.50

eulb-create-lb -z RICE01 -l "lb-port=80, protocol=HTTP, instance-port=80, instance-protocol=HTTP" hawkstagram-elb

echo "another short sleep to allow the load balancer to be created before attaching instances to it"
sleep 180

eulb-register-instances-with-lb --instances ${instancesARR[@]},${instbackupARR[@]},${dbARR[@]},${dbbackupARR[@]} hawkstagram-elb

sleep 5

#hopefully this will put a metric alarm that monitors CPU usage on ELBs and alerts when it exceeds 90% usage for 3 consecutive 1 minute periods
#euwatch-put-metric-alarm test-alarm --alarm-description "a test alarm for CPU utilization" --metric-name CPUUtilization --namespace AWS/ELB --statistic Average --period 60 --threshold 90 --comparison-operator GreaterThanThreshold --evaluation-periods 3
