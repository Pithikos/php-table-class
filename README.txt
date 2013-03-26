============================ PHP Table class ===================================

Author:  Johan Hanssen Seferidis
Created: 2013-03-25
Updated: 2013-03-25
License: Do whatever you want with it as long you don't kill someone
 


 
---------------------------- Basic usage ---------------------------------------

1. Make a table             $table=New Table();
3. Add records              $table->addRecord("Jesus", "Blue", "Fish");
                            $table->addRecord("Tesla", "", "Coil",);
4. Create HTML code         echo $table->tableToHTML();




---------------------------- Notes ---------------------------------------------

* Rows(and even the header) don't have to be the same size.
* Header is optional and can be changed by calling makeHeader() more than once.




---------------------------- Interface -----------------------------------------

addRecord("Field1value", "Field2value", .. "FieldNvalue");
   Adds a record to the table. Header doesn't count as a record.
   All records don't need to be the same length. An empty string can be passed
   to leave a field empty.

makeHeader("Header1", "Header2", .. "HeaderN");
   Makes a header row for the table. An empty string can be passed to leave
   a field empty.

addClassX("Classname", $X);
   Adds class names on every cell on specific column($X).

addClassRowEvery("Classname", $n, $startingRow);
   Adds class names on every n-th row starting from specific row.
   Header doesn't count as a row.




---------------------------- Examples ------------------------------------------

// Example 1 - Simple table with header
$table=New Table();
$table->addRecord("Ena", "Pizza");
$table->addRecord("Duo", "Pasta", "Michael");
$table->addRecord("Tria", "Bacon");
$table->addRecord("", "", "", "", "", "Random cell");
$table->makeHeader("Number", "Food", "Eater");
$table->makeHeader("Color", "", "Wigger", "Category");
echo $table->tableToHTML();


// Example 2 - Adding even and odd classes on rows
$table=New Table();
$table->addRecord("One", "Pizza");
$table->addRecord("Two", "Bacon");
$table->addRecord("Three", "Chocolate");
$table->addRecord("Four", "Cake");
$table->addRecord("Five", "Oranges");
$table->addClassRowEvery("odd", 2, 0);
$table->addClassRowEvery("even", 2, 1);
echo $table->tableToHTML();

// Example 3 - Adding classes to columns
$table=New Table();
$table->addRecord("One", "Pizza");
$table->addRecord("Two", "Bacon");
$table->addRecord("Three", "Chocolate");
$table->addRecord("Four", "Cake");
$table->addRecord("Five", "Oranges");
$table->addClassX("food", 1);
echo $table->tableToHTML();
