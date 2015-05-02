# Google-Trends-with-Solr-PHP-UI
A basic UI to search a keyword &amp; visualize its frequencei in a chart

# How to do it

---> All words in maiusc can be changed with according to your requiriments <---

Backend
---------
* Extract or download Solr; //I used solr-5.0.0 
* add the CLASSPATH (it is needed if you want to use Update.java) with the below shell command
export CLASSPATH=$HOME/SOLR-DIRECTORY/dist/*:.:$HOME/SOLR-DIRECTORY/dist/solrj-lib/*
* lunch this long command to create the solr core, new fields and load your data
$HOME/SOLR-DIRECTORY/bin/solr start; $HOME/SOLR-DIRECTORY/bin/solr create -c SOLR-CORE-NAME; curl -X POST -H 'Content-type:application/json' --data-binary '{ "add-field" : { "name":"DATE", "type":"tdate", "indexed":true, "stored":true, "default":"1992-07-10T17:33:18Z"}, "add-field" : { "name":"CONTENT", "type":"string", "indexed":true, "stored":true}, "add-copy-field" : { "source":"_text", "dest": [ "CONTENT"]}}' http://localhost:8983/solr/SOLR-CORE-NAME/schema; $HOME/SOLR-DIRECTORY/bin/solr stop; $HOME/SOLR-DIRECTORY/bin/solr start; $HOME/SOLR-DIRECTORY/bin/post -c SOLR-CORE-NAME -Dauto -Drecursive $HOME/DATA-DIRECTORY; $HOME/SOLR-DIRECTORY/bin/solr stop; $HOME/SOLR-DIRECTORY/bin/solr start
* Finally, go the directory of Update.java, check the SOLR-CORE-NAME in the 28th line and lunch it (it fixes all contents with the field DATE set to  1992-07-10T17:33:18Z).

Frontend
---------
* Copy the Solr-PHP-UI modified version on your web servers working folder;
* check SOLR-CORE-NAME (30th line) in SOLR-PHP-UI-DIRECTORY/config/config.php;
* That's it! Check SOLR-PHP-UI-DIRECTORY/templates/view.list.php to modify the chart and view.index.topbar.php, in the same directory, to modify the WEBSITE TITLE.

Suggestions, useful links
---------
It could be useful to add these lines to $HOME/.bashrc to have some shortcuts:
alias start='$HOME/SOLR-DIRECTORY/bin/solr start'
alias stop='$HOME/SOLR-DIRECTORY/bin/solr stop -all'
alias update='$HOME/SOLR-DIRECTORY/bin/post -c SOLR-CORE-NAME -Dauto -Drecursive $HOME/DATA-DIRECTORY; cd; java Update' //that's working only if Update.java is inside $HOME
