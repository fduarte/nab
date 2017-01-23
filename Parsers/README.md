# Description
This simple library runs simple file validation, parses a given csv/xml/json file and outputs it. Works on the CLI and web.


# Example CLI:

see cli-driver.php

```
 php cli-driver.php <FILE-TYPE> <FILE-TO-BE-PARSED>

 // Real example:
 php cli-driver.php xml assets/items.xml
```

# Example Web:

see index.php

```
$filename = 'assets/items.csv';
$csv = new ParserCsv($filename);
$csv->parse($filename);
echo str_replace("\n", "<br>", $csv->output());
```

