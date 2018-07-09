# Assigning a variable MemoryValue, executing the command free
# searching for the Mem field, and getting the percentage
MemoryValue=$(free | grep Mem | awk '{print $3/$2 * 100}')

# Executing df command, getting the first and fifth value
# without the first value, and removing '%'
DiskUsed=$( df | awk '{print $1, $5}'| tail -n +2 | tr -d "%") 

# checking if MemoryValue is greater or equal to 80,
# print the alarm
if [ ${MemoryValue%.*} -ge 80 ]; then
	echo "ALARM: Virtual Memory is at $MemoryValue%"
	error1=True
fi

# Read each line in DiskUsed and check if greater or equal 
# to 80, print
while read -r line; do

    IFS=' ' read -r -a array <<< "$line"

    if [ ${array[1]%.*} -ge 80 ]; then
    	error2=True
    	echo "ALARM: disk ${array[0]} is at ${array[1]}% "
    fi
done <<< "$DiskUsed"

# checking if there are no errors, print 'Everything is OK'
if [[ ! $error2 && ! $error1 ]]; then 
	echo "Everything is OK"
fi
