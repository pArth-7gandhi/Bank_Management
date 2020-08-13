import mysql.connector

con=mysql.connector.connect(
user="root",
password="",
host="localhost",
database="bankmanagementsystem"
)

cursor=con.cursor()
username=input("Enter username: ")
query=cursor.execute("select password from login where username='%s'" %username)
results=cursor.fetchall()

if results:
	for result in results:
		print(results)
else:
	print("Data doesnt exist.")