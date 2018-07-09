# get every file in /var/log with extension log with its size,
# give the output to the file 'log_dump.csv'
sudo find /var/log -name \*.log -printf "%P, %k\n" > /home/sef-omar/Desktop/log_dump.csv




# Mousawi
# #!/bin/bash
# # long list all the names of the log files only that are placed in /var/log and its children
# # assign the block size to K to represent the size in Kilo Bytes 
# # awk let us get only the 5th and the 9th columns that represent the file name and size
# # place all the output in a csv file with the name log_dump placed on the Desktop
ls --block-size=K  -lr /var/log/*.log | awk {'print $9", "$5'} | tr -d "K" > /home/sef-mhmd/Desktop/log_dump.csv