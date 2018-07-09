# get every file in /var/log with extension log with its size,
# give the output to the file 'log_dump.csv'
sudo find /var/log -name \*.log -printf "%P, %k\n" > /home/sef-omar/Desktop/log_dump.csv