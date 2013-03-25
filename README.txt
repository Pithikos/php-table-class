============================ PHP Table class ===================================

Author:  Johan Hanssen Seferidis
Created: 2013-03-25
Updated: 2013-03-25
License: Do whatever you want with it as long you don't kill someone
 
 
---------------------------- Usage ---------------------------------------------

1. Make a table             $table=New Table();
2. Make a header(optional)  $table->makeHeader("Name", "Lastname", "Food");
3. Add a record             $table->addRecord("Jesus", "", "Fish");
4. Create HTML code         echo $table->tableToHTML();


---------------------------- Notes ---------------------------------------------

* Rows(and even the header) don't have to be the same size.
* Header is optional and can be changed by calling makeHeader() more than once.


---------------------------- Examples ------------------------------------------

$table=New Table();
$table->addRecord("Ena", "Pizza");
$table->addRecord("Duo", "Pasta", "Michael");
$table->addRecord("Tria", "Bacon");
$table->addRecord("", "", "", "", "", "Random cell");

$table->makeHeader("Number", "Food", "Eater");
$table->makeHeader("Color", "", "Wigger", "Category");

echo "<br />\n";
echo $table->tableToHTML();
