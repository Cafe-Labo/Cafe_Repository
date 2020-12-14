#!/bin/bash

#対象のMACアドレス
MAC_ADDRESS="74:e1:82:08:a6:01"

# 対象とするネットワーク
NETWORK="192.168.10"

# 192.168.10.1 から 192.168.10.254 までパラレルにping で応答を調べる
echo -en "\r調査中-----------------------\n"
echo 192.168.10.{1..254} | xargs -P256 -n1 ping -s1 -c1 -W2 |grep ttl |awk '{print $4}'

# ARPテーブルを表示
echo -en "\r調査結果-----------------------\n"
echo -n "address of ($MAC_ADDRESS) is "
echo |arp -a|grep ether|grep -i $MAC_ADDRESS |awk '{print $2}'
exit


