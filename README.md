# Visma Praktika

Insert
```

php index.php 'submit=submit&firstname=Jonas&lastname=Jomantas&email=jonas@gmail.com&phonenumber1=+37065268953&phonenumber2=+37053654599&comment=labas visiems'
```

Update
```

php index.php 'update=27&firstname=Petras&lastname=Jomantas&email=jonas@gmail.com&phonenumber1=+37065268953&phonenumber2=+37053654599&comment=labas visiems'
```
Delete
```

php index.php 'delete=18'
```

Create .csv
```
SELECT 'id', 'first_name', 'last_name', 'email', 'phone_number1', 'phone_number2', 'comment' UNION ALL SELECT id, first_name, last_name, email, phone_number1, phone_number2, comment FROM registration INTO OUTFILE 'visma.csv' FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"' LINES TERMINATED BY '\n'
```