#!/bin/bash

euca-run-instances -g default -k $1 -t c1.medium -n 3 emi-c87b2863 
