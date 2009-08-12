#!/bin/sh

echo "Usage: $0 <base_id_port>"

echo "Testing PORT`cat /sys/devices/virtual/gpio/gpiochip$1/label`"

i=0
while [[ $i -lt 32 ]]; do
        #esporto
        p=`expr $1 + $i`;
        echo $p > /sys/class/gpio/export 2>/dev/null;
	if [[ -d /sys/class/gpio/gpio$p ]]; then
        	echo 'out' > /sys/class/gpio/gpio$p/direction 2>/dev/null;
	fi
        let i=i+1
done

while [[ 1 ]]; do
	#set a 1
	echo 1 | tee /sys/class/gpio/gpio*/value > /dev/null

	i=0
	while [[ $i -lt 32 ]]; do
	        #reset a 0
	        p=`expr $1 + $i`;
		if [[ -f /sys/class/gpio/gpio$p/value ]]; then
			echo 0 > /sys/class/gpio/gpio$p/value
			echo reset pin id:$p port`cat /sys/devices/virtual/gpio/gpiochip$1/label`: $i 
		fi
	        let i=i+1
	done
done

