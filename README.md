pincodeapi
==========

Responsive Design Demo : http://pincode.ngiriraj.com/


API_URL : http://ngiriraj.com/pincode_api/

Type : JSON/XML/CSV

PINCODE : 6 Digits

Area: Filter based on area (starts with)

Limit : Record count


Sample URI: (JSON) 
http://ngiriraj.com/pincode_api/json/632601/t/1

Sample Output:
<pre>
{"Records":154724,"Matched":1,"Fields":["OFFICENAME","TALUK","DISTRICTNAME","STATENAME","PINCODE"],"data":[["Thattaparai B.O","Gudiyattam","Vellore","TAMIL NADU","632601"]]}  
</pre>

Sample URI: (XML)
http://ngiriraj.com/pincode_api/xml/632601/d

Sample URI: (CSV)
http://ngiriraj.com/pincode_api/csv/632601

Source Data:
http://data.gov.in/sites/default/files/all_india_pin_code.csv

Create Table:
<pre>
CREATE TABLE IF NOT EXISTS `postpin` (
  `OFFICENAME` varchar(256) NOT NULL,
  `PINCODE` mediumint(9) NOT NULL,
  `OFFICETYPE` varchar(50) NOT NULL,
  `DELIVERYSTATUS` varchar(50) NOT NULL,
  `DIVISIONNAME` varchar(256) NOT NULL,
  `REGIONNAME` varchar(256) NOT NULL,
  `CIRCLENAME` varchar(256) NOT NULL,
  `TALUK` varchar(256) NOT NULL,
  `DISTRICTNAME` varchar(256) DEFAULT NULL,
  `STATENAME` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='All india postal pincode directory';
</pre>

If you have any issues in full data import based on size, simple split the files and import it.
<pre>
#!/bin/bash
for (( c=1; c<=154726; c+=10000 ))
do
        echo "Starts => $c";
        d=$(($c + 10000))
        sed -n "$c,$d p" all_india_pin_code.csv > fs_$c.csv;
done
</pre>
