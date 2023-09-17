#!/bin/bash
scp -P 2222 -r "C:\Users\Михаил\Documents\ИТ\phpProjects\lab1_web\client" "C:\Users\Михаил\Documents\ИТ\phpProjects\lab1_web\server" s367044@helios.se.ifmo.ru:~/public_html

#sudo rsync -av --recursive -e "ssh -i ./aitip_host_pass" ./build/ aitipms7_456@aitipms7.beget.tech:~/