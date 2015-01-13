# Datei infosaeule.sqlite

## Tabelle user:

ID	|	Nutzername	  | Passwort (hash!) |	Berechtigung | E-Mail
----|------------- | -------------    | ------------- | -------------
1	|	root		  | root			|	admin		| admin@server.de
2	|	CManager 	| contentmanager 	| cm			| cm@server.de
3	|	user			| usr123		| user			| user@server.de

## Tabelle Bilder:

lfdnr	|	name	|	user	|	erstzeit	| 	akt_ab	|	akt_bis	|	ort	|	status
--------|-----------| ----------|---------------|-----------|-----------|-------|----------
	1	|	beispiel|user01		| 11-12-2014	|11.12.2014, 17:00|	24.12.2014, 14:00|upload/2014112_user01-beispiel.jpg|1
	2	|	test	|root		| 11-12-2014	|11.12.2014, 18:10|	19.12.2014, 14:00|upload/2014112_root-test.gif|0



