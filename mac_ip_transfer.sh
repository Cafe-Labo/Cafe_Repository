#!/bin/bash

#git@github.com:Cafe-Labo/cafe_repository.git

#How to
## 1.対象をWifiに接続する。
## 2.対象のMACアドレスを下部のMAC_ADDRESSに記入する。
## 3.bash mac_ip_transfer.shを実行する。
## 4.設定したMACアドレスに対応するIPアドレスを標準出力する。

#対象のMACアドレス(MACアドレスをここに記入する。小文字でも大文字でも良い。)
MAC_ADDRESS="11:11:11:11:11:11"

# 対象とするネットワーク
NETWORK="192.168.10"

# 192.168.10.1 から 192.168.10.254 までパラレルにping で応答を調べる
echo -en "\r調査中------------------------\n"
echo 192.168.10.{1..254} | xargs -P256 -n1 ping -s1 -c1 -W2 |grep ttl |awk '{print $4}'

# ARPテーブルを表示
echo -en "\r調査結果-----------------------\n"
echo "address of ($MAC_ADDRESS) is"
echo |arp -a|grep ether|grep -i $MAC_ADDRESS |awk '{print $2}'
exit


