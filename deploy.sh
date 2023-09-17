#!/bin/bash
scp -P 2222 -r "./client" "./server" s367044@helios.se.ifmo.ru:~/public_html

#sudo rsync -av --recursive -e "ssh -i ./aitip_host_pass" ./build/ aitipms7_456@aitipms7.beget.tech:~/